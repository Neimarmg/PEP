@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portal do Instrutor</div>

                <div class="panel-body">
                    {{--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif  --}}
                    {{--  @foreach($alunos as $aluno)
                        <h4> {{ $aluno->name }} </h4>
                    @endforeach  --}}

                    @component('components.who')
                    @endcomponent
                    @component('components.botoes')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
