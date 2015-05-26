@extends ('_master')
@section ('title')
    The Ceramics Blog
@stop

@section('content')
    <div id = body>
        <h1>The Ceramics Blog</h1>
        <h2>Everything you need to know about ceramics</h2>
        @if(Session::has('user'))
            <a href = '/newpost'>New Post </a>|
            <a href = '/logout'>Logout</a>
        @else
            <a href = '/signup'>Sign Up </a>|
            <a href = '/login'>Login</a>
        @endif
        <p></p>
        @foreach ($blogs as $blog)
            <div id=post>
                <h2>{{$blog->subject}}</h2>
                <p>{{$blog->content}}</p>
            </div>
            <p></p>
        @endforeach        
    </div>
@stop