<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // kodingan untuk menampilkan data dari tabel user
        $ar_user = DB::table('users')
            ->select('users.*')->get();
        return view('user.index',compact('ar_user'));
    }

    public function userPDF(Request $request)
    {
        // join tabel dengan Query Builder Laravel
        $ar_user = DB::table('users')
            ->select('users.*')->get();

        $pdf = PDF::loadView('user/userPDF',['ar_user'=>$ar_user]);
        return $pdf->download('dataUser.pdf');
    }

    public function usercsv()
    {
        return Excel::download(new UserExport, 'user.csv');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // kodingan untuk menampilkan detail dari tabel user
        $s_user = DB::table('users')->where('id','=',$id)->get();
        return view('user.show',compact('s_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // kodingan untuk menampilkan form edit
        $data = DB::table('users')->where('id','=',$id)->get();
        return view('user.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // proses edit data
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        //landing page
        return redirect('/user'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses hapus data
        DB::table('users')->where('id',$id)->delete();
        //landing page
        return redirect('/user');
    }
}
