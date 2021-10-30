@extends('dashboard')
@section('content')


@foreach($products as $product)
<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="col-12">
          <img src="{{ asset($product->photo)}}" style = "width:400px; height:400px" class="product-image" alt="Product Image">
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">{{$product->title}}</h3>
        <p class="my-3">{{$product->description}}</p>
        <p class="my-3">{{$product->category}}</p>

        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">{{$product->price}}$</h2>
          <h4 class="mt-0"><small>number of purchases: </small></h4>
        </div>

        <div class="mt-4">
          <div class="btn btn-primary btn-lg btn-flat">
            BUY
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endforeach


@endsection