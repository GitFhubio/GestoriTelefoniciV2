@extends('layouts.base')
@section('content')

<div class="crud-title">
    <h1 class="section-title text-center">Lista operatori telefonici</h1>
</div>
<div style="min-height:50vh;" class="table-responsive">
<table class="table table-striped crud-table text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Operatore</th>
        @can('edit-users')
        <th scope="col">Azioni</th>
        @endcan
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $key=>$user)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$user->name}}</td>
            @can('edit-users')
            <td>
            <a class="btn my-btn-bg my-btn-edit" href="{{route('operators.edit',['operator'=>$user])}}">Modifica<i class="fas fa-edit"></i></a>
            <a class="btn my-btn-bg my-btn-show" href="{{route('operators.show',['operator'=>$user])}}">Mostra<i class="fa fa-eye"></i></a>
                <button type="button" class="btn my-btn-delete" data-toggle="modal" data-target="#exampleModal{{$user->id}}">Cancella<i class="fas fa-trash"></i>
                </button>
                @include('layouts.modal2')
                 </td>
            </td>
            @endcan
          </tr>
       @endforeach
    </tbody>
  </table>
</div>
@endsection
