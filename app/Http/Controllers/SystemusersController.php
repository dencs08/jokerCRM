<?php

namespace App\Http\Controllers;

use App\Models\SystemUser;
use Illuminate\Http\Request;

class SystemusersController extends Controller
{
    public function index()
    {
        $system_users = SystemUser::with(['contracts'])->get();
        // dd($system_users);

        $system_users->map(function ($system_user) {
            $net_amount = $system_user->contracts->sum('price');
            return $system_user->netamount = $net_amount;
        });

        $system_users->map(function ($system_user) {
            $earned = $system_user->contracts->sum('commision');
            return $system_user->earned = $earned;
        });

        return $system_users;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $system_user = SystemUser::with(['appointments.client', 'appointments.system_user', 'contracts.client', 'contracts.system_user','emails'])->find($id);
        return $system_user;
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
