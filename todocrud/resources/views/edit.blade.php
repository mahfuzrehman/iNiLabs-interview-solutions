<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>To DO CURD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  </head>
  <body>

<section class="mt-5 mx-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-8 border border-rounded py-3">
                <h1 class="text-center">Add Data</h1>
                <form action="{{route('update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                        <span style="color: red">{{$errors->has('first_name') ? $errors->first('first_name') : ' '}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="desc" type="text" class="form-control" cols="5" rows="5">{{$product->desc}}</textarea>
                        <span style="color: red">{{$errors->has('last_name') ? $errors->first('last_name') : ' '}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Image</label>
                        <input type="file" name="image" class="form-control" value="{{$product->image}}">
                        <span style="color: red">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Status</label>
                        <label><input type="radio" name="status" {{$product->status == 1 ? 'checked' : ''}} value="1" class="mx-2">Published</label>
                        <label><input type="radio" name="status" {{$product->status == 0 ? 'checked' : ''}} value="0" class="mx-2">Unpublished</label>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" value="Update Product" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('product_js');
</body>
</html>