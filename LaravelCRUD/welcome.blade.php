@extends ('layout')

@section ('content')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    <div class="content">
        <div class="title m-b-md">
            MojoSite
        </div>

        <div class="links">
            @if(Auth::check())
            Hello {{Auth::user()->name}}!
            <a href="/data">View Your Table Here</a>
            @else
            Hello! Please sign in to view your tables.
            @endif
        </div>
    </div>
    @endif
</div>

@endsection

