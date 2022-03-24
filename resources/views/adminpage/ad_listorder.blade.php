@extends('ad_master')
@section('ad_content')

<div class="main-wrapper">
    <div class="app" id="app">

        <div data-include="header.html"></div>
        <div data-include="sidebar.html"></div>

        <div class="sidebar-overlay" id="sidebar-overlay"></div>
        <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
        <div class="mobile-menu-handle"></div>
        <article class="content items-list-page">
            <div class="title-search-block">
                <div class="title-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="title"> Items <a href="item-editor.html" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                <!--
				 -->
                                <div class="action dropdown">
                                    <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More actions... </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o icon"></i>Mark as a draft</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>Delete</a>
                                    </div>
                                </div>
                            </h3>
                            <p class="title-description"> List of sample items - e.g. books, movies, events, etc...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="items-search">
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
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Striped rows </h3>
                        </div>
                        <section class="example">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Order</th>
                                        <th>Id User</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($new_order as $new)
                                    <tr>
                                        <th scope="row">{{$new->id_order}}</th>
                                        <td>{{$new->id_user}}</td>
                                        <td>{{$new->created_at}}</td>
                                        <td>
                                            <form method="POST" action="ad_listorderdetail" >
                                                @csrf
                                                <input type="hidden" name="id_order" value="{{ $new->id_order }}">
                                                <input type="hidden" name="id_user" value="{{ $new->id_user }}">
                                                
                                                <button class="btn btn-primary">
                                                    Details
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <nav class="text-center">
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
            </nav>
        </article>
    </div>
</div>

@endsection()