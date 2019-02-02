@extends('admin::admin_app')

@section('title', 'Tạo vai trò mới')
@section('content')
        <form action="{{route('post.role.save')}}" method="POST" role="form">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5">
                        <label class="form-control-label">Tên vai trò</label>
                        <input type="text" name="name" class="form-control" value="{{Old('name')}}" required>
                    </div>
                    <div class="col-md-7">
                        <div class="pull-right">
                            <a href="{{route('get.role.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">Mô tả vai trò</label>
                <input type="text" name="description" class="form-control" value="{{old('description')}}">
            </div>
            <div class="form-group">
                <label class="form-control-label" style="font-size: 18px;font-weight: 600">Danh sách các quyền</label>
                <div class="per-group">
                    @foreach($per_groups as $pgr)
                            <div class="per-group__item">
                                <label>{{$pgr->pgr_name}}</label>
                                <ul style="list-style-type: none;padding: 0">
                                    @foreach($pgr->permissions as $per)
                                        <li><input type="checkbox" name="pers[{{$per->id}}]"> {{$per->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Tạo mới</button>
                <a href="{{route('get.role.create')}}" class="btn btn-danger"><i class="fa fa-refresh"></i> Làm mới</a>
            </div>
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
        </form>
@endsection