@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper">
        <div class="app" id="app">
            {{-- <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div> --}}
            <article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title"> Thêm Bài Viết <span class="sparkline bar" data-type="bar"></span>
                    </h3>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger" style="text-align: center">
                        @foreach ($errors->all() as $err)
                            {{ $err }}
                            <br>
                        @endforeach
                    </div>
                @endif
                <form role="form" action="ad_addblog" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiều đề bài viết</label>
                        <input type="text" data-validation="length" value="" data-validation-length="min10"
                            data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="name_blog" class="form-control "
                            id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="description" id="id4"
                            placeholder="Nội dung sản phẩm"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Thể loại</label>
                        <select name="id_categories" class="form-control input-sm m-bot15"> --}}

                            @foreach ($data as $row)
                                <option value="{{ $row->id_categories }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" name="add-post" class="btn btn-info">Thêm bài viêt</button>
                </form>
            </article>
        </div>
    </div>
    </div>
@endsection()
