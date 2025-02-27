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
        <h1 class="text-primary">Edit a Product</h1>
        <form method="POST" action="{{ route('product.update', ['product' =>$product]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name"
                    value="{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    placeholder="Enter product price" value="{{$product->price}}" required>
            </div>
            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter product quantity"
                    value="{{$product->qty}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input class="form-control" id="description" name="description" rows="3"
                     value="{{$product->description}}" required></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('product.index')}}"" class=" btn btn-info mt-2">Back</a>
                <button type="submit" class="btn btn-primary ms-4 mt-2">Update</button>

            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
