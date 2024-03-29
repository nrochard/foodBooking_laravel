<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InformationsController extends Controller
{
    public function index(){
        return Config::get('informations');
    }
}
