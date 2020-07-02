<?php


namespace App\Http\Services;


use App\Http\Controllers\Role;
use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
