@php
$myvar=[];
@endphp
@foreach ($offers as $key=>$offer)
@if($offer->leads->count()>0)
@php
$myvar[]=true;
@endphp
@endif
@endforeach

@extends('layouts.base')
@section('content')
<div style="min-height:100vh;">
@if ($offers->count()>0 )
<div class="crud-title">
    <h1 class="section-title text-center">Le tue offerte</h1>
</div>
<div class="table-responsive">
<table class="table table-striped crud-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Costo mensile</th>
        <th scope="col">Data inizio</th>
        <th scope="col">Data fine</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($offers as $key=>$offer)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$offer->name}}</td>
            <td>@foreach ($offer->categories as $category)
                {{$category->nome}}
                @endforeach
            </td>
            <td>{{$offer->costo_mensile}} €</td>
            <td>{{$offer->data_inizio}}</td>
            <td>{{$offer->data_fine}}</td>
           <td><a class="btn my-btn-bg my-btn-show" href="{{route('offers.show',compact('offer'))}}">Mostra<i class="fa fa-eye"></i></a>
           <a class="btn my-btn-bg my-btn-edit" href="{{route('offers.edit',compact('offer'))}}">Modifica<i class="fas fa-edit"></i></a>
           <button type="button" class="btn my-btn-delete" data-toggle="modal" data-target="#exampleModal{{$offer->id}}">Cancella<i class="fas fa-trash"></i>
           </button>
           @include('layouts.modal')
            </td>
          </tr>
        @endforeach
  </table>
</div>
@else
<div class="crud-title">
    <h1 class="section-title text-center">Non hai offerte</h1>
</div>
@endif
<div class="text-center">
    <a class="btn my-btn-bg my-btn-create" href="{{route('offers.create')}}">Nuova offerta <i style="padding-left:2px;" class="fas fa-plus-circle"></i></a>
</div>
@if (count($myvar)>0)
<div class="crud-title">
    <h1 class="section-title text-center">I tuoi leads</h1>
</div>
@endif
@foreach ($offers as $key=>$offer)
@if($offer->leads->count()>0)
@php
$myvar[]=true;
@endphp
<div class="table-responsive">
<table class="table table-striped crud-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Offerta</th>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
        <th scope="col">Data ricezione</th>
        <th scope="col">Stato</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($offer->leads as $key=>$lead)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$lead->offer->name}}</td>
            <td>{{$lead->nome}}</td>
            <td>{{$lead->cognome}}</td>
            <td>{{$lead->telefono}}</td>
            <td>{{$lead->email}}</td>
            <td>{{$lead->created_at}}</td>
            <td>{{$lead->status}}</td>
            <td>
            <a class="btn my-btn-bg my-btn-edit" href="{{route('leads.edit',compact('lead'))}}">Modifica stato<i class="fas fa-edit"></i></a>
            <a class="btn my-btn-bg my-btn-edit" href="{{route('leads.show',compact('lead'))}}">Visualizza messaggi<i class="fas fa-eye"></i></a>
        </td>
          </tr>
        @endforeach
  </table>
</div>
@endif
@endforeach
@if ($offers->count()>0 && count($myvar)==0)
<div class="text-center" style="margin-top:5vh;">
    <h1 class="section-title ">Non hai leads</h1>
</div>
@endif
</div>
@endsection
