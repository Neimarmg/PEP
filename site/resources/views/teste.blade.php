@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h3>
				h3. Lorem ipsum dolor sit amet.
			</h3>
			<div class="btn-group">
				 
				<button class="btn btn-default" type="button">
					<em class="glyphicon glyphicon-align-left"></em> Left
				</button> 
				<button class="btn btn-default" type="button">
					<em class="glyphicon glyphicon-align-center"></em> Center
				</button> 
				<button class="btn btn-default" type="button">
					<em class="glyphicon glyphicon-align-right"></em> Right
				</button> 
				<button class="btn btn-default" type="button">
					<em class="glyphicon glyphicon-align-justify"></em> Justify
				</button>
			</div>
		</div>
		<div class="col-md-6">
			<h3>
				h3. Lorem ipsum dolor sit amet.
			</h3>
			<a type="button" href="aurelio" class="btn btn-default">
				Exercício
			</button>
		</div>
        <form class="form-horizontal">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Checkbox
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Radios</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>
        <select multiple="" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
	</div>
</div>

@endsection