@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar como...</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('instrutor/register') }}" class="btn btn-sm btn-primary">Instrutor</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Aluno</a>
                    {{--  Você está logado!  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection