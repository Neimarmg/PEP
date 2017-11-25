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

                    <a href="instrutores" class="btn btn-sm btn-primary">Gerenciar Instrutores</a>
                    <a href="users" class="btn btn-sm btn-primary">Gerenciar Alunos</a>
                    <a href="grupoMuscular" class="btn btn-sm btn-primary">Gerenciar grupos musculares</a>
                    <a href="exercicio" class="btn btn-sm btn-primary">Gerenciar exercícios</a>
                    <br><br>
                    <a href="admin" class="btn btn-sm btn-primary">Portal Administrador</a>
                    <a href="instrutor" class="btn btn-sm btn-primary">Portal Instrutor</a>
                    <a href="home" class="btn btn-sm btn-primary">Portal Aluno</a>
                    <br><br>
                    <a href="admin/login" class="btn btn-sm btn-primary">Logar Administrador</a>
                    <a href="instrutor/login" class="btn btn-sm btn-primary">Logar Instrutor</a>
                    <a href="login" class="btn btn-sm btn-primary">Logar Aluno</a>
                    <br><br>
                    <a href="admin/logout" class="btn btn-sm btn-primary">Deslogar Admin</a>
                    <a href="instrutor/logout" class="btn btn-sm btn-primary">Deslogar Instrutor</a>
                    <a href="users/logout" class="btn btn-sm btn-primary">Deslogar Aluno</a>
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
