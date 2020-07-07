<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $songs = Song::orderby('created_at', 'desc')->paginate(3);
        return view('home.home', compact('songs'));
    }
}
