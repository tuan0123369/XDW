@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper">
        <div class="app" id="app">
            {{-- <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div> --}}
            <article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title"> Sửa Bài Viết <span class="sparkline bar" data-type="bar"></span>
                    </h3>
                </div>
                {{-- URL::to('/save') --}}
                {{-- Controller --}}
                <form role="form" action="ad_editblog" method="post" enctype="multipart/form-data">
                    {{-- {{ csrf_field() }} --}}
                    {{-- @method('PATCH') --}}
                    @csrf
                    <input type="hidden" value="{{ Session::get('id_blog') }}" name="id_blog">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiều đề bài viết</label>
                        {{-- Session::get('sesion1') --}}
                        <input type="text" data-validation="length" value="{{ Session::get('name_blog') }}"
                            data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự"
                            name="name_blog" class="form-control " id="slug" placeholder="Tên danh mục"
                            onkeyup="ChangeToSlug();">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="description" id="id4"
                            placeholder="Nội dung sản phẩm">{{ Session::get('description') }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Thể loại</label>
                        <select name="id_categories" class="form-control input-sm m-bot15">
                            @foreach ($data as $row)
                                <option value="{{ $row->id_categories }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                    </div>
                    {{-- <a href="{{ url('save') }}"> --}}

                    <button type="submit" name="add-post" class="btn btn-info">Sứa bài viêt</button>

                    {{-- </a> --}}


                </form>
            </article>
        </div>
    </div>
    </div>
@endsection()
