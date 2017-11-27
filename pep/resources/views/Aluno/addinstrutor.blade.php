@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar seu instrutor</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ URL('aluno/registerInstrutor') }}{{ isset($aluno) ? '/' . $aluno->id : '' }}" method="POST">
                    @if(isset($aluno))
                        {{ method_field('PUT') }}
                    @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Instrutor</label>

                            <div class="col-md-6">
                                <input id="instrutor_id" type="text" class="form-control" name="instrutor_id" placeholder="Instrutor_id" value="{{ isset($aluno) ? $aluno->instrutor_id : '' }}" required autofocus>
                            </div>
                        </div>

                        {{--  <div class="form-group">
                            <label for="select" class="col-lg-4 control-label">Instrutor</label>
                            <div class="col-lg-6">
                                <form>
                                    <select class="form-control" name="instrutor_id">
                                        @foreach($instrutores as $instrutor)
                                            <option value="{{$instrutor->id}}">{{ $instrutor->id . ' ' . $instrutor->name . ' ' . $instrutor->lastname }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>  --}}


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('aluno/home') }}" class="btn btn-sm btn-primary">Voltar</a>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Adicionar Instrutor
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
