<!DOCTYPE html>
<html>
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootsrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <title>Todo Web App</title>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        @extends('layout.main')
        @section('container')
        
        @if (session('success'))
        <div class="alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-4">
            <form action='{{ url("todo") }}' method="post">
                <div class="input-group mb-3">
                    @csrf
                    <input type="text"
                        class="form-control" name="task" id="" aria-describedby="helpId" placeholder="Add your task">
                    <button class="btn btn-outline-secondary" type="submit">Add</button>
                </div>
            </form>
            <ul class="list-group">
                @foreach ($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p style="width: 150px;margin:0">{{ $todo->task }}</p>
                    <div class="row">
                        <div class="col">
                            <a href="todo/{{ $todo->id }}/edit" class="btn btn-warning">Edit</a>
                        </div>
                        <div class="col">
                            <form action="{{ url('todo',$todo->id) }}" method="post">
                            @csrf
                            @method("Delete")
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @endsection
    </body>
</html>
