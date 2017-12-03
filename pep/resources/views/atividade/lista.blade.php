@extends('layouts.app')

@section('content')
{{--  @auth('instrutor')  --}}
    <center>
        <h3>Lista de atividades</h3>
        <div class="col-md-3"></div>           
        <div class="col-md-6">            
            <div class="panel">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" >
                        <thead>
                            <tr>
                                <th width="5">No</th>
                                <th>Nome</th>
                                <th width="300">Grupo Muscular</th>
                                <th width="5">Ordem</th>
                                <th width="5">Carga</th>
                                <th width="5">Séries</th>
                                <th width="5">Repetições</th>
                                <th width="5">
                                    <center>
                                        <a href="exercicio/create" class="btn btn-xs btn-success">Novo Exercício</a>
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exercicios as $key =>$exercicio)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $exercicio->nome }}</td>
                                    <td>
                                        {{--  @foreach($grupoMusculars as $musc)
                                            
                                        @endforeach  --}}

                                        {{ $exercicio->grupo_muscular_id }}

                                    </td>
                                    <td>{{ $exercicio->ordem }}º</td>
                                    <td>{{ $exercicio->carga }}kg</td>
                                    <td>{{ $exercicio->series }}</td>
                                    <td>{{ $exercicio->repeticoes }}</td>
                                    <td>
                                        <center>
                                            <a href="{{ URL('exercicio/' . $exercicio->id . '/edit') }}" class="btn btn-xs btn-info">Editar</a>
                                            <form action="{{ URL('exercicio/' . $exercicio->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-xs btn-danger">Remover</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ URL('instrutor') }}" class="btn btn-sm btn-primary">Voltar</a>
        </div>
        <div class="col-md-3"></div> 
    </center>
{{--  @endauth  --}}
{{--  @guest
    @include('shared.filtroLogado')
@endguest  --}}

@endsection