@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro Treino</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ URL('treino/registerInstrutor') }}{{ isset($treino) ? '/' . $treino->id : '' }}" method="POST">
                    @if(isset($treino))
                        {{ method_field('PUT') }}
                    @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-6">
                                <input id="titulo" type=hidden class="form-control" name="titulo" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->id}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título" value="{{ isset($treino) ? $treino->titulo : '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="aluno_id" class="col-md-4 control-label">Aluno ID</label>

                            <div class="col-md-6">
                                <input id="aluno_id" type="text" class="form-control" name="aluno_id" placeholder="Aluno ID" value="{{ isset($treino) ? $treino->aluno_id : '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select" class="col-lg-4 control-label">Aluno</label>
                            <div class="col-lg-6">
                            {{--  {!! Form::select('alunos',['' => 'selecione ...'+$alunos],'',['id' => 'alunos']) !!}  --}}
                                <form>
                                    <select class="form-control" id="id">
                                    {{--  <select class="form-control" id="id" value="{{ isset($exercicio) ? $exercicio->grupo_muscular_id : '' }}">  --}}
                                        @foreach($alunos as $aluno)
                                            @if($aluno->instrutor_id != Auth::user()->id)
                                                <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
\                                            @else
                                                <option>Não tem alunos</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
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
                                <a href="{{ url('instrutor')}}{{'/' . Auth::user()->id . '/treinos' }}" class="btn btn-sm btn-primary">Voltar</a>
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

{{--  CODIGO DO AURELIO  --}}
{{--  <div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label">Nome</label>
                    <br>
                    <select class="form-control" id="id"></select>
                </div>

                <div class="form-group">
                    <label class="control-label">Exercício</label>
                    <br>
                    <select class="form-control" id="id"></select>
                </div>

                <div class="form-group">                   
                    <label class="control-label">Comnentários</label>
                    <br>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>  --}}


{{-- Posteriormente: Para fazer upload de imagem!!!
        <h1>File Upload</h1>
        <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
            <label>Selecione a imagem para upload:</label>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" name="submit">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
  --}}

