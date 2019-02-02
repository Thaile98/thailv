@extends('admin::admin_app')

@section('title','Sửa danh mục : '.$cat->name)
@section('content')
                <form action="{{route('post.category.update',$cat->id)}}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="help-block">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="cat_name" class="form-control" value="{{ Old('cat_name',isset($cat) ? $cat->cat_name : '')}}">
                        </div>
                        <div class="form-group">
                            <label>Danh mục cha</label>
                            <select name="cat_parent_id" class="form-control">
                                <option value="0">Không</option>
                                @foreach($categories as $cate)
                                <option value="{{$cate->id}}"  {{old('cat_parent_id', $cat->cat_parent_id) === $cate->id ? 'selected' : '' }}>{{$cate->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại danh mục</label>
                            <select name="cat_type" class="form-control" value="{{ Old('cat_type',isset($cat) ? $cat->cat_type : '')}}">
                                <option value="1">Bài Viết</option>
                                <option value="2">Danh mục khác</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label">Ảnh đại diện</label>
                            <div class="">
                                <img src="/uploads/category/{{$cat->cat_avatar}}" alt="" id="blah" class="img" style="width: 148px;height:150px;">
                            </div>
                            <div class="input-group" style="margin-top: 10px">
                                <label class="input-group-btn"> <span class="btn btn-primary"> Chọn ảnh từ máy <input type="file" style="display: none;" id="imgInp" name="cat_avatar" accept="image/*"> </span> 
                                </label>
                                <input type="text" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Meta title</label>
                            <input type="text" name="cat_meta_title" class="form-control" value="{{ Old('cat_meta_title',isset($cat) ? $cat->cat_meta_title : '')}}" maxlength="70">
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <textarea rows="5" name="cat_meta_description" class="form-control" type="text" maxlength="200" minlength="160">{{ Old('cat_meta_description',isset($cat) ? $cat->cat_meta_description : '')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta keywords</label>
                            <input type="text" name="cat_meta_keyword" class="form-control"  value="{{ Old('cat_meta_keyword',isset($cat) ? $cat->cat_meta_keyword : '')}}">
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
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Cập nhật</button>
                        <a href="{{route('get.article.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                    </div>
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                </form>
@endsection