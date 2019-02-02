@extends('admin::admin_app')
@section('title','Tạo quyền mới')
@section('content')
        <div class="col-md-6 col-md-offset-3">
            <form action="{{route('post.permission.save')}}" method="POST" role="form" class="form-handle">
                    @if ($errors->any())
                        <div class="help-block">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Tên quyền mới</label>
                        <input type="text" name="name" class="form-control" value="{{Old('name')}}" placeholder="Nhập tên quyền mới" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" name="description" class="form-control" value="{{Old('description')}}" placeholder="Nhập mô tả" required>
                    </div>
                    <div class="form-group">
                        <label>Group</label>
                        <select name="group_id" class="form-control">
                            <option value="">-- Chọn group --</option>
                            @foreach($per_groups as $pgr)
                            <option value="{{$pgr->id}}">{{$pgr->pgr_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Thuộc vai trò :</label>
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-md-4">
                                    <input type="checkbox" name="roles[{{$role->id}}]"> {{$role->name}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Tạo mới</button>
                        <a href="{{route('get.permission.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                    </div>
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
            </form>
        </div>
@endsection