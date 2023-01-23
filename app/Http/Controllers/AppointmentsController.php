<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
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
        $validatedData = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'status' => 'required',
            'client' => 'required',
            'user' => 'required',
        ]);

        $appointment = Appointment::create([
            'date' => $request['date'],
            'time' => $request['time'],
            'location' => $request['location'],
            'status' => $request['status']['name'],
            'client_id' => $request['client'],
            'user_id' => $request['user'],
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'Admin') {
            $appointments = Appointment::with(['client', 'user'])->get();
        } elseif ($user->role === 'User') {
            $appointments = Appointment::with(['client', 'user'])->where('user_id', $id)->get();
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
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return;
    }
}
