<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
    <!-- Just an image -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
    <!-- <img  width="30" height="30" alt=""> -->
      <h1 class="text-center">Url Shorter</h1>
    </a>
  </nav>
  <div class="container">
    <div class="row">
    @foreach($carts as $cart)
    <div class="card">
      <div class="card-header">
        <div class="card" style="width: 18rem;">
          <img src="{{$cart->productImages['path']}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$cart->product_name}} Added by {{$cart->customer->name}}</h5>
            <h5 class="card-title">{{$cart->price}} $</h5>

            <p class="card-text">{{$cart->product_description}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    </div>
    
  </div>
</body>
</html>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-js/add-product.js') }}"></script>