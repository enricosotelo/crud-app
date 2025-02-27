<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/pulse/bootstrap.min.css"
        integrity="sha384-..." crossorigin="anonymous">

</head>

<body>
    <div class="errors">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>


    <div class="container mt-5">
        <h1 class="text-primary mb-4">View Product</h1>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h5 for="name">Product ID</h5>
                    <input type="text" readonly class="form-control-plaintext" value="{{$product->id}}">
                </div>
                <div class="form-group">
                    <h5 for="name">Product Name</h5>
                    <input type="text" readonly class="form-control-plaintext" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <h5 for="price">Price</h5>
                    <input type="text" readonly class="form-control-plaintext" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <h5 for="qty">Quantity</h5>
                    <input type="text" readonly class="form-control-plaintext" value="{{$product->qty}}">
                </div>
                <div class="form-group">
                    <h5 for="description">Description</h5>
                    <input type="text" readonly class="form-control-plaintext" value="{{$product->description}}">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('product.index')}}" class="btn btn-info mt-2">Back</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
