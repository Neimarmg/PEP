@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portal do Instrutor</div>

                <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if(Auth::check()) 
                    <h4 align="center">Olá, {{Auth::user()->name}} {{Auth::user()->lastname}}!!! 
                    Seu id é: {{Auth::user()->id}}</h4>
                @endif

                <p align="center"><a href="{{ url('treino/lista/' . Auth::user()->id) }}" class="btn btn-sm btn-primary">Gerenciar Treinos</a></p>
                <p align="center"><a href="{{ url('atividade/lista/' . Auth::user()->id) }}" class="btn btn-sm btn-primary">Gerenciar Atividades</a></p>

                <br><br><br><br><br><br><br><br><br><br>
                    @component('components.who')
                    @endcomponent
                    <br>
                    @component('components.botoes')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
