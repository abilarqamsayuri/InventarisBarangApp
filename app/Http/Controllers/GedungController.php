<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\GedungExport;
use App\Models\Gedung;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // kodingan untuk menampilkan data dari tabel gedung
        $ar_gedung = DB::table('gedung as gd')
            ->join('inventaris', 'inventaris.id', '=', 'gd.inventaris_id')
            ->join('kategory', 'kategory.id', '=', 'gd.inventaris_kategori_id')
            ->select('gd.*','kategory.nama AS kategori','inventaris.nama_barang AS inventaris')->get();
        return view('gedung.index',compact('ar_gedung'));
    }

    public function gedungPDF(Request $request)
    {
        // join tabel dengan Query Builder Laravel
        $ar_gedung = DB::table('gedung as gd')
            ->join('inventaris', 'inventaris.id', '=', 'gd.inventaris_id')
            ->join('kategory', 'kategory.id', '=', 'gd.inventaris_kategori_id')
            ->select('gd.*','kategory.nama AS kategori','inventaris.nama_barang AS inventaris')->get();

        $pdf = PDF::loadView('gedung/gedungPDF',['ar_gedung'=>$ar_gedung]);
        return $pdf->download('dataGedung.pdf');
    }

    public function gedungcsv()
    {
        return Excel::download(new GedungExport, 'gedung.csv');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk menampilkan form create gedung
        return view('gedung.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses validasi data
        $validasi = $request->validate(
            [
                'nama'=>'required|unique:gedung',
                'jumlah'=>'required|max:50', 
                'inventaris'=>'required',
                'kategori'=>'required',
            ],
        //menampilkan pesan kesalahan
        [
            'nama.required'=>'Nama Gedung Wajib di Isi', 
            'jumlah.numeric'=>'Jumlah Harus Berupa Angka',
            'inventaris.required'=>'Inventaris Wajib di Isi',  
            'kategori.required'=>'Kategori Wajib di Isi',
        ],
		);
        //proses input data tangkap request dari form input
        DB::table('gedung')->insert(
            [
                'nama'=>$request->nama,  
                'jumlah'=>$request->jumlah,  
                'inventaris_id'=>$request->inventaris,  
                'inventaris_kategori_id'=>$request->kategori,
            ]
            );
        //landing page
        return redirect('/gedung');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // kodingan untuk menampilkan detail dari tabel gedung
        $s_gedung = DB::table('gedung as gd')->where('gd.id','=',$id)
            ->join('inventaris', 'inventaris.id', '=', 'gd.inventaris_id')
            ->join('kategory', 'kategory.id', '=', 'gd.inventaris_kategori_id')
            ->select('gd.*','kategory.nama AS kategori','inventaris.nama_barang AS inventaris')->get();
        return view('gedung.show',compact('s_gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // kodingan untuk menampilkan form edit
        $data = DB::table('gedung')
            ->where('id','=',$id)->get();
        return view('gedung.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // proses update
        DB::table('gedung')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,  
                'jumlah'=>$request->jumlah,  
                'inventaris_id'=>$request->inventaris,  
                'inventaris_kategori_id'=>$request->kategori,
            ]
        );

        //landing page
        return redirect('/gedung'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus data
        DB::table('gedung')->where('id',$id)->delete();
        return redirect('/gedung');
    }
}
