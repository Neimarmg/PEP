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

                        <div class="form-group">
                            <label for="select" class="col-md-4 control-label">Aluno</label>
                            <div class="col-md-6">
                                <select class="form-control" id="aluno_id" name="aluno_id" required="required">
                                    <option disabled selected>Selecionar aluno...</option>
                                    @foreach($alunos as $aluno)
                                        @if($aluno->instrutor_id == Auth::user()->id)
                                            <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Título</label>
                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título" value="{{ isset($treino) ? $treino->titulo : '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Comentário</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Comentario..."></textarea>
                            </div>
                        </div>

                        {{--  <div class="form-group">
                            <label for="select" class="col-md-4 control-label">Selecionar exercício</label>
                            <div class="col-md-6">
                                <select class="form-control" id="aluno_id" name="aluno_id" required="required">
                                    <option disabled selected>Selecionar exercícios...</option>
                                    @foreach($exercicios as $exercicio)
                                            <option value="{{ $exercicio->id }}">{{ $exercicio->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('instrutor')}}{{'/' . Auth::user()->id . '/treinos' }}" class="btn btn-sm btn-primary">
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Adicionar Treino
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

{{-- Posteriormente: Para fazer upload de imagem!!!
        <h1>File Upload</h1>
        <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <label>Selecione a imagem para upload:</label>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" name="submit">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
  --}}

