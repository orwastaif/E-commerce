@extends('dashboard')
@section('content')

<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Orders</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 20%">
                    Date
                </th>
                <th>
                    Client
                </th>
                <th style="width: 8%" class="text-center">
                    Status
                </th>
                <th style="width: 20%">
                Total Payment
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        
            <tr>
                <td>
                    {{$order->id}}
                </td>
                <td>
                    <a>
                    {{$order->created_at}}
                    </a>
                </td>
                <td>
                    <a>
                    {{$order->Firstname}}</a> 
                    <a>{{$order->Surname}}
                        
                    </a><br>
                    <a>{{$order->Email}}</a><br>
                    <a>{{$order->Phone_number}}</a>
                </td>
                <td class="project-state">
                    <span class="badge badge-success">{{$order->status}}</span>
                </td>
                
                <td>
                    {{ $order->total}} $
                </td>
                <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ url('order_details/'. $order->id)}}">
                              View
                          </a>
                          <a href="{{ route('order.delete', $order->id) }}" onclick="return confirm('Are you sure to delete this Order ?!')" class="btn btn-danger">Delete</a>
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