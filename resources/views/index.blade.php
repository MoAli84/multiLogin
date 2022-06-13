<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="jumbotron">
            <h4 style="text-align: center; font-family: Comic Sans MS "><b><i> {{ 'Welcome , '.auth('web')->user()->name }} </i></b></h4>
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

           <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Create</a><br>
            <br> 
        </div>
        <a href="{{ route('logout') }}" >Logout</a>

{{-- <h3>{{ session()->get('m') }}</h3> --}}
        
        {{-- <div class="page-header">
            <h1>{{ session()->get('message')}}</h1>
            <br>

        </div> --}}







        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

        {{-- <a href="create.php">+ Account</a> ||  <a href="logOut.php">LogOut</a> --}}

        <?php $x=0  ?>
        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>LinkedIn</th>
                <th>action</th>
            </tr>

            @foreach ($data as $row)
                <tr>
                    <td>{{ ++$x}}</td>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->linkedin }}</td>
                    <td>
                        <a href='{{ url('/delete/'.$row->id) }}' class='btn btn-danger m-r-1em'>Delete</a>
                        <a href='{{ url('/edit/'.$row->id) }}' class='btn btn-primary m-r-1em'>Edit</a>
                    </td>
                </tr>
            @endforeach

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
