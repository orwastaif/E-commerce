@extends('dashboard')
@section('content')

<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Order Details</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                
                <th style="width: 20%">
                Product
                </th>
                <th>
                Quantity
                </th>
                <th style="width: 8%" class="text-center">
                Single price
                </th>
                <th style="width: 20%">
                Total price
                </th>

            </tr>
        </thead>
        <tbody>
        @foreach($ordersDetails as $product)

            <tr>
                <td>
                   
                    {{$product->product_name}}
                    
                </td>
                <td>
                {{$product->quantity}}
                </td>
                <td>
                $ {{$product->singleprice}}
                </td>
                
                <td>
                $ {{$product->totalprice}}
                </td>
            </tr>

            @endforeach 

            
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@endsection 