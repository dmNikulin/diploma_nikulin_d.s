<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function index() {
        return view('index');
    }

    public function store(Request $request) 
    {
        $client = new Client();
        $client->form_name = $request->form_name;
        $client->phone = $request->phone;

        if ($request->name !== null) {
            $client->name = $request->name;
        } else {
            $client->name = 'Not name';
        }
        
        $client->save();

        return Redirect::route('thanks');
    }
}
