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
                    @component('components.who')
                    @endcomponent
                    
                    <a href="{{ url('aluno')}}{{'/' . Auth::user()->id . '/addinstrutor' }}" class="btn btn-sm btn-primary">Selecionar Instrutor</a>
                    <a href="{{ url('aluno/treinos') }}" class="btn btn-sm btn-primary">Meus treinos</a>  
                    @endif 

                    {{--  @component('components.botoes')
                    @endcomponent
                    <br>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
