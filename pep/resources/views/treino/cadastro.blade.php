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
                            <label for="name" class="col-md-4 control-label">Instrutor</label>

                            <div class="col-md-6">
                                <input id="instrutor_id" type="text" class="form-control" name="instrutor_id" placeholder="Instrutor_id" value="{{ isset($treino) ? $treino->instrutor_id : '' }}" required autofocus>
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

