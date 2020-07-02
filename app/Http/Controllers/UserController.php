<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('register.register');
    }

    public function store(Request $request)
    {
        $this->userService->create($request);
        return redirect()->route('index');
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
        //
    }
}
