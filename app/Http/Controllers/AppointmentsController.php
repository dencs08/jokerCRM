<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\SystemUser;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        //
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
        $user = SystemUser::findOrFail($id);

        if ($user->role === 'Admin') {
            $appointments = Appointment::with(['client'])->get();
        } elseif ($user->role === 'User') {
            $appointments = Appointment::with(['client'])->where('system_user_id', $id)->get();
        }

        return $appointments;
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
