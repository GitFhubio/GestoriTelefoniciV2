@extends('layouts.base')
@section('title',$offer->name)
@section('content')
<div id="offer-detail">
    @if (isset($offer->user->backimg))
<div class="header" style="background-image:radial-gradient(rgba(0,2,17,0.16) 0%,rgba(0,2,17,0.4) 100%),url({{ asset($offer->user->backimg) }});background-position:center center;">
</div>
@endif
<div class="jumbotron" style="background-color: #EAEFD3;">
    <h1 class="display-4">{{ $offer->name}}</h1>
    <p class="lead">{{ $offer->descrizione }}</p>
    <hr class="my-4">
    <p>Costo mensile : {{ $offer->costo_mensile}} €</p>
    <p>Attivabile entro il : {{ $offer->data_fine}}</p>
    <div>
        @foreach($offer->categories as $category)
        <span style="background-color:#FE9A25;" class="badge rounded-pill">{{$category->nome}}</span>
        @endforeach
     </div>
  </div>
 <div id="leavemessage" @click="show=!show" class="text-center">
{{-- <a href="#crudform">Lascia un messaggio</a> --}}
<a href="#crudform"><h2>Serve aiuto?</h2></a>
    </div>
  <div id="crudform" v-if="show" class="container crud-form" >
    <form id="validateForm" action="{{route('getInfo.store')}}" method="post" >
      @csrf
      @method('POST')
      <div class="form-group">
        <label for="brand">Nome</label>
        <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" type="text" name="nome">
        <div class="invalid-feedback">
          {{$errors->first('nome')}}
        </div>
      </div>
      <div class="form-group">
        <label for="description">Messaggio</label>
        <textarea class="form-control {{ $errors->has('messaggio') ? 'is-invalid' : ''}}" type="text" name="messaggio"></textarea>
        <div class="invalid-feedback">
          {{$errors->first('messaggio')}}
        </div>
      </div>
      <div class="form-group">
        <label for="brand">Cognome</label>
        <input class="form-control {{ $errors->has('cognome') ? 'is-invalid' : ''}}" type="text" name="cognome">
        <div class="invalid-feedback">
          {{$errors->first('cognome')}}
        </div>
      </div>
      <div class="form-group">
        <label for="brand">Telefono</label>
        <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : ''}}" type="text" name="telefono">
        <div class="invalid-feedback">
          {{$errors->first('telefono')}}
        </div>
      </div>
      {{-- <input type = "hidden" name = "data_ricezione" value = {{ date("Y-m-d H:i:s")}}  /> --}}
      <input type = "hidden" name = "status" value = 'da gestire' />
      <input type = "hidden" name = "offer_id" value = {{$offer->id}} />
      <div class="form-group">
        <label for="brand">Email</label>
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email">
        <div class="invalid-feedback">
          {{$errors->first('email')}}
        </div>
      </div>
      <div class="d-flex justify-content-between form-buttons">
        <a href="/operators/{{ $offer->user->id}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alle offerte {{$offer->user->name}}</a>
        <input class="btn my-btn-bg" type="submit" name="" value="Invia">
         </div>
    </form>
  </div>
</div>
@endsection


