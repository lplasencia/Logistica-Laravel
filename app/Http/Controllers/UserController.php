<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('mantenimiento.usuario.index',compact('user'));
    }
}
