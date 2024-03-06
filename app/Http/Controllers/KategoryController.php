<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategory;
use App\Exports\KategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;

class KategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // kodingan untuk menampilkan data dari tabel kategory
        $ar_kategory = DB::table('kategory')->get();
        return view('kategory.index',compact('ar_kategory'));
    }
    
    public function kategoryPDF(Request $request)
    {
        // join tabel dengan Query Builder Laravel
        $ar_kategory = DB::table('kategory')->get();

        $pdf = PDF::loadView('kategory/kategoryPDF',['ar_kategory'=>$ar_kategory]);
        return $pdf->download('dataKategori.pdf');
    }

    public function kategoryscsv()
    {
        return Excel::download(new KategoryExport, 'kategory.csv');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk menampilkan form create kategory
        return view('kategory.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses validasi data
        $validasi = $request->validate(
            [
                'nama'=>'required|unique:kategory',
            ],
        //menampilkan pesan kesalahan
            [
                'nama.required' => 'Nama harus diisi',
                'nama.unique' => 'Kategori sudah ada',
            ]
        );

        // proses simpan data
        DB::table('kategory')->insert([
            'nama' => $request->input('nama'),
        ]);

        // redirect
        return redirect('/kategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // kodingan untuk menampilkan data detail dari tabel kategory
        $s_kat = DB::table('kategory')->where('id',$id)->get();
        return view('kategory.show',compact('s_kat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // kodingan untuk menampilkan form edit kategory
        $data = DB::table('kategory')->where('id',$id)->get();
        return view('kategory.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // proses update
        DB::table('kategory')->insert([
            'nama' => $request->input('nama'),
        ]);

        //landing page
        return redirect('/kategory'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses delete
        DB::table('kategory')->where('id',$id)->delete();
        return redirect('/kategory');
    }
}
