@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center full-height">
            <div class="content">
                <div class="title m-b-md">
                    online shop
                </div>

                <div class="links">
                <a href="{{url('/products') }}">products</a>
                <a href="{{url('/cart')}}">shopping car</a>
                <a href="{{url('/order')}}">orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection