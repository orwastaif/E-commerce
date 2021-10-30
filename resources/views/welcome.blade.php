<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
          <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/adminlte.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  
    
    <body class="hold-transition sidebar-mini">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        

   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" ></a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('main.page')}}" class="nav-link">
                  <p>All Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('clothes')}}" class="nav-link">
                  <p>Clothes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Watches')}}" class="nav-link">
                  <p>Watches</p>
                </a>
              </li>
           <li class="nav-item">
            <a href="{{route('Accessories')}}" class="nav-link">
                 <p>Accessories</p>
            </a>
          </li>
          <li>
          <button type="submit" class="btn btn-info">SORT BY @sortablelink('price')</button>
          </li><br>
          <li >
          <button type="submit" class="btn btn-info">SORT BY @sortablelink('title')</button>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
  <div class="content-header">
        <div class="col-12">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-info">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-info" >Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"class="btn btn-success float-right" class="btn btn-info">Register</a><br><br>
                                        <a class="btn btn-success float-right" href="{{ route('show.cart') }}">Cart</a>
                                  <form action="{{route('search')}}" method="GET">
                        <input type="text" name="search" required/>
                             <button type="submit" class="btn btn-info">Search</button>
                                    </form>      
                                    
                                
                          
             
                        @endif
                    @endauth
                    
                </div>
            @endif


            @foreach($products as $product)
            <!-- Default box -->
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="{{ asset($product->photo)}}" style = "width:400px; height:400px" class="product-image" alt="Product Image">
                            </div>
                        </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{$product->title}}</h3>
                        <p class="my-3">{{$product->category}}</p>
                        <p class="my-3">{{$product->description}}</p>

                    

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">{{$product->price}}$</h2>
                        <h4 class="mt-0"><small>number of purchases: </small></h4>
                    
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-lg btn-flat addcart" data-id="{{ $product->id }}">
                            Add To Cart
                            </button>
                    </div>
                </div>
                    </div>
                </div>

            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    
    </div>
    
                    @endforeach
</div>
 



           
        
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

        <script type="text/javascript">
        $(document).ready(function(){
     $('.addcart').on('click', function(){
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                url: " {{ url('/add/to/cart/') }}/"+id,
                type:"GET",
                datType:"json",
                success:function(data){
             const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })
             if ($.isEmptyObject(data.error)) {
                Toast.fire({
                  icon: 'success',
                  title: data.success
                })
             }else{
                 Toast.fire({
                  icon: 'error',
                  title: data.error
                })
             }
 
                },
            });
        }else{
            alert('danger');
        }
     });
   });
        </script>
      
    </body>
</html>
