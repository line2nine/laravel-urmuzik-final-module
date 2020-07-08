<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordUserRequest;
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
        $user = $this->userService->find($id);
        return view('user.home.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->find($id);
        $this->userService->update($user, $request);
        \alert("Update Successful", '', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->route('user.profile', $user->id);
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
        notify("Deleted user $user->name", 'success');
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

    function changePass($id)
    {
        $user = $this->userService->find($id);
        return view('user.changePass', compact('user'));
    }

    function updatePass(ChangePasswordUserRequest $request, $id)
    {
        $user = $this->userService->find($id);
        if ($this->userService->checkPass($request)) {
            $this->userService->changePass($user, $request);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Wrong current password, try again');
    }

    function changePassProfile($id)
    {
        $user = $this->userService->find($id);
        return view('user.home.changePass', compact('user'));
    }

    function updatePassProfile(ChangePasswordUserRequest $request, $id)
    {
        $user = $this->userService->find($id);
        if ($this->userService->checkPass($request)) {
            $this->userService->changePass($user, $request);
            \alert('Your Password Has Been Updated', '', 'success')->autoClose(2000)->timerProgressBar();
            return redirect()->route('user.profile', $user->id);
        }
        return back()->with('error', 'Wrong current password, try again');
    }

    function userDetail($id)
    {
        $user = $this->userService->find($id);
        return view('user.detail', compact('user'));
    }

    function userProfile($id)
    {
        $user = $this->userService->find($id);
        return view('user.home.detail', compact('user'));
    }
}
