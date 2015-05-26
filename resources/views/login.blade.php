@extends ('_master')
@section ('title')
    The Ceramics Blog
@stop

@section('content')
	<div id = body>
	@if($err)
		{{$err}}
	@endif
	<h1>Login</h1>
	<a href = '/'>Go Home</a>
	<form method="post" action="/login">
	   <p>Username</p>
	   <input type="text" name="user" class="box" placeholder="mxceramics"/>
	   <p>Password</p>
	   <input type="password" name="pass" class="box" placeholder="mypassword1"/>
	   <p></p>
	   <input type="submit" name="login" value="Login"/>
	   <input type="hidden" name='_token' value="{{csrf_token()}}"/>
	</form>
    </div>
@stop