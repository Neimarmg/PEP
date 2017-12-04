@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro Treino</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ URL('treino') }}{{ isset($treino) ? '/' . $treino->id : '' }}" method="POST">
                        @if(isset($treino))
                            {{ method_field('PUT') }}
                        @endif
                        {{ csrf_field() }}

                        <input id="instrutor_id" type="hidden" class="form-control" name="instrutor_id" value="{{Auth::user()->id}}">

                        <div class="form-group{{ $errors->has('aluno_id') ? ' has-error' : '' }}">
                            <label for="select" class="col-md-3 control-label">Aluno</label>
                            <div class="col-md-6">
                                <select class="form-control" id="aluno_id" name="aluno_id" required="required">
                                    @if(isset($treino))
                                        <option enable selected value="{{ $treino->aluno_id }}">
                                            @if($treino->aluno != null)
                                                {{$treino->aluno->name}} {{$treino->aluno->lastname}}
                                            @endif   
                                        </option>
                                    @else
                                        <option disabled selected>Selecionar aluno...</option>
                                    @endif
                                    @foreach($alunos as $aluno)
                                        @if($aluno->instrutor_id == Auth::user()->id)
                                            <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('aluno_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aluno_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="col-md-3 control-label">Título</label>
                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título" value="{{ isset($treino) ? $treino->titulo : '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="col-md-3 control-label">Comentário</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Comentario..." >
@if(isset($treino))
@if($treino->comentario != null){{$treino->comentario}}@endif
@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                {{--  <button onclick="{{ url('treino/salvar')}}" type="submit" class="btn btn-sm btn-success btn-block">Adicionar Atividade</button>  --}}
                                <button type="submit" class="btn btn-sm btn-success btn-block">Adicionar Atividade</button>
                            </div>
                        </div>
{{--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --}}
@if(isset($treino))
    <h4 align='center'>Alteração de treino - Nenhuma Atividade Cadastrada </h4><br>

    @if(isset($atividades))
        TEM ATIVIDADE!!!!!!!!!!!!!
        @foreach($atividades as $item)
            {{ $item }} <br><br>
        @endforeach
    @else
        
    @endif
@else
    <h4 align='center'>Novo treino. Nenhuma Atividade Cadastrada </h4><br>
@endif

{{--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('instrutor')}}{{'/' . Auth::user()->id . '/treinos' }}" class="btn btn-sm btn-primary">
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn-sm btn-primary">Salvar Treino</button>
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

