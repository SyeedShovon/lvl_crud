<!DOCTYPE html>
<html lang="en">
<head>
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
                            <h2>Add new Product</h2>
                        </div>
                        <div style="float: right">
                            <a class="btn btn-dark" href="{{ route('index')}}">All Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('msg'))
                            <p class="alert alert-success">{{ Session::get('msg')}}</p>
                        @endif
                        <form action="{{ route('store.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <button class="btn btn-dark" type="submit">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>