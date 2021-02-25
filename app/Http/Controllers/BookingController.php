<?php 


namespace App\Http\Controllers;

use App\Http\Requests\BookingFormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function show(){
        return view('booking');
    }
    public function book(BookingFormRequest $request){

        $params = [
            'email' => $request->get('email'),
            'date' => $request->get('date'),
            'hour' => $request->get('hours'),
            'conditions' => $request->get('conditions'),
        ];

        $date = \Carbon\Carbon::parse($params['date']);

        if($date->isWeekend()){
            return redirect('/reservation')
            ->with('error','Nous ne servons pas de petits plats le week-end!');
        }


        Mail::send('emails.booking', $params, function($m) use ($params){
            $m->from($params['email']);
            $m->to(Config::get('contact.emailContact'), Config::get('contact.name'))->subject('Nouveau message');
        });


        $token = md5(uniqid(true));
        return redirect('reservation')->with('status', 'Message bien envoyé');

    }
}