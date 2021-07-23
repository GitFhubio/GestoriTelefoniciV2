@extends('layouts.base')
@section('content')


    <div class="section product-container d-flex align-items-center flex-column crud-show" style="padding-top: 25px; padding-bottom: 25px;">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="{{asset($operator->img)}}" >
            <div class="card-body">
            <p class="card-text"><strong>Nome: </strong>{{$operator->name}}</p>
            <p class="card-text"><strong>Email: </strong>{{$operator->email}}</p>
            <p class="card-text"><strong>Data registrazione: </strong>{{$operator->created_at}}</p>
            <p class="card-text"><strong>Numero offerte attive: </strong>{{$operator->offers->count()}}</p>
            </div>
        </div>
        <div class="buttons" style="margin-top: 15px;">
            <a href="{{route('operators.index')}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alla lista operatori</a>
        </div>
    </div>

@endsection
