<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pengarang = DB::table('pengarang')->get(); //join tabel dengan Query 
        return view('pengarang.index',compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengarang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->foto)){
            $request->validate([
            'foto' => 'image|mimes:jpg,jpeg,png,giff|max:2048',
            ]);
            $fileName = $request->nama.'.'
            .$request->foto->extension();
            $request->foto
            ->move(public_path('images'), $fileName);
            }else{
            $fileName = '';
            }
            
        DB::table('pengarang')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                //'foto'=>$request->foto,
                'foto'=>$fileName,
            ]  
        );
        //landing page
        return redirect('/pengarang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_pengarang = DB::table('pengarang')
        ->where('pengarang.id', '=', $id)->get();
        return view('pengarang.show', compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('pengarang')
        ->where('id','=',$id)->get();
        return view('pengarang.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
            
        if(!empty($request->foto)){
            $request->validate([
                'foto' => 'image|mimes:png,jpg,jpeg,giff|max:2048'
            ]);
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }
        DB::table('pengarang')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'hp' => $request->hp,
                'foto' => $fileName,
            ]
        );
        //Landing Page
        return redirect('/pengarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            DB::table('pengarang')->where('id',$id)->delete();
            return redirect('/pengarang');
    }
}
