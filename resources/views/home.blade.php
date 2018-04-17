@extends('layouts.app')

@section('content')
<div class="container">
    <!--<div class="row">-->

        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Agenda de Contatos </h3></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
                <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr><th colspan=2><a href="{{route('createContact')}}" class='btn btn-info'> <i class='ion-android-person-add'> Adicionar</i></a></th> 
                <th colspan=2>
                <form action="{{route('search')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="search" placehold="Digite o nome o email">
                        <button class='btn btn-info'><i class='ion-ios-search-strong'></i></button>
                    </form>
                </th></tr>
                <tr><th>Nome</th><th>Email</th><th>Telefone</th><th></th></tr>
                </thead>
                <tbody>
                @foreach( $contatos as $contato )
                <tr>
                    <td>{{$contato['name']}}</td> 
                    <td>{{$contato['email']}}</td> 
                    <td>{{$contato['tel_number']}}</td> 
                    <td >
                    <div class='row'>
                    <div class="col col-md-6">
                    <form action="{{ url('remove' , 13 ) }}" id="removeContact" method="POST">
                        {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button  class="btn btn-default" >
                        <i class="ion-trash-b" ></i>
                    </button>
                    </form>
                    </div>
                    <div class="col col-md-6">
                    <a href="/edit/{{$contato['id']}}" class="btn btn-info"><i class='ion-edit '></i></a>
                    </div>
                    </div>
                    </td> 
                </tr>
                 @endforeach
                 </tbody>
                 <tfooter>
                 <tr><th colspan=4><a href="{{route('createContact')}}" class='btn btn-info'> <i class='ion-android-person-add'> Adicionar</i></a></th></tr>
                 </tfooter>
                </table>
                
                   
            </div>
        </div>
       
    <!--</div>-->
</div>
@endsection
