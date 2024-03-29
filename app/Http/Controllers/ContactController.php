<?php 


namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class ContactController extends Controller
{
    public function show(){
        return view('contact');
    }
    public function send(ContactFormRequest $request){
        $params = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'msg' => $request->get('message'),
        ];

        Mail::send('emails.contact', $params, function($m) use ($params){
            $m->from($params['email'], $params['first_name'] . ' ' . $params['last_name']);
            $m->to(Config::get('contact.emailContact'), Config::get('contact.name'))->subject('Nouveau message');
        });

        // DB::table('contacts')->insert([
        //     'first_name' => $params['first_name'],
        //     'last_name' => $params['last_name'],
        //     'email' => $params['email'],
        //     'message' => $params['msg'],
        // ]);

        return redirect('contact')->with('status', 'Ton message a été envoyé, nous te répondons au plus vite 👍🏻');
    }
}