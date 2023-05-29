@extends('adminlte::page')
@section('title', 'Data Kategori')
@section('content_header')
<h1>Data Kategori</h1>
@stop
@section('content') {{-- Isi Konten Data Pegawai --}}
@php
$ar_judul = ['No','Kategori'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('kategori.create') }}" role="button">Tambah</a>
<a class="btn btn-secondary" href="{{ url('home') }}" role="button">Back</a>
<table class="table table-striped mt-5">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>

    <tbody>
    @foreach($ar_kategori as $k)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $k->nama }}</td>
            <td>
                <form method="POST" action="{{ route('kategori.destroy', $k->id) }}">
                    @csrf {{--security unutk menghindari dari seranganpada saat input form--}}
                    @method('delete')
                    <a class="btn btn-info" 
                    href="{{ route('kategori.show', $k->id) }}">Detail
                    </a>
                    <a class="btn btn-success" 
                    href="{{ route('kategori.edit', $k->id) }}">Edit
                    </a>
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"> Hapus
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop