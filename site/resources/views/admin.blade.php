@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portal do Administrador</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')
                    @endcomponent

                    <a href="users" class="btn btn-sm btn-primary">Gerenciar Usuários</a>
                    <a href="grupoMuscular" class="btn btn-sm btn-primary">Gerenciar grupos musculares</a>
                    <a href="exercicio" class="btn btn-sm btn-primary">Gerenciar exercícios</a>
                    <a href="admin/logout" class="btn btn-sm btn-primary">Deslogar Admin</a>
                    {{--  Você está logado!  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

@guest
    @component('components.filtroLogado')
    @endcomponent
@endguest
@endsection