<?php

namespace App\Http\Controllers;

use App\Locater;
use DataTables;
use Illuminate\Http\Request;

class LocaterController extends Controller
{
    public function index(){
        return view('pages.locater.index');
    }

    public function cgJson()
    {
        $data = Locater::get(['locater.*']);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
            $btn =   '<button class="btn btn-success btn-sm btn-icon-anim btn-circle" data-toggle="modal" data-target="#modal-edit" style="margin-right: 4px !important;"><i class="icon-pencil"></i></button>';
            $btn =  $btn .  '<button class="btn btn-danger btn-sm btn-icon-anim btn-circle"><i class="icon-trash"></i></button>';
                return $btn;
        })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
