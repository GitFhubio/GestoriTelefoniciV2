@extends('layouts.base')
@section('content')
    <div class="crud-title">
        <h1 class="section-title text-center">Modifica operatore</h1>
    </div>
  <div class="container crud-form" style="padding-top: 25px; padding-bottom: 25px;">
    <form id="validateForm" action="{{route('operators.update',compact('operator'))}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nome</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{$operator->name }}">
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" value="{{$operator->email}}">
        <div class="invalid-feedback">
          {{$errors->first('email')}}
        </div>
      </div>
      <div class="form-group">
        <label for="image">Immagine
        <img src="{{asset($operator->img )}}" style="height:80px;width:auto;" alt=""></label>
        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : ''}}"  type="file" name="image">
        <div class="invalid-feedback">
            {{$errors->first('image')}}
          </div>
    </div>
    <div class="form-group">
        <label for="banner">Banner
        <img src="{{asset($operator->backimg )}}" style="height:80px;width:auto;" alt=""></label>
        <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : ''}}"  type="file" name="banner">
        <div class="invalid-feedback">
            {{$errors->first('banner')}}
          </div>
    </div>
      <div class="d-flex justify-content-between form-buttons">
        <a href="{{route('operators.index')}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alla lista operatori</a>
        <input class="btn my-btn-bg" type="submit" name="" value="Invia">
         </div>
    </form>
  </div>
@endsection
