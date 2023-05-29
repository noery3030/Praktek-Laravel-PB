
@extends('adminlte::page')
@section('title', 'Pengarang')
@section('content_header')
<h1>Form Pengarang</h1>
@stop
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <form  method="POST" action="{{ route('pengarang.store') }}" enctype="multipart/form-data">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan oleh pengguna yang tidak terautentikasi  --}}
        <div class="form-grup">
            <label>Nama</label><input type="text" name="nama" class="form-control">
        </div>
        <div class="form-grup">
            <label>Email</label><input type="text" name="email" class="form-control">
        </div>
        <div class="form-grup">
            <label>No Hp</label><input type="text" name="hp" class="form-control">
        </div>
        <div class="form-grup">
            <label>Foto</label><input type="file" name="foto" class="form-control">
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