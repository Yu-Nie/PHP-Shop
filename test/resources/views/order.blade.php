@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Your Orders</h3>
    @if ($orders->isEmpty())
      <p>Your don't place any order yet!  <a href="{{ url('/products') }}">Browse all products</a></p>
    
  @else
  @php
    $idx = 0;
  @endphp
  @foreach($orders as $order)  
  <p>order number: {{$order->order_number}}</p>
    <p>name: {{$order->name}}</p>
    <p>phone: {{$order->phone}}</p>
    <p>email: {{$order->email}}</p>
    <p>address: {{$order->address}}</p>
    <table class="cart table table-hover table-condensed">
    <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
      </thead>  
      <tbody>
            @foreach($products[$idx] as $product)
            <tr>
              <td>
                <div class="w3-card-4">
			            <img src="{{ $product->picture }}" class="w3-round">
                </div>
              </td>
              <td>{{ $product->name }}</td>
              <td>￥{{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
            </td>
            </tr>
            @endforeach
          </tbody>
      
    </table>
    @php
    $idx += 1;
    @endphp
    <br \>
    @endforeach
    @endif
</div>
@endsection