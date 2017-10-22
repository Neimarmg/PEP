@extends('layouts.app')

@section('content')
    <center>
        <h3>Cadastro de exercício</h3>            
        <div class="row col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Nome</th>
                            <th>Grupo Muscular</th>
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
                                <td></td>
                                <td>{{ $exercicio->ordem }}</td>
                                <td>{{ $exercicio->carga }}</td>
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
        <a href="home" class="btn btn-sm btn-primary">Voltar</a>
    </center>
@endsection