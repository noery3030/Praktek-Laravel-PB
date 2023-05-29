<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_kategori = DB::table('kategori')->get(); 
        return view('kategori.index',compact('ar_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('kategori')->insert(
            [
                'nama'=>$request->nama,
            ]  
        );
        //landing page
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_kategori = DB::table('kategori')
        ->where('kategori.id', '=', $id)->get();
        return view('kategori.show', compact('ar_kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('kategori')
        ->where('id','=',$id)->get();
        return view('kategori.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('kategori')->where('id', '=', $id)->update(
            [
                'nama'=>$request->nama,
            ]  
        );
        //landing page
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('kategori')->where('id',$id)->delete();
        return redirect('/kategori');
    }
}
