@extends('layouts.app')
@section('title') Modifica Box @endsection
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12 pt-5 mt-5">
            <h2>Modifica Box</h2>
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
        <div class="table-responsive">



            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Quantità</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Componente</th>
                    <th scope="col">Aggiorna</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td class="text-truncate">{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }} € </td>

                            <td>
                                @foreach ($product->resources as $resource)
                                {{ $resource->name }}
                                @endforeach
                            </td>

                            <td><a href="{{ route('product.edit', $product) }}">Modifica</a></td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
