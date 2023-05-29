@extends('adminlte::page')
@section('title', 'Data Pengarang')
@section('content_header')
<h1>Data Pengarang</h1>
@stop
@section('content')
    @foreach($ar_pengarang as $peng)
    <div class="card"  style="width: 18rem;">
    @php
    if(!empty($peng->foto)){
    @endphp
    <img src="{{ asset('images')}}/{{ $peng->foto }}" width="80%" class="card-img-top"/>
    @php
    }else{
    @endphp
    <img src="{{ asset('images')}}/nophoto.png" width="80%"
    class="card-img-top"/>
    @php
}
@endphp
            <div class="card-body">
                
                <p>
                    Nama : {{ $peng->nama }}
                    <br>email : {{ $peng->email }} <br> NO Hp : {{ $peng->hp }}
                </p>
                <hr><a href="{{ url('/pengarang') }}" class="btn btn-primary">Go Back</a>
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