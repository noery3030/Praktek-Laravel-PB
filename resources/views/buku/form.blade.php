
@extends('adminlte::page')
@section('title', 'Form Mahasantri')
@section('content_header')
<h1>Form Pengarang</h1>
@stop
@section('content')
@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <form  method="POST" action="{{ route('buku.store') }}">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan oleh pengguna yang tidak terautentikasi  --}}
        <div class="form-grup">
            <label>ISBN</label><input type="text" name="isbn" class="form-control">
        </div>
        <div class="form-grup">
            <label>Judul</label><input type="text" name="judul" class="form-control">
        </div>
        <div class="form-grup">
            <label>Tahun Cetak</label><input type="text" name="tahun_cetak" class="form-control">
        </div>
        <div class="form-grup">
            <label>Stok</label><input type="text" name="stok" class="form-control">
        </div>
        <div class="form-group">
        <label> ID Pengarang</label>
        <select class="form-control" name="idpengarang">
            <option value="">-- Pilih Pengarang --</option>
            @foreach($rs1 as $p1)
            <option value="{{ $p1->id }}">{{ $p1->nama }}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
        <label> ID Penerbit</label>
        <select class="form-control" name="idpenerbit">
            <option value="">-- Pilih Penerbit --</option>
            @foreach($rs2 as $p2)
            <option value="{{ $p2->id }}">{{ $p2->nama }}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
        <label> ID Kategori</label>
        <select class="form-control" name="idkategori">
            <option value="">-- Pilih Pengarang --</option>
            @foreach($rs3 as $kt)
            <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
            @endforeach
        </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop