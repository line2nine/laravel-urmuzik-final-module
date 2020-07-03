<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    function getAll()
    {
        $users = $this->userService->getAll();
        return view('user.list', compact('users'));
    }

    public function create()
    {
        return view('register.register');
    }

    public function store(CreateUserRequest $request)
    {
        $this->userService->create($request);
        return redirect()->route('index');
    }

    public function createAtDashboard()
    {
        return view('user.create');
    }

    public function storeAtDashboard(CreateUserRequest $request)
    {
        $this->userService->createNew($request);
        return redirect()->route('user.list');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function editAtDashboard($id)
    {
        $user = $this->userService->find($id);
        if (Auth::user()->id == $user->id || Auth::user()->role == Role::ADMIN) {
            return view('user.edit', compact('user'));
        }
        return abort(403);
    }

    public function updateAtDashboard(EditUserRequest $request, $id)
    {
        $user = $this->userService->find($id);
        $this->userService->updateNew($user, $request);
        return redirect()->route('user.list');
    }

    public function destroy($id)
    {
        $user = $this->userService->find($id);
        $filePath = $user->image;
        $user->delete();
        if ($filePath !== 'images/default-avatar.png') {
            Storage::delete("public/" . $filePath);
        }
        return redirect()->route('user.list');
    }

    function search(Request $request)
    {
        if ($this->userService->searchByKeyword($request)) {
            $users = $this->userService->searchByKeyword($request);
            return view('user.list', compact('users'));
        }
        return redirect()->route('user.list');
    }
}
