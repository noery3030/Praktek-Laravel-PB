@extends('adminlte::page')
@section('title', 'Data Pegawai')
@section('content_header')
<h1>Data Pegawai</h1>
@stop
@section('content') {{-- Isi Konten Data Pegawai --}}
@php
$ar_judul = ['No','NIP','Nama','Alamat','Email'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"
    href="{{ route('pegawai.create') }}" role="button">Tambah Pegawai</a><br/><br/>
<table class="table table-striped">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach($ar_pegawai as $peg)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $peg->nip }}</td>
            <td>{{ $peg->nama }}</td>
            <td>{{ $peg->alamat }}</td>
            <td>{{ $peg->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop