@extends('admin::admin_app')
@section('title','Sửa bài viết : '.$art->art_name)
@section('content')
            <form action="{{route('post.article.update',$art->id)}}" method="POST" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="help-block">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="box-item">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group ">
                                    <label class="control-label">Ảnh đại diện</label>
                                    <div class="">
                                        <img src="/uploads/article/{{$art->art_avatar}}" alt="" id="blah" class="img" style="width: 148px;height:150px;">
                                    </div>
                                    <div class="input-group" style="margin-top: 10px">
                                        <label class="input-group-btn"> <span class="btn btn-primary"> Chọn ảnh từ máy <input type="file" style="display: none;" id="imgInp" name="art_avatar" accept="image/*"> </span> 
                                        </label>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Tiêu đề bài viết</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 70 ký tự</span></span>
                                    </label>
                                    <div class="">
                                        <input type="text" name="art_name" value="{{ Old('art_name',isset($art) ? $art->art_name : '')}}" class="form-control max-length" maxlength="70" placeholder="Tiêu đề bài viết không quá 70 kí tự" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                    <select name="art_cat_id" class="form-control">
                                        @foreach($categories as $cat)
                                        <option value="{{$cat->id}}"  {{old('art_cat_id', $art->art_cat_id) === $cat->id ? 'selected' : '' }}>{{$cat->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Tags việc làm</label>
                                    <input type="text" name="art_tags" class="typeahead form-control tm-input">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung bài viết</label>
                                    <textarea rows="10" id="art-content" name="art_content" class="form-control" type="text" required>{{ Old('art_content',isset($art) ? $art->article_detail->art_content : '')}}</textarea>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Meta Title seo</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 70 ký tự</span></span>
                                    </label>
                                    <div class="">
                                        <input type="text" name="art_meta_title" value="{{ Old('art_meta_title',isset($art) ? $art->art_meta_title : '')}}" class="form-control max-length" maxlength="70" required>
                                    </div>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Meta Keyword</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 160 ký tự</span></span>
                                                                    </label>
                                    <div>
                                        <textarea rows="3" name="art_meta_keyword" class="form-control max-length" type="text" maxlength="160" required>{{ Old('art_meta_keyword',isset($art) ? $art->art_meta_keyword : '')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Meta Description</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 160 ký tự</span></span>
                                                                    </label>
                                    <div>
                                        <textarea rows="5" name="art_meta_description" class="form-control max-length" type="text" maxlength="160" required>{{ Old('art_meta_description',isset($art) ? $art->art_meta_description : '')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" name="update" value="update"> <i class="fa fa-edit"></i> Cập nhật</button>
                                    <button type="submit" class="btn btn-primary" name="update" value="update_preview"> <i class="fa fa-edit"></i> Cập nhật & xem</button>
                                    @if(in_array($art->art_status,[3,4]))
                                    <button type="submit" class="btn btn-warning" name="update" value="update_req_accept"> <i class="fa fa-upload"></i> Sửa bài viết & Yêu cầu duyệt</button>
                                    @endif
                                    <a href="{{route('get.article.list')}}" class="btn btn-danger pull-right"><i class="fa fa-close"></i> Hủy</a>
                                </div>
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            </div>
                        </div>
            </form>
@endsection
@section('js-handle')
    <script>
          $(document).ready(function() {
            var tagApi = $(".typeahead").tagsManager();
            jQuery(".typeahead").typeahead({
                autoSelect: false,
                name: 'tags',
                displayKey: 'tag_name',
                source: function (query, process) {
                    return $.get('{{ route("get.article.search_tag") }}', {
                        query: query
                    }, function (data) {
                        return process(data);
                    });
                },
                afterSelect: function (item) {
                    tagApi.tagsManager("pushTag", item);
                },
            });
          });
    </script>
    <script>
        CKEDITOR.replace( 'art-content' ,{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
    <script>
        var functin_helpers = {
            configSelector : {
                'classMaxLength'        : '.max-length',
                'clsasCountLenght'      : '.count-lenght-input'
            },
            init : function(){
                let _this = this;
                _this.validatorForm();
            },
            validatorForm()
            {
                let _this = this;
                $(_this.configSelector.classMaxLength).on('input',function(){
                    $length     = $(this).val().length;
                    $max_lenght = $(this).attr('maxlength');
                    $(this).parents('.item-input').find(_this.configSelector.clsasCountLenght).html($(this).val().length);

                    $class_move = $(this).attr('data-move');

                    if ($class_move)
                    {
                        $('.'+$class_move).val($(this).val());
                    }
                });
            }
        }


        $(function(){
            "use strict";
            functin_helpers.init();
        });
    </script>
@endsection