@extends('layouts.base')
@section('content')
<div class="crud-title">
    <h1 class="section-title text-center">Lista messaggi</h1>
</div>
<div style="min-height:50vh;" class="table-responsive">
<table class="table table-striped crud-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Contenuto</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($lead->notes as $key=>$note)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$note->lead->email}} </td>
            <td>{{$note->messaggio}}</td>
          </tr>
       @endforeach
    </tbody>
  </table>
  <div class="text-center">
  <a href="{{route('offers.index')}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alla lista leads</a>
</div>
</div>
@endsection
