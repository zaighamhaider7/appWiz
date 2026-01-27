<?php
use App\Models\project;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container align-content-center mt-5">
        <form method="POST" action="{{route('project.edit', $projects->id) }}">
            @csrf

            <!-- Project Name -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form6Example3" name="project_name" class="form-control" value="{{ $projects->project_name }}"/>
                <label class="form-label" for="form6Example3">Project name</label>
            </div>

            <!-- Client Name and Assign To -->
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <select id="client_name" name="client_name" class="form-control">
                            <option value="{{ $projects->client_name }}">{{ $projects->client_name }}</option>
                            <option value="Client A">Client A</option>
                            <option value="Client B">Client B</option>
                        </select>
                        <label class="form-label" for="client_name">Client Name</label>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <select id="assign_to" name="assign_to" class="form-control">
                            <option value="{{ $projects->assign_to }}">{{ $projects->assign_to }}</option>
                            <option value="User A">User A</option>
                            <option value="User B">User B</option>
                        </select>
                        <label class="form-label" for="assign_to">Assign to</label>
                    </div>
                </div>
            </div>

            <!-- Price, Start Date, End Date -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="price" name="price" class="form-control" value="{{ $projects->price }}" />
                        <label class="form-label" for="price">Price</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div data-mdb-input-init class="form-outline">
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $projects->start_date }}" />
                        <label class="form-label" for="start_date">Start Date</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div data-mdb-input-init class="form-outline">
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $projects->end_date }}" />
                        <label class="form-label" for="end_date">End Date</label>
                    </div>
                </div>
            </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Edit Projects</button>
        </form>



    </div>
</body>

</html>
