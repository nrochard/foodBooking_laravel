<?php 


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CanceledController extends Controller
{
    public function show($token){

        if (DB::table('booking')->where('token', $token)->doesntExist()) {
            return redirect('/reservation')
            ->with('error',"Il n'y a pas de réservation qui correspond à votre demande ! ");
        }
        return view('canceled');
    }
}