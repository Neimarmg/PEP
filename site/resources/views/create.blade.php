@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <h3>Lista de exercícios</h3> 
            <form action="{{ URL('users') }}{{ isset($user) ? '/' . $user->id : '' }}" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                    @if(isset($user))
                        {{ method_field('PUT') }}
                    @endif
                    <input type="text" name="nome" placeholder="Nome" class="form-control"
                      value="{{ isset($user) ? $user->name : '' }}">
                    <input type="email" name="email" placeholder="Email" class="form-control"
                      value="{{ isset($user) ? $user->email : '' }}">
                    <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection