<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Exports\PenerbitExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;


class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');

        $ar_penerbit = DB::table('penerbit')
        ->where('nama', 'like', '%'.$keyword.'%')
        ->orWhere('alamat', 'like', '%'.$keyword.'%')
        ->orWhere('email', 'like', '%'.$keyword.'%')
        ->orWhere('website', 'like', '%'.$keyword.'%')
        ->orWhere('telepon', 'like', '%'.$keyword.'%')
        ->orWhere('cp', 'like', '%'.$keyword.'%')
        ->paginate(5);
        return view('penerbit.index', compact('ar_penerbit', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('penerbit')->insert(
            [
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'website'=>$request->website,
                'telepon'=>$request->telepon,
                'cp'=>$request->cp,
            ]  
        );
        //landing page
        return redirect('/penerbit');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_penerbit = DB::table('penerbit')
        ->where('penerbit.id', '=', $id)->get();
        return view('penerbit.show', compact('ar_penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('penerbit')
        ->where('id','=',$id)->get();
        return view('penerbit.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('penerbit')->where('id', '=', $id)->update(
            [
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'website'=>$request->website,
                'telepon'=>$request->telepon,
                'cp'=>$request->cp,
            ]  
        );
        //landing page
        return redirect('/penerbit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('penerbit')->where('id',$id)->delete();
        return redirect('/penerbit');
    }

    public function penerbitPDF()
    {
        $ar_penerbit = DB::table('penerbit')
            ->select('penerbit.*')->get();
        $pdf = PDF::loadView('penerbit.daftarPenerbit', ['ar_penerbit' => $ar_penerbit]);
        return $pdf->download('dataPenerbit.pdf');
    }
    
    public function penerbitcsv()
    {
        return Excel::download(new PenerbitExport, 'penerbit.csv');
    }
}
