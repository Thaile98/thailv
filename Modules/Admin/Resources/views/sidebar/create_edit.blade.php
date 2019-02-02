@extends('admin::admin_app')

@if (\Request::is('admin/sidebar/edit/*'))
@section('title','Cập nhật Sidebar Item : '.$sidebarItem->name)
@else
@section('title','Tạo Sidebar Item')
@endif

@section('content')
            <div class="col-md-6 col-md-offset-3">
                @if (\Request::is('admin/sidebar/edit/*'))
                <form action="{{route('post.sidebar_item.update',$sidebarItem->id)}}" method="POST" class="form-handle" role="form">
                @else
                <form action="{{route('post.sidebar_item.store')}}" method="POST" class="form-handle" role="form">
                @endif
                    <div class="form-group">
                        <label class="form-control-label" style="font-size:17px">Service</label>
                        <input type="text" name="name" value="{{ Old('name',isset($sidebarItem) ? $sidebarItem->name : '')}}" class="form-control w-50" placeholder="Nhập tên service" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" style="font-size:17px">Quyền truy cập</label>
                        <input type="text" name="permission" value="{{ Old('permission',isset($sidebarItem) ? $sidebarItem->permission : '')}}" class="form-control w-50" placeholder="Nhập quyền truy cập">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" style="font-size:17px">Icon Class</label>
                        <input type="text" name="icon" value="{{ Old('icon',isset($sidebarItem) ? $sidebarItem->icon : '')}}" class="form-control w-50" placeholder="Ví dụ : fa fa-users" required>
                    </div>

                    <div class="form-group" id="item-service">
                        <label class="form-control-label" style="font-size:17px">Item Service List</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label">Tên Item Service</label>
                            </div>
                            <div class="col-md-5">
                                <label class="form-control-label">Đường dẫn</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Ví dụ : Danh sách tài khoản admin </p>
                            </div>
                            <div class="col-md-5">
                                <p>Ví dụ : get.admin.list </p>
                            </div>
                            <a type="submit" class="btn btn-info btn-xs" id="btn-plus-item"><i class="fa fa-plus"></i></a>
                        </div>
                        @if (\Request::is('admin/sidebar/edit/*'))
                            @foreach(json_decode($sidebarItem->item) as $item_name => $item_link)
                            <div class="row" style="margin-bottom: 5px">
                                <div class="col-md-6">
                                    <input type="text" value="{{$item_name}}" name="item_name[]" class="form-control w-50" placeholder="Nhập tên item" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" value="{{$item_link}}" name="item_link[]" class="form-control w-50" placeholder="Nhập đường dẫn" required>
                                </div>
                                <a style="margin-top:5px" class="btn btn-danger btn-xs delete-item"><i class="fa fa-close"></i></a>
                            </div>
                            @endforeach
                        @else
                        <div class="row" style="margin-bottom: 5px">
                            <div class="col-md-6">
                                <input type="text" name="item_name[]" class="form-control w-50" placeholder="Nhập tên item" required>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="item_link[]" class="form-control w-50" placeholder="Nhập đường dẫn" required>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                            @if (\Request::is('admin/sidebar/edit/*'))
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Cập nhật</button>
                            @else
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Tạo mới</button>
                            @endif
                            <a href="{{route('get.admin.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                    </div>
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                </form>
            </div>
@endsection
@section('js-handle')
<script>
    function deleteItem() {
        $('.delete-item').each(function() {
            $(this).click(function() {
                $(this).parent().remove();
            });
        });
    }
    deleteItem();
    $('#btn-plus-item').click(function(){
        $('#item-service').append(`<div class="row" style="margin-bottom: 5px">
                                        <div class="col-md-6">
                                            <input type="text" name="item_name[]" class="form-control w-50" placeholder="Nhập tên item" required>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="item_link[]" class="form-control w-50" placeholder="Nhập đường dẫn" required>
                                        </div>
                                        <a style="margin-top:5px" class="btn btn-danger btn-xs delete-item"><i class="fa fa-close"></i></a>
                                    </div>`);
        deleteItem();
    });
</script>

@endsection