<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/pulse/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to the Event Management App!</h1>
            <p class="lead">This is a simple application to manage your events.</p>
            <hr class="my-4">
        </div>

        <div class="row mt-5 justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Events</h5>
                        <p class="card-text">Easily manage your event schedule with our intuitive interface.</p>
                        <a href="{{ route('event.index') }}" class="btn btn-primary">View Events</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Events</h5>
                        <p class="card-text">Quickly add new events to your schedule with our simple form.</p>
                        <a href="{{ route('event.create') }}" class="btn btn-success">Create Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
