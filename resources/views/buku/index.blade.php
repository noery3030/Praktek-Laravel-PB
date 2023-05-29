@extends('adminlte::page')
@section('title', 'Data Buku')
@section('content_header')
<h1>Data Buku</h1>
@stop
@section('content') {{-- Isi Konten Data Pegawai --}}
@php
$ar_judul = ['No','ISBN','Judul', 'Stok','Pengarang','Penerbit','Kategori', 'Action'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('buku.create') }}" role="button">Tambah</a>
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
    @foreach($ar_buku as $b)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $b->isbn }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->nama }}</td>
            <td>{{ $b->pen }}</td>
            <td>{{ $b->kat }}</td>
            <td>
                <form method="POST" action="{{ route('buku.destroy', $b->id) }}">
                    @csrf {{--security unutk menghindari dari seranganpada saat input form--}}
                    @method('delete')
                    <a class="btn btn-info" 
                    href="{{ route('buku.show', $b->id) }}">Detail
                    </a>
                    <a class="btn btn-success" 
                    href="{{ route('buku.edit', $b->id) }}">Edit
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