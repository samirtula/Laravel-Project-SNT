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

    public function userAddEnergy(Request $req)
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
            ->route('user_energy')
            ->with('success', 'Данные добавлены');
    }

    public function showEnergyIndications(Request $req)
    {
        $user = User::find(Auth::user()->id);
        $indications = new Indication();
        return view('users.user_energy', ['data' => $indications->
        where('type', 'Энергия')
            ->where('plot', $user['plot'])
            ->orderBy('created_at', 'desc')
            ->get()]);
    }

    public function waterIndicationUpdate($id)
    {
        $indication = new Indication;
        return view('users.user_water_update', ['data' => $indication->find($id)]);
    }

    public function waterIndUpdateSave($id, Request $req)
    {
        $indication = indication::find($id);
        $indication->value = $req->input('value');
        $indication->save();
        $result = redirect()
            ->route('user')
            ->with('success', 'Данные изменены');
        return $result;
    }

    public function waterIndicationDelete($id)
    {
        $indication = indication::find($id);

        $indication->delete();
        return redirect()
            ->route('user')
            ->with('success', 'Данные удалены');
    }

    public function energyIndicationUpdate($id)
    {
        $indication = new Indication;
        return view('users.user_energy_update', ['data' => $indication->find($id)]);
    }

    public function energyIndUpdateSave($id, Request $req)
    {
        $indication = indication::find($id);
        $indication->value = $req->input('value');
        $indication->save();
        $result = redirect()
            ->route('user_energy')
            ->with('success', 'Данные изменены');
        return $result;
    }

    public function energyIndicationDelete($id)
    {
        $indication = indication::find($id);

        $indication->delete();
        return redirect()
            ->route('user_energy')
            ->with('success', 'Данные удалены');
    }

    public function showIndicationsAdmin()
    {
        $indication = new indication();
        return view('admin.admin_indications', ['data' => $indication->orderBy('created_at', 'desc')->get()]);
    }

    public function indicationDeleteAdmin($id)
    {
        $indication = indication::find($id);

        $indication->delete();
        return redirect()
            ->route('admin_indications')
            ->with('success', 'Данные удалены');
    }

    public function redirectAfterAuthorize()
    {
        if (Auth::user()) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()
                    ->route('admin');
            }
            elseif (Auth::user()->hasRole('user'))
            {
                return redirect()
                    ->route('user');
            }
        } else {
            return view('authorization');
        }

    }
}
