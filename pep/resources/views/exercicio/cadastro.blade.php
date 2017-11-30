@extends('layouts.app')

@section('content')
@auth('instrutor','web')

<div class="row" align="center">
    <h3>Cadastro de exercício</h3> 
    <form class="form-horizontal col-lg-offset-3"
     action="{{ URL('exercicio') }}{{ isset($exercicio) ? '/' . $exercicio->id : '' }}"
     method="POST">
            @if(isset($exercicio))
                {{ method_field('PUT') }}
            @endif
        <fieldset>
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="col-lg-2 control-label">Nome</label>
                <div class="col-lg-4">
                    <input type="text" name="nome" placeholder="Nome" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->nome : '' }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Grupo Muscular</label>
                <div class="col-lg-4">
                    <input type="text" name="grupo_muscular_id" placeholder="grupo musc" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->grupo_muscular_id : '' }}">
                </div>
            </div>

            <div class="form-group driver-drop">
                <div class="input-group">
                    <label for="select" class="col-lg-2 control-label">Grupo Muscular</label>
                    <select class="form-control" id="grupo_muscular_id" name="grupo_muscular_id" required="required">
                        <option disabled selected>Grupo muscular...</option>
                        @foreach($grupoMusculars as $musc)
                                    <option value="{{ $musc->id }}">{{ $musc->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{--  <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Grupo Muscular</label>
                <div class="col-lg-4">  --}}
                {{--  {!! Form::select('grupoMusculars',['' => 'selecione ...'+$grupoMusculars],'',['id' => 'grupoMusculars']) !!}  --}}
                    {{--  <form>  --}}
                        {{--  <select class="form-control" name="grupo_muscular_id" onchange="this.form.submit()">  --}}
                        {{--  <select class="form-control" id="id" value="{{ isset($exercicio) ? $exercicio->grupo_muscular_id : '' }}">  --}}
                            {{--  @foreach($grupoMusculars as $grupoMuscular)
                                <option value="{{ $grupoMuscular->id }}">{{ $grupoMuscular->id }} {{ $grupoMuscular->nome }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>  --}}




            <div class="form-group">
                <label class="col-lg-2 control-label">Ordem</label>
                <div class="col-lg-4">
                    <input type="number" name="ordem" placeholder="Ordem" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->ordem : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Carga</label>
                <div class="col-lg-4">
                    <input type="number" name="carga" placeholder="Carga" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->carga : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Séries</label>
                <div class="col-lg-4">
                    <input type="number" name="series" placeholder="Séries" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->series : '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Repetições</label>
                <div class="col-lg-4">
                    <input type="number" name="repeticoes" placeholder="Repetições" class="form-control"
                            value="{{ isset($exercicio) ? $exercicio->repeticoes : '' }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-2">
                    <a href="{{ URL('exercicio') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </fieldset>
    </form>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
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
