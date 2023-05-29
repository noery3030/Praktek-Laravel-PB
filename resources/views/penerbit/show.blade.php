@extends('adminlte::page')
@section('title', 'Data Penerbit')
@section('content_header')
<h1>Data Penerbit</h1>
@stop
@section('content')
    @foreach($ar_penerbit as $pen)
    <div class="media">
        @php 
            if(!empty($pen->cover)){
            @endphp
                <img src="{{ asset('images') }}/{{ $pen->cover }}" width="10%" class="mr-3" alt="">
                @php 
            }else{
                @endphp 
                <img src="{{ asset('images') }}/nocover.gif" width="10%" class="mr-3" alt="">
                @php 
            }
            @endphp 
            <div class="media-body">
                
                <p>
                    Nama : {{ $pen->nama }}
                    <br>Alamat : {{ $pen->alamat }} 
                    <br> Email : {{ $pen->email }}
                    <br> Website : {{ $pen->website }}
                    <br> Telpon : {{ $pen->telepon }}
                    <br> CP : {{ $pen->cp }}
                </p>
                <hr><a href="{{ url('/penerbit') }}" class="btn btn-primary">Go Back</a>
            </div>
    </div>
    @endforeach
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop