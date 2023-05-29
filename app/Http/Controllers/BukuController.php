<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_buku = DB::table('buku') //join tabel dengan Query Builder Laravel
        ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
        ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
        ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
        ->select('buku.*', 'pengarang.nama', 'penerbit.nama AS pen',
        'kategori.nama AS kat')->get();
        return view('buku.index',compact('ar_buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('buku')->insert(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
                
            ]  
        );
        //landing page
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ar_buku = DB::table('buku') //join tabel dengan Query Builder Laravel
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.*',
                'pengarang.nama',
                'penerbit.nama AS pen',
                'kategori.nama AS kat'
            )->where('buku.id', '=', $id)->get();
        return view('buku.show', compact('ar_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('buku')
        ->where('id','=',$id)->get();
        return view('buku.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('buku')->where('id', '=', $id)->update(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
            ]  
        );
        //landing page
        return redirect('/buku'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('buku')->where('id',$id)->delete();
        return redirect('/buku');
    }


}
