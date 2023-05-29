@extends('adminlte::page')
@section('title', 'Form Kategori')
@section('content_header')
<h1>Data Kategori</h1>
@stop
@section('content')
{{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form edit buku --}}
@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp
@foreach($data as $rs)
    <form method="POST" action="{{ route('kategori.update',$rs->id) }}">
    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
    @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah
    disetiap element form edit buku --}}
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary"
    name="proses">Ubah</button>
    <button type="reset" class="btn btn-warning"
    name="unproses">Batal</button>
    </form>
    @endforeach
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop