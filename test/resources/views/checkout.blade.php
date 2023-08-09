@extends('layouts.app')

@section('content')
<div class="container">
<section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h3 class="title-page">Checkout</h3>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('place_order') }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"  style="display:flex">
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" style="display:flex">
                                </div>
                                <div class="form-row">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone" style="display:flex">
                                </div>
                                <div class="form-row">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email"  style="display:flex" value="{{ auth()->user()->email }}">
                                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <br \>
                                <p>Total Cost:{{$total_price}}</p>
                                <input type="hidden" value="{{ $total_price }}" name="total_price">
                                <input type="hidden" value="{{ $product_list }}" name="product_list">
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection