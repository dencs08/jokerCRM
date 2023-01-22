<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use Illuminate\Http\Request;

class ClientInfoController extends Controller
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
        //
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
        $clientInfo = ClientInfo::findOrFail($id);
        $clientInfo->delete();
        return;
    }
}
