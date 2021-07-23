@extends('layouts.base')
@section('content')
    <div class="crud-title">
        <h1 class="section-title text-center">Modifica stato</h1>
    </div>
  <div class="container crud-form" style="padding-top: 25px; padding-bottom: 25px;">
    <form id="validateForm" action="{{route('leads.update',compact('lead'))}}" method="post" >
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="status">Stato</label>
        <select class="form-control"  name="status">
          <option value="da gestire" {{ $lead->status=="da gestire" ? 'selected=selected' : ""}}>Da gestire</option>
          <option value="ok" {{ $lead->status=="ok" ? 'selected=selected' : ""}}>Ok</option>
          <option value="non ok" {{ $lead->status =="non ok" ? 'selected=selected' : ""}}>Non ok</option>
        </select>
      </div>
      <div class="d-flex justify-content-between form-buttons">
        <a href="{{route('offers.index')}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alla lista leads</a>
        <input class="btn my-btn-bg" type="submit" name="" value="Invia">
         </div>

    </form>
  </div>
@endsection
