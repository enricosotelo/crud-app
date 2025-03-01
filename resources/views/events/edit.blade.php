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
        <h1 class="text-primary">Edit a Event</h1>
        <form method="POST" action="{{ route('event.update', ['event' =>$event]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">Event Type</label>
                <select name="type" id="type" class="form-select">
                    @foreach($eventTypes as $type)
                        <option value="{{ $type }}" {{ $event->type == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter event name"  value="{{$event->name}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    placeholder="Enter event description"  required>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Enter event address" value="{{$event->address}}" required>
            </div>
            <div class="form-group">
                <label for="link_address">Address Link</label>
                <input type="text" class="form-control" id="link_address" name="link_address"
                    placeholder="Enter the address link for the event" value="{{$event->link_address}}" required>
            </div>
            <div class="form-group">
                <label for="start_at">Event's start date and time</label>
                <input type="datetime-local" class="form-control" id="start_at" name="start_at"
                    placeholder="Enter the event's start date and time." value="{{$event->start_at}}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    placeholder="Enter event price" value="{{$event->price}}" required>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('event.index')}}" class="btn btn-info mt-2">Back</a>
                <button type="submit" class="btn btn-primary ms-4 mt-2">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
