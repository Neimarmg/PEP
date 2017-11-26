@extends('layouts.app')

@section('content')
@auth
    <div class="row" align="center">
        <h3>Cadastro de Grupo Muscular</h3> 
        <div class="col-md-12">
            <form action="{{ URL('grupoMuscular') }}{{ isset($grupoMuscular) ? '/' . $grupoMuscular->id : '' }}" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                    @if(isset($grupoMuscular))
                        {{ method_field('PUT') }}
                    @endif
                    <input type="text" name="nome" placeholder="Grupo Muscular" class="form-control"
                      value="{{ isset($grupoMuscular) ? $grupoMuscular->nome : '' }}">
                    <input type="text" name="tipo" placeholder="Tipo" class="form-control"
                      value="{{ isset($grupoMuscular) ? $grupoMuscular->tipo : '' }}">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    <a href="/grupoMuscular" class="btn btn-sm btn-info">Cancelar</a>
                    {{--  <input type="hidden" value="{{ csrf_token() }}" name="_token">  --}}
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
@endauth

@guest
    @include('shared.filtroLogado')
@endguest
@endsection
{{--  

Tabela GrupoMuscular(Ex.: Membro peritoral)
	NomeDoGrupoMuscular
	Tipo(ABCDE,X)  
    
--}}
