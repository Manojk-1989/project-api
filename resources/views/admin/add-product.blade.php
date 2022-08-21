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
      <h1 class="text-center">Add Product</h1>
    </a>
  </nav>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <form id="add_product_form">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Product Name" name="product_name">
              <span class="text-danger" id="product_name_msg"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Product Price" name="price">
              <span class="text-danger" id="price_msg"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Desciption</label>
            <div class="col-sm-10">
              <textarea class="form-control" placeholder="Product Desciption" name="product_description" id="" cols="30" rows="10"></textarea>
              <span class="text-danger" id="product_description_msg"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Product Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple="true" name="file[]" enctype="multipart/form-data">
              <span class="text-danger" id="file_msg"></span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="button" class="btn btn-primary float-cenyter" id="add_product_btn" data-url="{{route('product.store')}}">Sign in</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Product Images</th>

            </tr>
          </thead>
            <tbody>
              @foreach($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>
                    @foreach($product->productImages as $productImage)
                    <img src="{{$productImage->path}}" height="30px" width="30px">
                    @endforeach
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-js/add-product.js') }}"></script>