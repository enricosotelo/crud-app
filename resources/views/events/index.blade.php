<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/pulse/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
  <style>
    .container {
      max-width: 1500px;
    }
  </style>
</head>
<body>

  <div class="container mt-4">
    <!-- Título e botão de criar evento -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="text-primary mt-5">Event List</h1>
      <a href="{{ route('event.create') }}" class="btn btn-primary mt-5">Create a Event</a>
    </div>

    <!-- Formulário de filtro -->
    <div class="d-flex-wrap mb-5">
        <form class="d-flex flex-wrap" action="{{ route('event.index') }}" method="GET">
            <select name="filter" id="filter-type" class="form-select me-3 mb-3">
                <option value="" {{ request('filter') == '' ? 'selected' : '' }}>Select filter</option>
                <option value="type" {{ request('filter') == 'type' ? 'selected' : '' }}>Type</option>
                <option value="name" {{ request('filter') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="address" {{ request('filter') == 'address' ? 'selected' : '' }}>Address</option>
                <option value="link_address" {{ request('filter') == 'link_address' ? 'selected' : '' }}>Link of the address</option>
            </select>

            <input class="form-control me-2 mb-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}">

            <div id="date-filter" class="d-flex flex-wrap me-2 mb-2" style="display: none;">
                <input class="form-control me-2 mb-2" type="date" name="start_date" placeholder="Start Date" value="{{ request('start_date') }}">
                <input class="form-control me-2 mb-2" type="date" name="end_date" placeholder="End Date" value="{{ request('end_date') }}">
            </div>

            <div id="price-filter" class="d-flex flex-wrap me-2 mb-2" style="display: none;">
                <input class="form-control me-2 mb-2" type="number" step="0.01" name="price_from" placeholder="Price From" value="{{ request('price_from') }}">
                <input class="form-control me-2 mb-2" type="number" step="0.01" name="price_to" placeholder="Price To" value="{{ request('price_to') }}">
            </div>

            <div class="d-flex align-items-center mb-2">
                <button class="btn btn-outline-primary me-2" type="submit">Search</button>
                <a href="{{ route('welcome') }}" class="btn btn-secondary">Home</a>
            </div>
        </form>
    </div>

    <!-- Mensagens de sessão (flash) -->
    <div>
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif(session()->has('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ session('update') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif(session()->has('destroy'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('destroy') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>

    <!-- Tabela de Eventos -->
    <table class="table table-bordered border-secondary table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Type</th>
          <th>Name</th>
          <th>Description</th>
          <th>Address</th>
          <th>Link of the address</th>
          <th>Start Date</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($events as $event)
          <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->type }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->address }}</td>
            <td>{{ $event->link_address }}</td>
            <td>{{ $event->start_at }}</td>
            <td>{{ $event->price }}</td>
            <td>
              <a href="{{ route('event.edit', ['event' => $event]) }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-pencil-square"></i>
              </a>
              <form action="{{ route('event.destroy', ['event' => $event]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end p-2">
        {{ $events->links() }}
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
