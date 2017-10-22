@extends('layouts.app')

@section('content')
    <div class="row" align="center">
        <h3>Cadastro de exercício</h3> 
        <div class="col-md-12">
            <form action="{{ URL('exercicio') }}{{ isset($exercicio) ? '/' . $exercicio->id : '' }}" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                    @if(isset($exercicio))
                        {{ method_field('PUT') }}
                    @endif
                    <input type="text" name="nome" placeholder="Nome" class="form-control"
                      value="{{ isset($exercicio) ? $exercicio->nome : '' }}">
                    <input type="number" name="ordem" placeholder="Ordem" class="form-control"
                      value="{{ isset($exercicio) ? $exercicio->ordem : '' }}">
                    <input type="number" name="carga" placeholder="Carga" class="form-control"
                      value="{{ isset($exercicio) ? $exercicio->carga : '' }}">
                    <input type="number" name="series" placeholder="Séries" class="form-control"
                      value="{{ isset($exercicio) ? $exercicio->series : '' }}">
                    <input type="number" name="repeticoes" placeholder="Repetições" class="form-control"
                      value="{{ isset($exercicio) ? $exercicio->repeticoes : '' }}">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    <a href="/exercicio" class="btn btn-sm btn-info">Cancelar</a>
                </div>
            </form>
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    {{$error}}
                    <br>
                @endforeach
            @endif
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
