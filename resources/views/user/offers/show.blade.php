@extends('layouts.base')
@section('content')
    <div class="section product-container d-flex align-items-center flex-column crud-show" style="padding-top: 25px; padding-bottom: 25px;">
        <div class="section-title-container">
            <h1 class="section-title">{{ $offer->name }}</h1>
        </div>
        <div class="card" style="width: 20rem;">
            <div class="card-body">
            <p class="card-text"><strong>Categori{{$offer->categories->count()>1 ? 'e' : 'a'}} : </strong>@foreach ($offer->categories as $category)
                {{$category->nome}}
                @endforeach</p>
            <p class="card-text"><strong>Costo mensile: </strong>{{$offer->costo_mensile}} €</p>
            <p class="card-text"><strong>Descrizione: </strong>{{$offer->descrizione}}</p>
            <p class="card-text"><strong>Data inizio: </strong>{{$offer->data_inizio}}</p>
            <p class="card-text"><strong>Data fine: </strong>{{$offer->data_fine}}</p>
            </div>
        </div>
        <div class="buttons" style="margin-top: 15px;">
            <a href="{{route('offers.index')}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alla lista offerte</a>
            <a href="{{route('offers.create')}}" class="btn my-btn-bg " role="button" aria-pressed="true">Inserisci nuova offerta </a>
        </div>
    </div>
@endsection
