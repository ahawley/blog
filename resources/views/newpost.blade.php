@extends ('_master')
@section ('title')
    Random Generator
@stop

@section('content')
    <div id = body>
        @if($err)
		{{$err}}
	@endif
        <h1>New Ceramics Post</h1>
        <a href = '/'>Go Home</a>
        <form method="post" action="/newpost">
            <p>Subject</p>
            <input type="text" name="subject" placeholder="Subject"/>
            <p>Content</p>
            <textarea name="content" placeholder="Your content here" rows="10" cols="50"></textarea>
            <p></p>
            <input type="submit" name="post" value="Post"/>
	    <input type="hidden" name='_token' value="{{csrf_token()}}"/>
        </form>
    </div>
@stop