@extends('layouts.app')

@section('content')
@auth('instrutor','web')

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
    <div class="panel-heading">Cadastro de exercício</div>
    <div class="panel-body">
    <form class="form-horizontal"
     action="{{ URL('exercicio') }}{{ isset($exercicio) ? '/' . $exercicio->id : '' }}"
     method="POST">
            @if(isset($exercicio))
                {{ method_field('PUT') }}
            @endif
        <fieldset>
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
            
                <label class="col-lg-4 control-label">Nome</label>
                <div class="col-md-6">
                    <input type="text" name="nome" placeholder="Nome" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->nome : '' }}">
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('grupo_muscular_id') ? ' has-error' : '' }}">
                <label for="select" class="col-lg-4 control-label">Grupo Muscular</label>
                <div class="col-md-6">
                    <select class="form-control" id="grupo_muscular_id" name="grupo_muscular_id" required="required">
                        @if(isset($exercicio))
                            <option enable selected value="{{ $exercicio->grupo_muscular_id }}">
                                @if($exercicio->grupoMuscular != null)
                                    {{$exercicio->grupoMuscular->nome}}
                                @endif   
                            </option>
                        @else
                            <option disabled selected>Selecionar grupoMuscular...</option>
                        @endif
                        @foreach($grupoMusculars as $musc)
                            <option value="{{ $musc->id }}">{{ $musc->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('grupo_muscular_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('grupo_muscular_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a href="{{ URL('grupoMuscular/create') }}" type="submit" class="btn btn-sm btn-success btn-block">Novo Grupo Muscular</a>
                </div>
                {{--  <a href="{{ URL('exercicio') }}{{ isset($exercicio) ? '/' . $exercicio->id : '' }}"></a>  --}}
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a href="{{ URL('exercicio') }}" class="btn btn-sm  btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-sm  btn-primary">Salvar</button>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
    {{--  @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif  --}}
</div>
</div>
</div>
</div>
@endauth

{{--  @guest
    @include('shared.filtroLogado')
@endguest  --}}
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
