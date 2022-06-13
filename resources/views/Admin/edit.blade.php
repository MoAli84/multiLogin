<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


</head>

<body>


    <div class="container">

        <div class="jumbotron">
            <h1 class="display-4">Update</h1>
            <h3> {{ 'Welcome ,' . auth('admin')->user()->name . '  ' }} </h3>
            <hr class="my-4">
            {{-- <a class="btn btn-primary btn-lg" href="{{ route('index') }}" role="button">Back</a> --}}
        </div>


        <form action="{{ url('admins/' . $data->id) }}" method="post">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}

            <input type="hidden" name="id" value="{{ $data->id }}">



            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $data->name }}">

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ $data->email }}"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>


            <div class="mb-3">
                <label for="exampleDepartment" class="form-label">Department</label>
                <select class="form-control" name="dep_id">

                    @foreach ($dep_data as $val)
                        <option value="{{ $val->id }}" @if ($data->dep_id == $val->id) selected @endif>
                            {{ $val->title }}</option>
                    @endforeach


                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>


</body>

</html>
