<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingFormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function book(BookingFormRequest $request){

        $params = [
            'email' => $request->get('email'),
            'date' => $request->get('date'),
            'slot' => $request->get('slot'),
            'conditions' => $request->get('conditions'),
            'token' => md5(uniqid(true))
        ];

        // if ($params['slot'] != "10h30 à 11h" || $params['slot'] != "11h à 11h30" || $params['slot'] != "12h à 12h30" || $params['slot'] != "12h30 à 13h" || $params['slot'] != "16h à 16h30" || $params['slot'] != "16h30 à 17h" || $params['slot'] != "17h à 17h30" || $params['slot'] != "17h30 à 18h")
        // {
        //     return response()->json(['message' => "Le créneau choisi n'est pas disponible."], 400);
        // }

        $date = Carbon::parse($params['date']);

        if (DB::table('booking')->where('email', $params['email'])->where('date', $params['date'])->where('slot', $params['slot'])->exists()) {
            return response()->json(['message' => "Il y a déjà une commande en cours avec cette adresse mail pour ce créneau."], 400);
        }

        // Vérification jours week-ends car fermés le samedi et dimanche
        if($date->isWeekend()){
            return response()->json(['message' => "Nous ne servons pas de petits plats le week-end ! "], 400);
        }

        // Vérification date dans le futur
        if ($date->lt(Carbon::now())){
            return response()->json(['message' => "Attention à la date que tu choisis, elle doit être dans le futur et hors-weekend ! "], 400);
        }

        $user = DB::table('booking')
                        ->where('date', $params['date'])
                        ->where('slot', $params['slot'])
                        ->get();
        $count = count($user);

        if ($count >= Config::get('informations.limit')){
            return response()->json(['message' => "Dommage, tous les plats ont été réservés pour ce créneau !"], 400);
        }

        // Insertion de la réservation en français
        DB::table('booking')->insert([
            'email' => $params['email'],
            'slot' => $params['slot'],
            'date' => $params['date'],
            'token' => $params['token'],
        ]);

        // Mettre la date en français
        $params['date'] = Carbon::parse($params['date'])->format('d/m/Y');
    

        //Envoi mail de confirmation
        Mail::send('emails.booking', $params, function($m) use ($params){
            $m->from($params['email']);
            $m->to(Config::get('contact.emailBooking'), Config::get('contact.name'))->subject('Nouvelle réservation');
        });

        return response()->json(['message' => 'Merci, ta confirmation de réservation a été envoyé 👍🏻 !', 'token' => $params['token']], 201);

        
    }
    public function cancel($token)
    {
        // Vérification que le token existe
        if (DB::table('booking')->where('token', $token)->doesntExist()) {
            return response()->json(['message' => "Il n'y a pas de réservation qui correspond à votre demande !"], 400);
        }

        $params = DB::select('select * from booking where token = :token', ['token' => $token]);

        //Envoi mail d'annulation
        Mail::send('emails.canceled', $params, function ($m) use ($params) {
            $m->from($params[0]->email);
            $m->to(Config::get('contact.emailBooking'), Config::get('contact.name'))->subject("Confimration d'annulation");
        });

        // Suppression de la réservation
        DB::table('booking')->where('token', $token)->delete();

        return response()->json(['message' => "Ta commande a été correctement annulé 👍🏻 !"] , 200);
    }
}
