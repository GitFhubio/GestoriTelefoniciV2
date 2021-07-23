@extends('layouts.base')
@section('title',$user->name)
@section('content')

<div id="public-menu">
    @if($user->backimg)
    <div class="header" style="background-image:radial-gradient(rgba(0,2,17,0.16) 0%,rgba(0,2,17,0.4) 100%),url({{ asset($user->backimg) }});background-position:center center;">
    </div>
    @endif
    @php
$count=0;
foreach ($user->offers as $offer) {
 $count +=1;
    }
    @endphp

    @if ($count>0)
    <div class="main">
    <section class="section">
        <div class="section-title-container text-center">
            <h2 class="text-center section-title">Offerte {{$user->name}}</h2>
        </div>
        <ol class="list-group list-group-numbered">
            @foreach ($user->offers as $key=> $offer)
                                 <li style="background-color: #EAEFD3;"class="list-group-item d-flex align-items-start justify-content-between">
                                     <div class="ms-2 me-auto">
                                         <div class="fw-bold">{{ $offer->name}}</div>
                                         <a href="/offers/{{$offer->id}}" >Vai al dettaglio dell'offerta</a>
                                       </div>
                                       <div>
                                       @foreach($offer->categories as $category)
                                       <span style="background-color:#FE9A25;" class="badge rounded-pill">{{$category->nome}}</span>
                                       @endforeach
                                    </div>
                                 </li>
                     @endforeach
                 </ol>
    </section>
</div>
@else
<h3 style="padding:20px;">Il gestore non ha attualmente offerte attivabili.</h3>
@endif
<div class="back-home text-center">
    <a  href="/">Torna alla home</a>
   </div>
</div>
@endsection


