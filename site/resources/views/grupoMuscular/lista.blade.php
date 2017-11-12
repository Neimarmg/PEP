@extends('layouts.app')

@section('content')
@auth()
    <center>
        <h3>Lista de Grupo Musculares</h3>            
        <div class="row col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Grupo Muscular</th>
                            <th width="300">Tipo</th>
                            <th width="5">
                                <center>
                                    <a href="grupoMuscular/create" class="btn btn-xs btn-success">Novo Grupo Muscular</a>
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grupoMuscular as $key =>$grupoMusc)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $grupoMusc->nome }}</td>
                                <td>{{ $grupoMusc->tipo }}</td>
                                <td>
                                    <center>
                                        <a href="{{ URL('grupoMuscular/' . $grupoMusc->id . '/edit') }}" class="btn btn-xs btn-info">Editar</a>

                                        <form action="{{ URL('grupoMuscular/' . $grupoMusc->id) }}" method="POST">
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
@endauth

@guest
    {{--  @include('components.filtroLogado')  --}}
    @component('components.filtroLogado')
        
    @endcomponent
@endguest
@endsection