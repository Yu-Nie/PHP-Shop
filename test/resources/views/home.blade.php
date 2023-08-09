@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    online shop
                </div>

                <div class="links">
                <a href="/products">Products</a></li>
                <a href="/cars">shopping car</a></li>
                <a href="/user"></i>my info</a></li>
                </div>
            </div>
        </div>
</div>
@endsection
