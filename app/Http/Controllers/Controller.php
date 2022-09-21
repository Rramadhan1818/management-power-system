<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Locater;

class Controller extends BaseController
{
    public function cgJson()
    {
        $locater = Locater::first(['locater.*']);
        $data = [
            'locater' => $locater
        ];
        return $data;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
