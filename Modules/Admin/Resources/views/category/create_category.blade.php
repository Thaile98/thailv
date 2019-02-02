@extends('admin::admin_app')
@section('title','Tạo danh mục')
@section('content')
                        <form action="{{route('post.category.create')}}" method="POST" enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="help-block">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" name="cat_name" class="form-control" value="{{ old('cat_name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                    <select name="cat_parent_id" class="form-control" value="{{ old('cat_parent_id') }}">
                                        <option value="0" default>Chọn danh mục cha</option>
                                        @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input type="text" name="cat_meta_title" class="form-control" value="{{ old('cat_meta_title') }} " maxlength="70">
                                </div>
                                <div class="form-group">
                                    <label>Loại danh mục</label>
                                    <select name="cat_type" class="form-control" value="{{ old('cat_type') }}">
                                        <option value="1">Bài Viết</option>
                                        <option value="2">Danh mục khác</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="cat_status" value="0">
                                            Ẩn
                                        </label>
                                        <label>
                                            <input type="radio" name="cat_status" value="1" checked="">
                                            Hiện
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phân cấp danh mục</label>
                                    <select name="cat_rank" class="form-control" value="{{ old('cat_rank') }}">
                                        <option value="1" selected> Danh mục cấp 1 </option>
                                        <option value="2" > Danh mục cấp 2 </option>
                                        <option value="3" > Danh mục cấp 3 </option>
                                    </select>
                                </div>
                                <div class="button-submit">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Tạo Mới</button>
                                    <a href="{{route('get.article.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea rows="5" name="cat_meta_description" class="form-control" type="text" maxlength="200" minlength="160">{{ old('cat_meta_description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta keywords</label>
                                    <input type="text" name="cat_meta_keyword" class="form-control"  value="{{ old('cat_meta_keyword') }}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Ảnh đại diện</label>
                                    <div class="">
                                        <img src="/images/default-placeholder.png" alt="" id="blah" class="img" style="width: 148px;height:150px;">
                                    </div>
                                    <div class="input-group" style="margin-top: 10px">
                                        <label class="input-group-btn"> <span class="btn btn-primary"> Chọn ảnh từ máy <input type="file" style="display: none;" id="imgInp" name="cat_avatar" accept="image/*"> </span> 
                                        </label>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        </form>
@endsection