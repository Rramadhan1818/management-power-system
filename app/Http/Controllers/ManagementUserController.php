<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManagementUserController extends Controller
{
    public function index(){
        return view('pages.management-user.index');
    }

    public function cgJson()
    {
        $data = User::get(['users.*']);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn =  '<button class="btn btn-danger btn-sm btn-icon-anim btn-circle"><i class="icon-trash"></i></button>';
                $btn = $btn . '<button class="btn btn-success btn-sm btn-icon-anim btn-circle" style="margin-left: 5px"><i class="icon-settings"></i></button>';
            // $btn = '<button class="btn btn-inverse-success btn-icon mr-1" data-toggle="modal" data-target="#modal-edit"><i class="icon-file menu-icon"></i></button>';
            // $btn = $btn . '<button data-id="" class="btn btn-inverse-danger btn-icon member-hapus mr-1" data-toggle="modal" data-target="#modal-hapus"><i class="icon-trash"></i></button>';
                return $btn;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'txtfullName' => 'required',  
            'txtusername' => 'required', 
            'password' => 'required', 
            'bitActive' => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            $data = [
                'txtfullname' => $request->txtfullname,  
                'txtusername' => $request->txtusername, 
                'password' => $request->password, 
                'bitActive' => $request->bitActive,
            ];
            $data = User::insert($data);
            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }
        return response()->json(['code' => 200, 'message' => 'Post successfully'], 200);
    }

    public function edit(Request $request)
    {
        $user = User::where("id", $request->id)->first();
        $subDepartments = User::where("id_department",$user->id_department)->get();
        return view("pages.admin.member.form-edit", compact("user","divisi","jabatans","levels","departments","subDepartments","cgMaster"));
    }

    public function update(Request $request)
    {

        $request->validate([
            "id"=>"required",
            "base64" => "nullable|string",
            "nik" => "required",
            "peran_pengguna" => "required",
            "tgl_masuk" => "required",
            "nama_pengguna" => "required|string",
            "email" => "required",
            "divisi" => "required",
            "job_title" => "required",
            "level" => "required",
            "department" => "required",
            "sub_department" => "required",
            "cg" => "required"
        ]);
        $user = User::where("id", $request->id)->first();

        $data = [
            'nik' => $request->nik,
            'peran_pengguna' => $request->peran_pengguna,
            'tgl_masuk' => date('Y-m-d', strtotime($request->tgl_masuk)),
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'id_divisi' => $request->divisi,
            'id_job_title' => $request->job_title,
            'id_level' => $request->level,
            'id_department' => $request->department,
            'id_sub_department' => $request->sub_department,
            'id_cg' => $request->cg,
        ];
        if(isset($request->base64)){
            $url = "../storage/app/public/".$user->gambar;
            if(file_exists($url) && (isset($user->gambar)) && $user->gambar != ""){
                unlink($url);
            }
            $filename = Str::random(15).'.png';
            $contents = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$request->base64)); 
            Storage::disk('public')->put($filename, $contents);
            $data['gambar'] = $filename;
        }
        User::where('id',$request->id)->update($data);
        return response()->json(['code' => 200, 'message' => 'Post Updated successfully'], 200);
    }
    
    public function deleteMember($id)
    {
        $user = User::find($id);
        $url = "../storage/app/public/".$user->gambar;
        if(file_exists($url) && isset($user->gambar)){
            unlink($url);
        }
        User::where('id', $id)->delete();
        return redirect()->route('Member')->with(['success' => 'Curriculum Deleted successfully']);
    }
}
