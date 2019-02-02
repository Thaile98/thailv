@extends('admin::admin_app')
@section('title','Tạo bài viết')
@section('content')
            <form action="{{route('post.article.create')}}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="help-block">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box-item" style="padding-top: 10px">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label">Ảnh đại diện</label>
                                            <div class="">
                                                <img src="/images/default-placeholder.png" alt="" id="blah" class="img" style="width: 148px;height:150px;">
                                            </div>
                                            <div class="input-group" style="margin-top: 10px">
                                                <label class="input-group-btn"> <span class="btn btn-primary"> Chọn ảnh từ máy <input type="file" style="display: none;" id="imgInp" name="art_avatar" accept="image/*"> </span> 
                                                </label>
                                                <input type="text" class="form-control" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group item-input">
                                            <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Tiêu đề bài viết</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 70 ký tự</span></span>
                                            </label>
                                            <div class="">
                                                <input type="text" name="art_name" value="{{ old('art_name') }}" class="form-control max-length" maxlength="70" placeholder="Tiêu đề bài viết không quá 70 kí tự" required>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục bài viết</label>
                                            <select name="art_cat_id" class="form-control" value="{{ old('art_cat_id') }}">
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                <label>Tags việc làm</label>
                                                <input type="text" name="art_tags" class="typeahead form-control tm-input" data-role="tagsinput">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Nội dung bài viết</label>
                                        <textarea rows="10" id="art-content" name="art_content" class="form-control" type="text">{{ old('art_content') }}</textarea>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Meta Title seo</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 70 ký tự</span></span>
                                    </label>
                                    <div class="">
                                        <input type="text" name="art_meta_title" value="{{ old('art_meta_title') }}" class="form-control max-length" maxlength="70" placeholder="Meta title không quá 70 kí tự" >
                                    </div>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Meta Keyword</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 160 ký tự</span></span>
                                                                    </label>
                                    <div>
                                        <textarea rows="3" name="art_meta_keyword" class="form-control max-length" type="text" maxlength="160" placeholder="Meta keyword không quá 160 kí tự" >{{ old('art_meta_keyword') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group item-input">
                                    <label class="control-label" style="display: flex;justify-content: space-between;"> <span>Meta Description</span>  <span class="pull-right"><span class="color-007bff">Số ký tự đã dùng <b class="count-lenght-input">0</b></span><span class="count-lenght color-007bff"> / 160 ký tự</span></span>
                                                                    </label>
                                    <div>
                                        <textarea rows="5" name="art_meta_description" class="form-control max-length" type="text" maxlength="160" placeholder="Meta description không quá 160 kí tự" >{{ old('art_meta_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" name="create" value="create_review"><i class="fa fa-save"></i> Tạo mới & xem lại</button>
                                    <button type="submit" class="btn btn-success" name="create" value="create_continue"><i class="fa fa-save"></i> Tạo mới & tiếp tục</button>
                                    <button type="submit" class="btn btn-warning" name="create" value="save_temporarily"><i class="fa fa-save"></i> Lưu tạm thời</button>
                                    <a href="{{route('get.article.list')}}" class="btn btn-danger pull-right">Trở về danh sách</a>
                                </div>
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            </div>
                        </div>
                    </div>
            </form>
<!-- <div id="ssb-container" class="ssb-btns-left ssb-disable-on-mobile ssb-anim-slide">
    <ul class="ssb-light-hover">
        <li id="ssb-btn-0">
            <a href="#" class="ssb-icon"><span class="fa fa-cogs"></span></a>
            <ul>
                <li>
                    <button type="submit" class="btn btn-info float-right" name="create" value="create_review"><i class="fa fa-save"></i> Tạo mới & xem lại</button>
                </li>
                <li>
                    <button type="submit" class="btn btn-success float-right" name="create" value="create_continue"><i class="fa fa-save"></i> Tạo mới & tiếp tục</button>
                </li>
                <li>
                    <button type="submit" class="btn btn-warning float-right" name="create" value="save_temporarily"><i class="fa fa-save"></i> Lưu tạm thời</button>
                </li>
                <li>
                    <a href="{{route('get.article.list')}}" class="btn btn-danger float-right"><i class="fa fa-close"></i> Hủy</a>
                </li>
            </ul>
        </li>
    </ul>
</div> -->
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