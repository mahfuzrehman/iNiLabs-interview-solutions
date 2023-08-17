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
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 border border-rounded">
                <h1 class="text-center">Add Data</h1>
                <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control">
                        <span style="color: red">{{$errors->has('first_name') ? $errors->first('first_name') : ' '}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="desc" type="text" class="form-control" cols="5" rows="5"></textarea>
                        <span style="color: red">{{$errors->has('last_name') ? $errors->first('last_name') : ' '}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Image</label>
                        <input type="file" name="image" class="form-control">
                        <span style="color: red">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Status</label>
                        <label><input type="radio" name="status" checked value="1" class="mx-2">Published</label>
                        <label><input type="radio" name="status" value="0" class="mx-2">Unpublished</label>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" value="Add Product" class="btn btn-success">
                    </div>
                </form>
            </div>

            <div class="col-md-8 border border-rounded px-3">
                <h1 class="text-center">All Data</h1>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#Sl</th>
                        <th style="width: 15%">Product Name</th>
                        <th style="width: 40%">Description</th>
                        <th style="width: 10%">Image</th>
                        <th>Status</th>
                        <th style="width: 35%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->desc}}</td>
                                <td><img src="{{isset($product->image) ? asset($product->image) : '' }}" alt="" style="height: 50px; width:50px"></td>
                                <td class="mx-2 mt-4">{{$product->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>
                                    @if ($product->status ==1)
                                    <a href="{{route('unpublished',$product->id)}}" class="btn btn-success me-1"><i class='fa fa-thumbs-up'></i></a>
                                  @else
                                    <a href="{{route('published',$product->id)}}" class="btn btn-warning me-1"><i class='fa fa-thumbs-down'></i></a>
                                  @endif
                                    <a href="{{route('edit', $product->id)}}" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{route('destroy', $product->id)}}" class="btn btn-danger"  onclick="return confirm('Are you sure to delete?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('product_js');
</body>
</html>