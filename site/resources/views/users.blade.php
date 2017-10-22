@extends('layouts.app')
@section('content')
    <center>
        <h3>CRUD NOVOS USUARIOS</h3>
        @if(Session::has('success'))
            <h3>{{ Session::get('success') }} </h3>            
        @else
            
        @endif
        <div class="row col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th width="5" >No</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>
                                <center>
                                <a href="{{ URL('users/create') }}" class="btn btn-xs btn-success">Novo Usuário</a>
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key =>$user)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <center>
                                        <a href="{{ URL('users/' . $user->id . '/edit') }}" class="btn btn-xs btn-info">Editar</a>
                                        <form action="{{ URL('users/' . $user->id) }}" method="POST">
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