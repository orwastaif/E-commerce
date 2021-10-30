<!DOCTYPE html>

    <head>
        <meta charset="utf-8">


        <title>Laravel</title>

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/cart_responsive.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/adminlte.min.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
    <body>
        
    
    <!-- Cart -->
    <div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
                              
                              @foreach($cart as $row)

		<li class="cart_item clearfix">
			<div class="cart_item_image text-center"><br><img src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
			<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
				<div class="cart_item_name cart_info_col">
					<div class="cart_item_title">Name</div>
					<div class="cart_item_text">{{ $row->name  }}</div>
				</div>
				
				<div class="cart_item_quantity cart_info_col">
					<div class="cart_item_title">Quantity</div><br> 

           <form method="post" action="{{ route('update.item') }}">
           	@csrf
           	<input type="hidden" name="productid" value="{{ $row->rowId }}">
           	<input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px;">
           	<button type="submit" class="btn btn-success btn-sm"><i>Update</i> </button>
 
           </form>  
				</div>



				<div class="cart_item_price cart_info_col">
					<div class="cart_item_title">Price</div>
					<div class="cart_item_text">${{ $row->price }}</div>
				</div>
				<div class="cart_item_total cart_info_col">
					<div class="cart_item_title">Total</div>
					<div class="cart_item_text">${{ $row->price*$row->qty }}</div>
				</div>
				

                <div class="cart_item_total cart_info_col">
					<div class="cart_item_title">Action</div><br>
	 <a href="{{ URL('remove/cart/'. $row->rowId ) }}" class="btn btn-sm btn-danger">x</a>
				</div>



			</div>
		</li>
								@endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">${{ Cart::total() }}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<a href="{{route('main.page')}}" type="button" class="button cart_button_clear">Cancel</a>
	 <a href="{{route('buy')}}"  class="button cart_button_checkout">Checkout</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="{{ asset('plugins/cart_custom.js') }}"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/adminlte.min.js')}}"></script>
<script src="{{asset('dist/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        @if(Session::has('message'))
        <script>
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('message') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
          </script>
        @endif
        </body>
</html>
