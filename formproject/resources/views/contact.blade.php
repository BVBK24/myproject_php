@extends('layout.master')
@section('contact')
<h1>Contact Page</h1>  
  

{{Form.open(['action' => 'PostController@store'])}}  
  
  
<div class="form-group">  
{{ form::label('name','Name')}}  
{{form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}  
</div>  
<br>  
<div class="form-group">
{{form::label('email','Email')}}
{{form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
</div>
<br>
<div class="form-group">
{{form::label('password','Password')}}
{{form::password('password',['class'=>'pass'])}}
</div>  
<br>
  
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}  
  
  
{!!Form::close()!!}  
@stop  