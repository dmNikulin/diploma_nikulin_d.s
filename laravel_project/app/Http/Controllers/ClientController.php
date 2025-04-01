<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Mail;
use App\Mail\BidFromSite;

class ClientController extends Controller
{
    public function index() {

        return view('index');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => ['max: 15', 'nullable'],
            'phone' => ['required', 'min: 18'],
        ]);

        $client = new Client();
        $client->form_name = $request->form_name;
        $client->phone = $request->phone;

        if ($request->name !== null) {
            $client->name = $request->name;
        } else {
            $client->name = 'Not name';
        }
        
        $client->save();

        $email = 'skygift.work@gmail.com';
        Mail::to($email)->send(new BidFromSite($request->form_name, $request->name, $request->phone));

        $message='Пришла заявка с формы: ' . $request->form_name . " " 
        . "Имя клиента: " . $request->name . " " . "Телефон: " . $request->phone;
        $idChannel = env('TELEGRAM_CHANNEL_ID');
        $botToken = env('TELEGRAM_BOT_TOKEN');
        file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);

        return Redirect::route('thanks');
    }
}
