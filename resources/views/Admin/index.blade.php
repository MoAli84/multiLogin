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

            <h4 style="text-align: center; font-family: Comic Sans MS "><b><i>
                        {{ 'Welcome , ' .auth()->guard('admin')->user()->name .' To Admin Dashboard' }} </i></b></h4>
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="{{ url('/admins/create') }}" role="button">Create</a><br>
            <br>
        </div>
        {{ auth('admin')->user()->name }}<br>
        <a href="{{ url('/adminlogout') }}">Logout</a>


        {{-- <div class="page-header">
            <h1>{{ session()->get('message') }}</h1>
            <br>

        </div> --}}







        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        {{-- <a href="create.php">+ Account</a> || --}}

        {{-- {{ 'Welcome ,'.auth()->user()->name."  " }}<a href="{{ url('adminlogout') }}">LogOut</a> --}}


        <table class='table table-hover table-responsive table-bordered'>

            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Depart</th>
                <th>action</th>
            </tr>

            @foreach ($data as $info)
                <tr>
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->name }}</td>
                    <td>{{ $info->email }}</td>
                    <td>{{ $info->title }}</td>
                    <td>
                        <a href='{{ url('/admins/' . $info->id . '/edit') }}' class='btn btn-danger m-r-1em'>Edit</a>


                        {{-- **********************************POP UP of Delete..*************************************************** --}}
                        <a data-toggle="modal" data-target="#modal_single_del{{ $info->id }}"
                            class='btn btn-primary m-r-1em'>Delete</a>
                    </td>
                </tr>




                <div class="modal" id="modal_single_del{{ $info->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">

                            <div class="model-header">
                                <h5 class="modal-title">Delete Conformation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;

                                    </span>
                                </button>

                            </div>

                            <div class="modal-body">Delete...!<br> {{ $info->name }}</div>
                            <div class="modal-footer">
                                <form action="{{ url('/admins/' . $info->id) }}" method="post">
                                    @method('delete')
                                    @csrf

                                    <div class="not-empty-record">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">close</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- **************************end of pop up of delete*********************** --}}
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

{{-- <td>
    <a href="" data-toggle="modal" data-target="#modal_single_del" class="btn btn-danger m-r-1em">Delete</a>
</td>
 
<div class="modal" id="modal_single_del" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="model-header">
                <h5 class="modal-title">Delete Conformation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">$times;</span>
                </button>

            </div>

            <div class="modal-body">Delete...!</div>
            <div class="modal-footer">
                <form action="" method="">
                    @method('delete')
                    @csrf

                    <div class="not-empty-record">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
