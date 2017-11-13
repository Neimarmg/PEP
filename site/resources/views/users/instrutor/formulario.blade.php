@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <h3>Cadastro de Instrutor</h3> 
            <form action="{{ URL('instrutores') }}{{ isset($instrutor) ? '/' . $instrutor->id : '' }}" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                    @if(isset($instrutor))
                        {{ method_field('PUT') }}
                    @endif
                    <input type="text" name="nome" placeholder="Nome" class="form-control"
                      value="{{ isset($instrutor) ? $instrutor->name : '' }}">
                    <input type="email" name="email" placeholder="Email" class="form-control"
                      value="{{ isset($instrutor) ? $instrutor->email : '' }}">
                    <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection