@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper">
        <div class="app" id="app">
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>
            <article class="content items-list-page">
                <div class="title-search-block">
                    <div class="title-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title"> Items
                                    {{-- <a href="item-editor.html"
                                        class="btn btn-primary btn-sm rounded-s"> Add New </a> --}}

                                    {{-- <div class="action dropdown">
                                    <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More actions... </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o icon"></i>Mark as a draft</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>Delete</a>
                                    </div>
                                </div> --}}
                                </h3>
                                {{-- <p class="title-description"> List of sample items - e.g. books, movies, events, etc...
                            </p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="items-search">
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control boxed rounded-s" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary rounded-s" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div> --}}
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-title-block">
                                <h3 class="title"> Hover rows </h3>

                                @if ($message = Session::get('xoathanhcong'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                            </div>
                            <section class="example">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Avatar</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Role</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- Loop here --}}

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id_user }}</td>
                                                <td>
                                                    <img src="img/avatar/{{ $user->avatar }}" width="60px" height="60px">
                                                </td>

                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @if ($user->role == 1)
                                                        Admin
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="POST" action="role_change" class="delete">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $user->id_user }}">
                                                        <input type="hidden" name="role" value="{{ $user->role }}">

                                                        <button type="submit">
                                                            Role Change
                                                        </button>
                                                    </form>
                                                </td>

                                                <td>
                                                    <form method="POST" action="delete" class="delete">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $user->id_user }}">
                                                        <button>
                                                            <i class="fa fa-trash-o "></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach

                                        {{-- End loop --}}

                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>

                {{-- <nav class="text-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href=""> Prev </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href=""> 1 </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href=""> 2 </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href=""> 3 </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href=""> 4 </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href=""> 5 </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href=""> Next </a>
                    </li>
                </ul>
            </nav> --}}
            </article>
            {{-- <div class="modal fade" id="confirm-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to do this?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> --}}
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(document).on('submit', '.delete', function() {
                if (confirm("are you sure want to delete this?")) {
                    return true;
                } else {
                    return false;
                }
            });

        });
    </script>
@endsection()
