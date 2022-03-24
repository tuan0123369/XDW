<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-collapse d-lg-none d-xl-none">
                <button class="collapse-btn" id="sidebar-collapse-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            {{-- <div class="header-block header-block-search">
                    <form role="search">
                        <div class="input-container">
                            <i class="fa fa-search"></i>
                            <input type="search" placeholder="Search">
                            <div class="underline"></div>
                        </div>
                    </form>
                </div> --}}
            <div class="header-block header-block-nav">
                <ul class="nav-profile">

                    <li class="profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="img"
                                style="background-image: url('img/avatar/{{ Session::get('user_avatar') }}')">
                            </div>
                            <span class="name">
                                @if (Session::get('logged'))
                                    {{ Session::get('user_name') }}
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                            @if (Session::get('user_role') == 1)
                                <a class="dropdown-item" href="{{ url('user_detail') }}">
                                    <i class="fa fa-user icon"></i> Profile </a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="{{ url('user_edit') }}">
                                <i class="fa fa-user icon"></i> Edit </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('logout') }}">
                                <i class="fa fa-power-off icon"></i> Logout </a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo">
                            <span class="l l1"></span>
                            <span class="l l2"></span>
                            <span class="l l3"></span>
                            <span class="l l4"></span>
                            <span class="l l5"></span>
                        </div> Modular Menu
                    </div>
                </div>
                <nav class="menu">
                    <ul class="sidebar-menu metismenu" id="sidebar-menu">
                        @if (Session::get('user_role') != 1)
                            <li>
                                <a href="{{ url('/') }}">
                                    <i class="fa fa-home"></i> Trang chủ </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('ad_index') }}">
                                    <i class="fa fa-home"></i> Dash Board </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-group"></i> Quản lí người dùng <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">
                                    <li>
                                        <a href="{{ url('ad_listuser') }}" data-include="user.html"><i
                                                class="fa fa-chevron-circle-right"></i>&ensp;Danh sách người dùng </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-truck"></i> Quản lí đơn hàng <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">
                                    <li>
                                        <a href="{{ url('ad_listorder') }}"><i
                                                class="fa fa-chevron-circle-right"></i>&ensp;Danh sách
                                            đơn hàng
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-dropbox"></i> Sản phẩm & Bài viết <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">
                                    <li>
                                        <a href="{{ url('ad_listproduct') }}"><i
                                                class="fa fa-chevron-circle-right"></i>&ensp;Sản phẩm </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('ad_listblog') }}"><i
                                                class="fa fa-chevron-circle-right"></i>&ensp; Bài viết </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/') }}">
                                    <i class="fa fa-home"></i> User Page </a>
                            </li>
    
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>

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
