<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::with(['appointments', 'contracts','emails'])->get();
        return $clients;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'ceoname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nip' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
        ]);

        $client = Client::create([
            'name' => $request['name'],
            'ceoname' => $request['ceoname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'nip' => $request['nip'],
            'city' => $request['city'],
            'zipcode' => $request['zipcode'],
        ]);
    }

    public function show($id)
    {
        $client = Client::with(['appointments', 'contracts','emails'])->find($id);
        return $client;
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
        $user = Client::findOrFail($id);
        $user->delete();
        return;
    }
}
