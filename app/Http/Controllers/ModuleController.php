<?php

namespace App\Http\Controllers;

use App\Module;
use DataTables;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(){
        return view('pages.module.index');
    }

    public function cgJson()
    {
        $data = Module::leftJoin('locater', 'pmmodule.id_locater', '=', 'locater.id_locater')->get(['pmmodule.*', 'locater.txtLocaterName as locname']);
        
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
