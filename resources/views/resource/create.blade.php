@extends('layouts.app')
@section('title') Creazione Componente Box @endsection
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12 pt-5 mt-5">
            <h2>Crea Componente Box</h2>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-12 mt-2">
            <form method="POST" action="{{ route('resource.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Nome Componente</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="number" name="price" class="form-control" placeholder="00,00 €" step="0.01" min=0>
                </div>
                <div class="form-group">
                  <label >Descrizione</label>
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Quantità Iniziale</label>
                    <input type="number" name="quantity" class="form-control" placeholder="" min=0>
                </div>
                <div class="form-group">
                    <label>Codice Componente</label>
                    <input type="text" name="code" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label class="h2">Foto</label>
                    <input name="img" type="file" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-main">Salva</button>
              </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
@endsection
