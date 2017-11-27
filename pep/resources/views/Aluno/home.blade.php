@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portal do Aluno</div>
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

                    @component('components.who')
                    @endcomponent
                    @component('components.botoes')
                    @endcomponent
                    <br>
                    @component('components.portal_aluno')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
