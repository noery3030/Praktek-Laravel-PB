@extends('adminlte::page')
@section('title', 'Data Penerbit')
@section('content_header')
<h1>Data Penerbit</h1>
@stop
@section('content') {{-- Isi Konten Data Pegawai --}}
@php
$ar_judul = ['No','Nama', 'Alamat','Email', 'Website','Telepon','CP','Action'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('penerbit.create') }}" role="button">Tambah</a>
<a class="btn btn-secondary" href="{{ url('home') }}" role="button">Back</a>
<a href="{{ url('penerbitpdf') }}" class="btn btn-info ms-2"><i class="fas fa-file-pdf"></i> </a>
<a href="{{ url('penerbitcsv') }}" class="btn btn-warning ms-2"><i class="fas fa-file-csv"></i></a>
<form action="{{route('penerbit.index')}}" >
    <div class="input-group">
        <input name="keyword" type="text" value="{{Request::get('keyword')}}"
        class="form-control mt-3" />
        <div class="input-group-append">
            <input type="submit" value="Filter" class="btn btn-primary mt-3">
        </div>
    </div>
</form>
<table class="table table-striped mt-5">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>

    <tbody>
    @foreach($ar_penerbit as $pen)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $pen->nama }}</td>
            <td>{{ $pen->alamat }}</td>
            <td>{{ $pen->email }}</td>
            <td>{{ $pen->website }}</td>
            <td>{{ $pen->telepon }}</td>
            <td>{{ $pen->cp }}</td>
            <td>
                <form method="POST" action="{{ route('penerbit.destroy', $pen->id) }}">
                    @csrf {{--security unutk menghindari dari seranganpada saat input form--}}
                    @method('delete')
                    <a class="btn btn-info" 
                    href="{{ route('penerbit.show', $pen->id) }}">Detail
                    </a>
                    <a class="btn btn-success" 
                    href="{{ route('penerbit.edit', $pen->id) }}">Edit
                    </a>
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"> Hapus
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $ar_penerbit->links() }}
@stop