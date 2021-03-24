<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsersAdmin()
    {

        $user = new User();
        return view('admin.admin_users', ['data'=> $user->orderBy('created_at', 'desc')->get()]);
    }
    public function showUsers (Request $req)
    {
        return view('admin.admin_users');
    }
}
