<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locater;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.dashboard');
    }

    public function getJson()
    {
        $locater =  Locater::get(['locater.id_locater', 'locater.txtLocaterName']);
        $data = [
            'locater' => $locater
        ];
        return $data;
    }
}
