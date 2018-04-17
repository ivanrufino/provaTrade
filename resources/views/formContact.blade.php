@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-12 col-md-offset-2">
            <div class="card ">
                <div class="card-heading"><div class='card-title'><h3>Agenda de Contatos - {{$action}}</h3></div> </div>
                <div class="card-body">
                   

                   
             
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <form class="form-horizontal" method="POST" action="{{route($action)}} ">
                        {{ csrf_field() }}
                       <input type='hidden' name='id' value='{{$contato->id}}'>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$contato->name )}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"  @if($action =="Alterar") disabled @endif name="email" value="{{ old('email',$contato->email ) }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel_number') ? ' has-error' : '' }}">
                            <label for="tel_number" class="col-md-4 control-label">Telefone</label>
                            <div class="col-md-6">
                                <input id="tel_number" type="text" class="form-control" name="tel_number" value="{{ old('tel_number',$contato->tel_number ) }}" required autofocus>
                            </div>
                        </div>

                        

                       <div class="row">
                            <div class="col-md-2">
                                <button type="submit" name="enviar" class="btn btn-primary">
                                    Enviar
                                </button>                               
                            </div>

                           

                        </div>

                        



                       
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
