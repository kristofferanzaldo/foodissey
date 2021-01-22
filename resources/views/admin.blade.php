@extends('layouts.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center pt-5 mt-5">
        <div class="col-12">
            <h2>Bentornato {{ Auth::user()->name }}</h2>
        </div>
    </div>
    <div class="row justify-content-center align-content-center my-3">
        <div class="col-12 col-sm-6 col-lg-3 text-center">
            <a class="btn btn-main py-2 my-2" href="{{ route('product.create') }}">Crea Box</a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 text-center">
            <a class="btn btn-main py-2 my-2" href="{{ route('product.index') }}">Modifica Box</a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 text-center">
            <a class="btn btn-main py-2 my-2" href="{{ route('resource.create') }}">Crea Componente Box</a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 text-center">
            <a class="btn btn-main py-2 my-2" href="{{ route('resource.index') }}">Aggiorna Componente</a>
        </div>
    </div>

</div>
@endsection
