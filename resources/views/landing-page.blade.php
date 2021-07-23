@extends('layouts.base')
@section('title','Home')
@section('content')
<landing-page></landing-page>

{{-- <link rel="preconnect" href="https://fonts.gstatic.com">
<div id="landing">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Benvenuto in GestoriTelefonici.it</h1>
              <p class="lead">Scopri le offerte di migliaia di compagnie e scegli quella più adatta a te!</p>
            </div>
          </div>
<main class="container landing-page">
    <div class="section-title-container">
        <h2 class="text-center section-title" style="margin-top: 20px">I nostri operatori</h2>
    </div>
    <item-section :items="operators" class="section d-flex flex-wrap justify-content-center operatorsSection">
       </item-section>
    <section class="section">
        <div class="d-flex flex-wrap justify-content-center categoriesSection">
            <div @click="selectedCategory(category)" v-for="(category, indexCategory) in categories" :key="indexCategory" :class="'categories text-center' + (selected === category.name ? ' active-category ' : '')">
                <img :src="category.img" alt="">
                <h4>@{{category.nome}}</h4>
            </div>
        </div>
        <form v-if="selected!='All'" class="form-inline my-3 advanced-search">
            <button class="btn reset-btn btn-bg-black" @click="showAll()">Torna alle offerte più recenti</button>
        </form>
    </section>
    <div class="section-title-container">
        <h2 class="text-center section-title" style="margin-top: 20px">@{{selected === 'All' ? 'Le offerte più recenti' : 'Hai cercato offerte '+selected}}</h2>
    </div>
    <item-section :items="offers" :parameter="operators" class="section d-flex flex-wrap justify-content-center offersSection">
    </item-section>
</main>
</div> --}}
@endsection
