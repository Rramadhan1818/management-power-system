<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogHistory;
use DataTables;
class LogHistoryController extends Controller
{
    public function index(){
        return view('pages.log-history.index');
    }

    public function cgJson()
    {
        $data = LogHistory::
        leftJoin('pmmodule', 'log_history.id_pmmodule', '=', 'pmmodule.id_pmmodule')
        ->get(['log_history.*', 'pmmodule.txtModuleName as moduleName']);

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
