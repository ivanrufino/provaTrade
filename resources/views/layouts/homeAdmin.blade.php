@extends('layouts.home')

@section('content')
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="/dashboard" class="list-group-item  list-group-item-action @if(Route::currentRouteName()=='dashboard') active @endif ">Home</a>
                <a href="/dashboard/dadospessoais" class="list-group-item list-group-item-action  @if(Route::currentRouteName()=='dadospessoais') active @endif ">Dados Pessoais</a>
                <a href="#" class="list-group-item list-group-item-action @if(Route::currentRouteName()=='#') active @endif">Dados Profissionais</a>
                <a href="/dashboard/minhasfotos" class="list-group-item list-group-item-action @if(Route::currentRouteName()=='minhasfotos') active @endif">Fotos</a>
                <a href="/financeiro/planos" class="list-group-item list-group-item-action @if(Route::currentRouteName()=='planos') active @endif">Planos e Produtos</a>
                <a href="#" class="list-group-item list-group-item-action disabled @if(Route::currentRouteName()=='videos') active @endif">Videos</a>
            </div>

<!--            <ul class="list-group">
                <li class="list-group-item"><a href='/dashboard/dadospessoais'>Dados Pessoais</a></li>
                <li class="list-group-item"><a href='#'>Dados Profissionais</li>
                <li class="list-group-item"><a href='#'>Fotos</li>
                <li class="list-group-item"><a href='#'>Videos</li>
                <li class="list-group-item"><a href='#'>Agenda</li>
            </ul>-->
        </div>
        <div class="col-md-9">
          @yield('content_home')

        </div>
    </div>
    
    
    @if(Auth::user()->chat[0]['situacao'])
      @include('chat.home')
    @else
        OffLine
    @endif
</div>
@endsection
