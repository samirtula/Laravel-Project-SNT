<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\AuthorizationRequest;

class UserController extends Controller
{
    public function registration(RegistrationRequest $req) {
        $user = new User();
        $user->name = $req->input('name');
        $user->second_name = $req->input('second_name');
        $user->last_name = $req->input('last_name');
        $user->email = $req->input('email');
        $user->telephone = $req->input('telephone');
        $user->password = $req->input('password');

        $user->save();
        return redirect()->route('user');

    }
    public function authorization(AuthorizationRequest $req) {

    }
    public function showUsersAdmin()
    {
        //dd(News::all());
        $user = new User();
        return view('admin_users', ['data'=> $user->orderBy('created_at', 'desc')->get()]);
    }
}
