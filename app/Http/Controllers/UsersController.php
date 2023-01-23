<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with(['contracts'])->get();
        // dd($users);

        $users->map(function ($user) {
            $net_amount = $user->contracts->sum('price');
            return $user->netamount = $net_amount;
        });

        $users->map(function ($user) {
            $earned = $user->contracts->sum('commision');
            return $user->earned = $earned;
        });

        return $users;
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
        $user = User::with(['appointments.client', 'appointments.user', 'contracts.client', 'contracts.user','emails'])->find($id);

        return $user;
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
