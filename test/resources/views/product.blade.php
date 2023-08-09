@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Products</h3>

        <table class="table table-hover">

          <tbody>
            @foreach($products as $product)
            <tr>
              <td><div class="w3-card-4">
			        <img src="{{ $product->picture }}" class="w3-round" alt="Norway">
            </div></td>
              <td><br /></td>
              <td style="width:22%"><br />{{ $product->name }}</td>
              <td><br />￥{{ $product->price }}</td>
              <td><br /><form  action="{{ route('add_product') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}   
                <input type="hidden" value="{{ $product->id }}" name="id">
                <button type="submit" class="btn btn-primary"> 加入购物车</button>   
              </form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection