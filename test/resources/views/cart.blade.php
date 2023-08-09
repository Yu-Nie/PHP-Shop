@extends('layouts.app')

@section('content')
<div class="container">
<div class="text-center">
  <h3>Cart</h3>
  @if ($cart->isEmpty())
      <p>Your cart is empty  <a href="{{ url('/products') }}">Browse all products</a></p>
    
  @else
    @php
      $total = 0;
      $product_list = array();
    @endphp

    <table class="cart table table-hover table-condensed">
      <thead>
        <tr>
          <th style="width:30%">Product</th>
          <th style="width:22%">Name</th>
          <th style="width:10%">Price</th>
          <th style="width:10%">Quantity</th>
          <th style="width:20%"> </th>
        </tr>
      </thead>
      <tbody>
            @foreach($cart as $product)
            @php
              $total += $product->price * $product->quantity;
              array_push($product_list, $product->id);
            @endphp
            <tr>
              <td>
                <div class="w3-card-4">
			            <img src="{{ $product->picture }}" class="w3-round">
                </div>
              </td>
              <td>{{ $product->name }}</td>
              <td>￥{{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
              <td>
                <form  action="{{ route('delete_product',[$product->id]) }}" method="delete" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}
                <button type="submit" class="btn btn-primary" style="background-color:red;"> <i class="fas fa-check"></i>删除</button>
              </form>
            </td>
            </tr>
            @endforeach
          </tbody>
      
    </table>
    <br />
    <br />
    <p>Total price: {{$total}}</p>
    @php
      $pl=json_encode($product_list);
    @endphp
    <form  action="{{ route('checkout') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" value="{{$total}}" name="total_price">
      <input type="hidden" value="{{$pl}}" name="product_list">
      <button type="submit" class="btn btn-primary">checkout</button>
    </form>
  @endif

</div>
@endsection