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
            <form method="POST" action="{{ route('resource.update', $resource) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label>Nome Componente</label>
                  <input type="text" name="name" class="form-control" value="{{ $resource->name }}">
                </div>
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="number" name="price" class="form-control" placeholder="00,00 €" step="0.01" min=0 value="{{ $resource->price }}">
                </div>
                <div class="form-group">
                  <label >Descrizione</label>
                  <textarea id="txtdesc" name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="quantitaAttuale">Rimanenze attuale</label>
                        <input id="quantitaAttuale" type="hidden" name="quantity" class="form-control" placeholder="" min=0 value="{{ $resource->quantity }}">

                        <p>{{ $resource->quantity }}</p>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="aggiungiQuantita">Aggiungi alle rimanenze</label>
                        <input id="aggiungiQuantita" type="number" name="addresource" class="form-control"  min=0 value=0 >
                    </div>
                </div>
                <div class="form-group">
                    <label>Codice Componente</label>
                    <input type="text" name="code" class="form-control" value="{{ $resource->resource_code }}">
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

<script>
    let textarea = document.querySelector("#txtdesc")
    textarea.innerHTML = "{{ $resource -> description }}"

/*     let quantity = document.querySelector('#quantitaAttuale');
    let addquantity = document.querySelector('#aggiungiQuantita');

    let quantityvalue = document.getElementById('quantitaAttuale').value;
    let addquantityvalue = document.getElementById('aggiungiQuantita').value;
    console.log(addquantityvalue)
    console.log(quantityvalue)

    addquantity.onchange = function prova(){

            quantity.classList.add("unselectable");
            console.log("funzione eseguito")
            console.log(quantityvalue)
            console.log(addquantityvalue);

    } */









</script>

@endsection
