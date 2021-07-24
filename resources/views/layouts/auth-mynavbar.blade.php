{{-- <nav id="navbar">
    <div class="header-left">
      <div class="logo" >
          <a href="/">
        <img src="{{ asset('my-img/logo.png') }}" alt="logo">
          </a>
      </div>
    </div>
    <div class="header-right" @mouseleave="hideDrop">
      <ul>
        <li v-for="(menu,index) in menulist" @mouseenter="showDrop(index)"><a href="">@{{menu.voce}}</a>
          <ul @mouseleave="hideDrop" v-if="indexNav === index" class="dropdown">
            <li v-for="item in menu.content">@{{item}}</li>
          </ul>
        </li>
      </ul>
      <ul>
        <li @mouseenter="hideDrop" class="nav-button">Schedule a call</li>
        @if (!Auth::check())
        <li><a class="btn btn-light  mr-sm-1 my-btn-login" href="/login">Accedi</a></li>
        <li><a class="btn btn-light my-btn-register" href="/register">Registrati</a></li>
    @else
            <li><a class="btn btn-light my-btn-login" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                {{ __('Esci') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form></li>
    @endif
    <li><a href=""><i class="fas fa-shopping-cart"></i></a></li>
    <li><a href=""><i class="fas fa-search"></i></a></li>
    <li @click="toggled=!toggled"><a><i class="fas fa-bars"></i></a></li>
      </ul>

    </div>
    <div class="toggle-menu"  v-if="toggled">
        <ul class="left">
            <li v-for="(menu,index) in menulist" @mouseenter="showDrop(index)"><a href="">@{{menu.voce}}</a>
              <ul @mouseleave="hideDrop" v-if="indexNav === index" class="dropdown">
                <li v-for="item in menu.content">@{{item}}</li>
              </ul>
            </li>
        </ul>
          <a href="#"><i @click="toggled=!toggled" class="fa fa-times" aria-hidden="true"></i></a>
    </div>
</nav> --}}

<navbar-component img_path="{{ asset('my-img/logo.png') }}">

@if (!Auth::check())
    <li><a class="btn btn-light  mr-sm-1 my-btn-login" href="/login">Accedi</a></li>
    <li><a class="btn btn-light my-btn-register" href="/register">Registrati</a></li>
@else
<li><a href="{{Auth::id()==1 ? '/user/dashboard' : '/user/offerscrud'}}" >Dashboard</a></li>
<li><a class="btn btn-light my-btn-login" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            {{ __('Esci') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form></li>
@endif

</navbar-component>
