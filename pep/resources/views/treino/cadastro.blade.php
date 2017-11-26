@extends('layouts.app')

@section('content')
{{--  Colocar aqui o código  --}}


<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label">Nome</label>
                    <br>
                    <select class="form-control" id="id"></select>
                </div>

                <div class="form-group">
                    <label class="control-label">Exercício</label>
                    <br>
                    <select class="form-control" id="id"></select>
                </div>

                <div class="form-group">                   
                    <label class="control-label">Comnentários</label>
                    <br>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </form>
		</div>
		<div class="col-md-4"></div>
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

