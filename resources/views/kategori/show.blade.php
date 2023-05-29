@extends('adminlte::page')
@section('title', 'Data Kategori')
@section('content_header')
<h1>Data Kategori</h1>
@stop
@section('content')
    @foreach($ar_kategori as $k)
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
                    Kategori : {{ $k->nama }}
                </p>
                <hr><a href="{{ url('/kategori') }}" class="btn btn-primary">Go Back</a>
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