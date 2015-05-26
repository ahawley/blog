@extends ('_master')
@section ('title')
    The Ceramics Blog
@stop

@section('content')
    <div id = body>
	@if($err)
	    {{$err}}
	@endif
	<h1>Create an Account</h1>
	<a href = '/'>Go Home</a>
        <form method="post" action="/signup">
            <p>First Name</p>
            <input type="text" name="first" class="box" placeholder="Middlesex"/>
            <p>Last Name</p>
            <input type="text" name="last" class="box" placeholder="Ceramicist"/>
            <p>Birthday</p>
            <p>(Between 1930 and 2001)</p>
            <input type="date" name="birth" min="1930-01-01" max="2001-01-01"/>
            <p>Email</p>
            <input type="text" name="email" class="box" placeholder="mxceramicist@mxschool.edu"/>
            <p>Username</p>
            <input type="text" name="user" class="box" placeholder="mxceramics"/>
            <p>Password</p>
            <input type="password" name="pass" class="box" placeholder="mypassword1"/>
            <p>Verify Password</p>
            <p>(Must Match)</p>
            <input type="password" name="vpass" class="box" placeholder="mypassword1">
            <p id="errors"></p>
            <p></p>
	    <input type="submit" name="submit" value="Sign Up"/>
	    <input type="hidden" name='_token' value="{{csrf_token()}}"/>
        </form>
    </div>
@stop