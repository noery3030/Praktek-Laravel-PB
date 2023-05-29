@extends('adminlte::page')
@section('title', 'Data pengarang')
@section('content_header')
<h1>Data pengarang</h1>
@stop
@section('content') {{-- Isi Konten Data Pegawai --}}
@php
$ar_judul = ['No','Nama','email', 'No Hp', 'Foto','Action'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('pengarang.create') }}" role="button">Tambah</a>
<a class="btn btn-secondary " href="{{ url('home') }}" role="button">Back</a>
<table class="table table-striped mt-5">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>

    <tbody>
    @foreach($ar_pengarang as $peng)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $peng->nama }}</td>
            <td>{{ $peng->email }}</td>
            <td>{{ $peng->hp }}</td>
            <td>
                        @php
                        if(!empty($peng->foto)){
                        @endphp
                            <img src="{{ asset('images') }}/{{ $peng->foto }}" width="50px"> 
                        @php
                        }else{
                        @endphp
                            <img src="{{ asset('images') }}/nophoto.png" width="50px">
                        @php
                        }
                        @endphp
                    </td>
            <td>
                <form method="POST" action="{{ route('pengarang.destroy', $peng->id) }}">
                    @csrf {{--security unutk menghindari dari seranganpada saat input form--}}
                    @method('delete')
                    <a class="btn btn-info" 
                    href="{{ route('pengarang.show', $peng->id) }}">Detail
                    </a>
                    <a class="btn btn-success" 
                    href="{{ route('pengarang.edit', $peng->id) }}">Edit
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