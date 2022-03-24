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
                                <h3 class="title"> Quản lý bài viết</h3> <a href="{{ url('ad_addblog') }}"
                                    class="btn btn-primary btn-sm rounded-s"> Thêm</a>
                                <div class="action dropdown">
                                    <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"> More actions... </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o icon"></i>Mark as
                                            a draft</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#confirm-modal"><i class="fa fa-close icon"></i>Delete</a>
                                    </div>
                                </div>
                                </h3>
                                {{-- <p class="title-description"> List of sample items - e.g. books, movies, events, etc...
                                </p> --}}
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
                <div class="card items">
                    <ul class="item-list striped">
                        <li class="item item-list-header">
                            <div class="item-row">
                                {{-- <div class="item-col fixed item-col-check">
                                    <label class="item-check" id="select-all-items">
                                        <input type="checkbox" class="checkbox">
                                        <span></span>
                                    </label>
                                </div> --}}

                                {{-- <div class="item-col item-col-header fixed item-col-img md">
                                    <div>
                                        <span>Id</span>
                                    </div>
                                </div> --}}
                                <div class="item-col item-col-header item-col-title">
                                    <div>
                                        <span>Tiêu Đề</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header ">
                                    <div>
                                        <span>Nội dung</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header item-col-stats">
                                    <div class="no-overflow">
                                        <span>Hình</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header item-col-category">
                                    <div class="no-overflow">
                                        <span>Xóa</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header item-col-author">
                                    <div class="no-overflow">
                                        <span>Sửa</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header fixed item-col-actions-dropdown">
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            @foreach ($data as $row)
                                <div class="item-row">
                                    {{-- <div class="item-col fixed item-col-img md">
                                        <td>{{ $row->id_blog }}</td>
                                    </div> --}}
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">Name</div>
                                        <div>
                                            <a href="#" class="">
                                                <h4 class="item-title">
                                                    <td>{{ $row->name_blog }}</td>
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-col ">
                                        <div class="item-heading">Sales</div>
                                        <div>
                                            <td>{{ $row->description }}</td>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-stats no-overflow">
                                        <div class="no-overflow">
                                            <div class="item-stats sparkline" data-type="bar">

                                                <img src="public/img/$row->images" alt="">
                                                <img src="img/i2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="  item-col item-col-author">
                                        <div class="item-heading">Author</div>
                                        <div class="no-overflow">
                                            <form method="POST" action="ad_deleteblog" class="edit">
                                                @csrf
                                                <input type="hidden" name="blog_delete" value="{{ $row->id_blog }}">
                                                <button class="btn btn-primary">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="item-col item-col-author">
                                        <div class="item-heading">Author</div>
                                        <div class="no-overflow">

                                            <form method="POST" action="view_ad_EditBlog" class="edit">
                                                @csrf
                                                <input type="hidden" name="id_blog" value="{{ $row->id_blog }}">
                                                <input type="hidden" name="name_blog" value="{{ $row->name_blog }}">
                                                <input type="hidden" name="description" value="{{ $row->description }}">
                                                <input type="hidden" name="image" value="{{ $row->image }}">
                                                <button class="btn btn-primary">
                                                    {{-- <i class="fa fa-trash-o "></i> --}}
                                                    Edit
                                                </button>
                                            </form>


                                        </div>
                                    </div>

                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown">

                                            <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <li>
                                                        <a class="remove" href="#" data-toggle="modal"
                                                            data-target="#confirm-modal">
                                                            <i class="fa fa-trash-o "></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="edit" href="#">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </article>

            <div class="modal fade" id="modal-media">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Media Library</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body modal-tab-container">
                            <ul class="nav nav-tabs modal-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                </li>
                            </ul>
                            <div class="tab-content modal-tab-content">
                                <div class="tab-pane fade" id="gallery" role="tabpanel">
                                    <div class="images-container">
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                    <div class="upload-container">
                                        <div id="dropzone">
                                            <form action="/" method="POST" enctype="multipart/form-data"
                                                class="dropzone needsclick dz-clickable" id="demo-upload">
                                                <div class="dz-message-block">
                                                    <div class="dz-message needsclick"> Drop files here or click to
                                                        upload. </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Insert Selected</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="modal fade" id="confirm-modal">
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
            </div><!-- /.modal -->
        </div>
    </div>
@endsection()
