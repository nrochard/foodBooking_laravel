<?php 


namespace App\Http\Controllers;

use App\Http\Requests\BookingFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use App\Http\Mail\Contact;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

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
            'cgv' => $request->get('cgv'),
        ];


        $token = md5(uniqid(true));

        echo  $token;
    }
}