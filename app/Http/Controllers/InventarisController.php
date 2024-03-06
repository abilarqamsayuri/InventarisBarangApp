<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\InventarisExport;
use App\Models\Inventaris;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;


class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // kodingan untuk menampilkan data dari tabel inventaris
        $ar_inv = DB::table('inventaris as inv')
            ->join('kategory', 'kategory.id', '=', 'inv.kategory_id')
            ->select('inv.*','kategory.nama AS kat')->get();
        return view('inventaris.index',compact('ar_inv'));
    }

    public function inventarisPDF(Request $request)
    {
        // join tabel dengan Query Builder Laravel
        $ar_inv = DB::table('inventaris as inv')
            ->join('kategory', 'kategory.id', '=', 'inv.kategory_id')
            ->select('inv.*','kategory.nama AS kat')->get();

        $pdf = PDF::loadView('inventaris/inventarisPDF',['ar_inv'=>$ar_inv]);
        return $pdf->download('dataInventaris.pdf');
    }

    public function inventariscsv()
    {
        return Excel::download(new InventarisExport, 'inventaris.csv');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk menampilkan form create inventaris
        return view('inventaris.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses validasi data
        $validasi = $request->validate(
            [
                'nama_barang'=>'required|unique:inventaris',
                'kategori'=>'required',
                'jumlah'=>'required|max:50',
                'harga'=>'required|max:50',
                'kondisi'=>'required',
            ],
        //menampilkan pesan kesalahan
        [
            'nama_barang.required'=>'Nama Barang Wajib di Isi', 
            'kategori.required'=>'Kategory Wajib di Isi', 
            'jumlah.numeric'=>'Jumlah Harus Berupa Angka',
            'harga.numeric'=>'Jumlah Harus Berupa Angka',
            'kondisi.required'=>'Kondisi Wajib di Isi',
        ],
            );
        //proses input data tangkap request dari form input
        DB::table('inventaris')->insert(
            [
                'nama_barang'=>$request->nama_barang,
                'kategory_id'=>$request->kategori,  
                'jumlah'=>$request->jumlah,  
                'harga'=>$request->harga,  
                'kondisi'=>$request->kondisi,  
            ]
        );
        //landing page
        return redirect('/inventaris');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // kodingan untuk menampilkan data detail dari tabel inventaris
        $s_inv = DB::table('inventaris as inv')
            ->join('kategory', 'kategory.id', '=', 'inv.kategory_id')
            ->select('inv.*','kategory.nama AS kat')->where('inv.id','=',$id)->get();
        return view('inventaris.show',compact('s_inv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // untuk menampilkan form edit inventaris
        $data = DB::table('inventaris')
            ->where('id','=',$id)->get();
        return view('inventaris.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // proses update
        DB::table('inventaris')->where('id',$id)->update([
            'nama_barang'=>$request->nama_barang,
            'kategory_id'=>$request->kategori,  
            'jumlah'=>$request->jumlah,  
            'harga'=>$request->harga,  
            'kondisi'=>$request->kondisi,   
        ]);

        //landing page
        return redirect('/inventaris'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses hapus
        DB::table('inventaris')->where('id',$id)->delete();
        //landing page
        return redirect('/inventaris');
    }
}
