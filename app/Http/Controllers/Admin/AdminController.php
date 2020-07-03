<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Role;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function showFormUpdateInfo() {
        return view('admin.edit-info');
    }
}
