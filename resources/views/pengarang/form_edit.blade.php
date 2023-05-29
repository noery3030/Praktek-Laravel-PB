@extends('adminlte::page')
@section('title', 'Form Buku')
@section('content_header')
<h1>Data Buku</h1>
@stop
@section('content')
{{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form edit buku --}}
@foreach($data as $rs)
    <form method="POST" action="{{ route('pengarang.update',$rs->id) }}"
    enctype="multipart/form-data">
    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
    @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah
    disetiap element form edit buku --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{ $rs->email }}" class="form-control"/>
    </div>

    <div class="form-group">
        <label>NO HP</label>
        <input type="text" name="hp" value="{{ $rs->hp}}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>FOTO</label>
        <input type="file" name="foto" value="{{ $rs->foto}}" class="form-control"/>
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