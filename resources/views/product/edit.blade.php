@extends('layouts.app')
@section('title') Modifica Box @endsection
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12 pt-5 mt-5">
            <h2>Crea Box</h2>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
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
            <form method="POST" action="{{-- {{ route('product.update') }}  --}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Nome Box</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="number" name="price" class="form-control" placeholder="00,00 €" step="0.01" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Componente Box</label>
                    <select multiple name="resources[]" class="form-control" id="exampleFormControlSelect2">

                        @foreach ($resources as $resource)
                            @foreach ($product->resources as $risorse)
                                @if ($risorse->id == $resource->id)
                                <option selected value="{{$risorse->id}}">{{ $risorse->name }}</option>
                                @break
                                @else
                                @continue
                                @endif
                            @endforeach
                            @if ($risorse->id != $resource->id)
                            <option value="{{$resource->id}}">{{ $resource->name }}</option>
                            @endif
                        @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Descrizione</label>
                  <textarea name="description" class="form-control" id="txtdesc" rows="3"></textarea>
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
    textarea.innerHTML = "{{ $product->description }}"
</script>
    @endsection
