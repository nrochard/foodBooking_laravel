<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class CanceledController extends Controller
{
    public function show($token)
    {
        // Vérification que le token existe
        if (DB::table('booking')->where('token', $token)->doesntExist()) {
            return redirect('/reservation')
                ->with('error', "Il n'y a pas de réservation qui correspond à votre demande ! ");
        }

        // Récupération des infos de la réservation
        $booking = DB::select('select * from booking where token = :token', ['token' => $token]);

        // Mettre date en français
        $booking[0]->date = Carbon::parse($booking[0]->date)->format('d/m/Y');;

        return view('canceled')->with('booking', $booking);
    }
    public function delete($token)
    {
        // Vérification que le token existe
        if (DB::table('booking')->where('token', $token)->doesntExist()) {
            return redirect('/reservation')
                ->with('error', "Il n'y a pas de réservation qui correspond à votre demande ! ");
        }

        $params = DB::select('select * from booking where token = :token', ['token' => $token]);

        //Envoi mail d'annulation
        Mail::send('emails.canceled', $params, function ($m) use ($params) {
            $m->from($params[0]->email);
            $m->to(Config::get('contact.emailBooking'), Config::get('contact.name'))->subject("Confimration d'annulation");
        });

        // Suppression de la réservation
        DB::table('booking')->where('token', $token)->delete();

        return redirect('reservation')->with('status', 'Ta commande a été correctement annulé 👍🏻');
    }
}
