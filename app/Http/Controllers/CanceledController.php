<?php 


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CanceledController extends Controller
{
    public function show($token){
        if (DB::table('booking')->where('token', $token)->doesntExist()) {
            return redirect('/reservation')
            ->with('error',"Il n'y a pas de réservation qui correspond à votre demande ! ");
        }

        $booking = DB::select('select * from booking where token = :token', ['token' => $token]);

        $booking[0]->date = Carbon::parse($booking[0]->date)->format('d/m/Y');;

        return view('canceled')->with('booking', $booking);
    }
    public function delete($token)
    {
        DB::table('booking')->where('token', $token)->delete();
        return redirect('reservation')->with('status', 'Ta commande a été correctement annulé 👍🏻');
    }
}