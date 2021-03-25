<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Indication;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUsersAdmin()
    {

        $user = new User();
        return view('admin.admin_users', ['data' => $user->orderBy('created_at', 'desc')->get()]);
    }

    public function showUsers(Request $req)
    {
        return view('admin.admin_users');
    }

    public function adminUserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()
            ->route('admin_users')
            ->with('success', 'Пользователь удален');
    }

    public function userAddWater(Request $req)
    {
        $user = User::find(Auth::user()->id);
        $attributes = [
            'name' => $user['name'],
            'last_name' => $user['last_name'],
            'plot' => $user['plot'],
            'type' => $req['type'],
            'value' => $req['value'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        Indication::insert($attributes);
        return redirect()
            ->route('user')
            ->with('success', 'Данные добавлены');
    }

    public function showWaterIndications(Request $req)
    {
        $user = User::find(Auth::user()->id);
        $indications = new Indication();
        return view('users.user', ['data' => $indications->
        where('type', 'Вода')
            ->where('plot', $user['plot'])
            ->orderBy('created_at', 'desc')
            ->get()]);
    }



}
