@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portal do Treinador</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="users" class="btn btn-sm btn-primary">Gerenciar Usuários</a>
                    <a href="grupoMuscular" class="btn btn-sm btn-primary">Gerenciar grupos musculares</a>
                    <a href="exercicio" class="btn btn-sm btn-primary">Gerenciar exercícios</a>
                    {{--  Você está logado!  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

@guest
    @include('shared.filtroLogado')
@endguest
@endsection
