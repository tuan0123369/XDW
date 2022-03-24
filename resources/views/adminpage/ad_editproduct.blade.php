@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper">
        <div class="app" id="app">
            <article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title"> Sửa sản phẩm <span class="sparkline bar" data-type="bar"></span>
                    </h3>
                </div>
                <form  action="ad_editproduct" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf
                    {{-- tên sản phẩm --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" data-validation="length" value="" data-validation-length="min10"
                            data-validation-error-msg="nhập ít nhất 10 ký tự" name="product_name" class="form-control "
                            id="slug" placeholder="Tên sản phẩm" onkeyup="ChangeToSlug();">
                    </div>
                    {{-- thể loại --}}
                    <div class="form-group">
                        <label for="">Danh mục sản phẩm</label>
                        <select name="id_categories" id="input" class="form-control">
                            @foreach ($data as $row)
                                <option value="{{ $row->id_categories }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- giá sản phẩm --}}
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="" placeholder="Nhập giá" name="price">
                    </div>

                    {{-- mô tả sản phẩm --}}
                    <div class="form-group">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="description" id="input" class="form-control" rows="3" required="required"> </textarea>
                    </div>
                    {{-- trạng thái --}}
                    <div class="form-group">
                        <label for="">Trạng thái sản phẩm</label>
                        <select name="status" id="input" class="form-control">
                            @foreach ($data as $row)
                                <option value="{{ $row->id_categories }}">{{ $row->status }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" id="" placeholder="Nhập giá" name="status"> --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" name="" class="btn btn-info">Sửa sản phẩm</button>
                </form>
            </article>
        </div>
    </div>
    </div>
@endsection()
