<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;

class ContractsController extends Controller
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
            'transactionID' => 'required',
            'commision' => 'required',
            'price' => 'required',
            'netamount' => 'required',
            'status' => 'required',
            'client' => 'required',
            'user' => 'required',
        ]);

        $contract = Contract::create([
            'transactionID' => $request['transactionID'],
            'commision' => $request['commision'],
            'price' => $request['price'],
            'netamount' => $request['netamount'],
            'status' => $request['status']['name'],
            'client_id' => $request['client'],
            'user_id' => $request['user'],
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'Admin') {
            $contracts = Contract::with(['client','user'])->get();
        } elseif ($user->role === 'User') {
            $contracts = Contract::with(['client','user'])->where('user_id', $id)->get();
        }

        return $contracts;
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
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return;
    }
}
