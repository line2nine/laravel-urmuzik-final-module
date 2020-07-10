<?php


namespace App\Http\Services;


use App\Http\Controllers\Role;
use App\Http\Controllers\Status;
use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function find($id)
    {
        return $this->userRepo->find($id);
    }

    public function create($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = Role::USER;
        $user->status = Status::ACTIVE;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $user->avatar = $request->image->store('images', 'public');
        } else {
            $user->avatar = 'images/default-avatar.png';
        }
        $this->userRepo->save($user);
        Auth::login($user);
    }

    public function createNew($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = Status::ACTIVE;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $user->avatar = $request->image->store('images', 'public');
        } else {
            $user->avatar = 'images/default-avatar.png';
        }
        $this->userRepo->save($user);
    }

    public function update($user, $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $oldFilePath = $user->avatar;
        if ($request->hasFile('image')) {
            if ($oldFilePath !== 'images/default-avatar.png') {
                Storage::delete("public/" . $oldFilePath);
            }
            $user->avatar = $request->image->store('images', 'public');
        }
        $user->role = Role::USER;
        $user->status = Status::ACTIVE;

        $this->userRepo->save($user);
    }

    public function updateNew($user, $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $oldFilePath = $user->avatar;

        if ($request->hasFile('image')) {
            if ($oldFilePath !== 'images/default-avatar.png') {
                Storage::delete("public/" . $oldFilePath);
            }
            $user->avatar = $request->image->store('images', 'public');
        }
        $user->role = $request->role;
        $user->status = $request->status;

        $this->userRepo->save($user);
    }

    public function changePass($user, $request)
    {
        $user->password = Hash::make($request->newPass);
        $this->userRepo->save($user);
    }

    public function checkPass($request)
    {
        if (Hash::check($request->oldPass, Auth::user()->password)) {
            return true;
        }
        return false;
    }

    public function searchByKeyword($request)
    {
        $keyword = $request->keyword;
        if ($keyword) {
            return $this->userRepo->searchUser($keyword);
        }
        return false;
    }
}
