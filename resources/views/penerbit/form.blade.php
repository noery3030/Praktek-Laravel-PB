
@extends('adminlte::page')
@section('title', 'Form Mahasantri')
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
    <form  method="POST" action="{{ route('penerbit.store') }}">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan oleh pengguna yang tidak terautentikasi  --}}
        <div class="form-grup">
            <label>Nama</label><input type="text" name="nama" class="form-control">
        </div>
        <div class="form-grup">
            <label>Alamat</label><input type="text" name="alamat" class="form-control">
        </div>
        <div class="form-grup">
            <label>Email</label><input type="text" name="email" class="form-control">
        </div>
        <div class="form-grup">
            <label>Website</label><input type="text" name="Website" class="form-control">
        </div>
        <div class="form-grup">
            <label>Telepon</label><input type="text" name="telepon" class="form-control">
        </div>
        <div class="form-grup">
            <label>CP</label><input type="text" name="cp" class="form-control">
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