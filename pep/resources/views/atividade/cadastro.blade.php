@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Atividade</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ URL('atividade') }}{{ isset($atividade) ? '/' . $atividade->id : '' }}" method="POST">
                        @if(isset($atividade))
                            {{ method_field('PUT') }}
                        @endif
                        {{ csrf_field() }}
                        Json do treino <br>
                        {{ $treino }} <br><br>

                        Treino Titulo<input id="titulo" type="text" class="form-control" name="titulo" value="{{ $treino->titulo }}">
                        Treino ID <input id="treino_id" type="text" class="form-control" name="treino_id" value="{{ $treino->id }}">
                        Instrutor {{ $treino->instrutor->name }}ID <input id="instrutor_id" type="text" class="form-control" name="instrutor_id" value="{{Auth::user()->id}}">
                        Aluno {{ $treino->aluno->name }} ID <input id="aluno_id" type="text" class="form-control" name="aluno_id" value="{{ $treino->aluno_id }}">
                        
                        @if(isset($atividade))
                            <div class="form-group">
                                <label for="select" class="col-lg-3 control-label">Atividade id</label>
                                <div class="col-md-6">{{ $atividade->id }}</div>
                            </div>
                            <div class="form-group">
                                <label for="select" class="col-lg-3 control-label">Instrutor</label>
                                <div class="col-md-6">
                                    {{ $atividade->instrutor->name }} 
                                    {{ $atividade->instrutor->lastname }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="select" class="col-lg-3 control-label">Aluno</label>
                                <div class="col-md-6">
                                    {{ $atividade->aluno->name }} 
                                    {{ $atividade->aluno->lastname }}
                                </div>
                            </div>
                        @endif

                        {{--  <div class="form-group{{ $errors->has('aluno_id') ? ' has-error' : '' }}">
                            <label for="select" class="col-lg-3 control-label">Aluno</label>
                            <div class="col-md-6">
                                <select class="form-control" id="aluno_id" name="aluno_id" required="required">
                                    @if(isset($atividade))
                                        <option enable selected value="{{ $atividade->aluno->id }}">
                                            @if($atividade->aluno_id != null)
                                                {{$atividade->aluno->name}} {{$atividade->aluno->lastname}}
                                            @endif
                                        </option>
                                    @else
                                        <option disabled selected>Selecionar aluno...</option>
                                    @endif
                                    @foreach($alunos as $aluno)
                                        @if($aluno->instrutor_id == Auth::user()->id)
                                            <option value="{{ $aluno->id }}">{{ $aluno->id }} {{ $aluno->name }} {{ $aluno->lastname }}</option>                                            
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('aluno_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aluno_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  --}}

                        <div class="form-group{{ $errors->has('exercicio_id') ? ' has-error' : '' }}">
                            <label for="select" class="col-lg-3 control-label">Exercício</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exercicio_id" name="exercicio_id" required="required">
                                    @if(isset($atividade))
                                        <option enable selected value="{{ $atividade->exercicio->id }}">
                                            @if($atividade->exercicio != null)
                                                {{$atividade->exercicio->id}} {{$atividade->exercicio->nome}}
                                            @endif
                                        </option>
                                    @else
                                        <option disabled selected>Selecionar exercício...</option>
                                    @endif
                                    @foreach($exercicios as $ex)
                                        <option value="{{ $ex->id }}">{{ $ex->id }} {{ $ex->nome }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('exercicio_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exercicio_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-sm btn-success btn-block">Novo Exercício</button>
                            </div>
                        </div>
{{--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --}}
                        <div class="form-group">
                                <label class="col-lg-3 control-label">Ordem</label>
                                <div class="col-lg-2">
                                    <input type="number" name="ordem" placeholder="Ordem" class="form-control"
                                            value="{{ isset($atividade) ? $atividade->ordem : '' }}">
                                </div>

                                <label class="col-lg-2 control-label">Carga</label>
                                <div class="col-lg-2">
                                    <input type="number" name="carga" placeholder="Carga" class="form-control"
                                            value="{{ isset($atividade) ? $atividade->carga : '' }}">
                                </div>
                        </div>
                            
                        <div class="form-group">
                                <label class="col-lg-3 control-label">Séries</label>
                                <div class="col-lg-2">
                                    <input type="number" name="series" placeholder="Séries" class="form-control"
                                            value="{{ isset($atividade) ? $atividade->series : '' }}">
                                </div>

                                <label class="col-lg-2 control-label">Repetições</label>
                                <div class="col-lg-2">
                                    <input type="number" name="repeticoes" placeholder="Repetições" class="form-control"
                                            value="{{ isset($atividade) ? $atividade->repeticoes : '' }}">
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="col-md-3 control-label">Comentário</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Comentario..." >
@if(isset($atividade))
@if($atividade->comentario != null){{$atividade->comentario}}@endif
@endif</textarea>
                            </div>
                        </div>

{{--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{--  <a href="{{ url('instrutor')}}{{'/' . Auth::user()->id . '/atividade' }}" class="btn btn-sm btn-primary">  --}}
                                <a href="{{ URL('atividade/lista/' . Auth::user()->id) }}" class="btn btn-sm btn-primary">
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn-sm btn-primary">Adicionar Atividade</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Posteriormente: Para fazer upload de imagem!!!
        <h1>File Upload</h1>
        <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <label>Selecione a imagem para upload:</label>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" name="submit">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
  --}}

