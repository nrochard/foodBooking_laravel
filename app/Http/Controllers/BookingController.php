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
            'slot' => $request->get('slot'),
            'conditions' => $request->get('conditions'),
            'token' => md5(uniqid(true))
        ];

        // print_r($params);
        // die();

        $date = Carbon::parse($params['date']);

        if($date->isWeekend()){
            return redirect('/reservation')
            ->with('error','Nous ne servons pas de petits plats le week-end ! ');
        }

        DB::table('booking')->insert([
            'email' => $params['email'],
            'slot' => $params['slot'],
            'date' => $params['date'],
            'token' => $params['token'],
        ]);

        $token = md5(uniqid(true));
        Mail::send('emails.booking', $params, function($m) use ($params){
            $m->from($params['email']);
            $m->to(Config::get('contact.emailBooking'), Config::get('contact.name'))->subject('Nouvelle réservation');
        });



        return redirect('reservation')->with('status', 'Message bien envoyé');

    }
}