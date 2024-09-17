<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* table, td, th {
            border: 1px solid black;
        } */
                
        td, thead {
            text-align: center;
        }
      </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Laravel 9 image crud</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div style="float: left">
                            <h2>Laravel 9 image crud</h2>
                        </div>
                        <div style="float: right">
                            <a class="btn btn-dark" href="{{ route('add.product')}}">Add New Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('msg'))
                            <p class="alert alert-success">{{Session::get('msg')}}</p>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $key=>$item )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img style="width: 150px; height: 100px" src="{{ asset('images/product/'.$item->image)}}" alt="Product image">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.product',$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{ route('delete.product',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>