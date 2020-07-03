<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
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

    public function createNew()
    {
        return view('user.create');
    }

    public function storeNew(CreateUserRequest $request)
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
}
