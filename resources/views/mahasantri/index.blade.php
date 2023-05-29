@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
<h1>Data Mahasantri</h1>
@stop
@section('content') {{-- Isi Konten Data Pegawai --}}
@php
$ar_judul = ['No','NIM','Nama', 'Jurusan','Alamat','Kota','Provinsi','Email'];
$no = 1;
@endphp
    <a class="btn btn-success btn-md"
    href="{{ route('mahasantri.create') }}" role="button">Tambah Mahasantri</a><br/><br/>
    <a class="btn btn-secondary btn-md"
    href="{{ url('home') }}" role="button">Back</a><br/><br/>
<table class="table table-striped">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach($ar_mahasantri as $mhs)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>{{ $mhs->alamat }}</td>
            <td>{{ $mhs->kota }}</td>
            <td>{{ $mhs->provinsi }}</td>
            <td>{{ $mhs->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop