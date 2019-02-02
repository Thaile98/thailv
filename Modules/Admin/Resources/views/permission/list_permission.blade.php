@extends('admin::admin_app')

@section('title', 'Danh sách các quyền')
@section('content')
        <div class="form-group">
            <a href="{{route('get.permission.create')}}" class="btn btn-sm btn-info" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-plus"></i>&nbsp;Tạo quyền </a>
        </div>
        <div class="form-group">
            <label class="form-control-label" style="font-size: 18px;font-weight: 600">Danh sách các quyền + Group</label>
            <div class="per-group">
                @foreach($per_groups as $pgr)
                        <div class="per-group__item">
                            <label>{{$pgr->pgr_name}}</label>
                            <ul style="list-style-type: none;padding: 0">
                                @foreach($pgr->permissions as $per)
                                    <li style="margin-bottom: 10px">
                                        <span class="label label-info" style="font-size: 15px">{{$per->name}}</span>
                                        <div class="pull-right">
                                            <a href="{{route('get.permission.edit',$per->id)}}" class="btn btn-default btn-xs" title=""><i class="fa fa-wrench"></i></a>
                                            <a href="{{route('get.permission.delete',$per->id)}}" class="btn btn-default btn-xs" title="" onclick="return confirm('Bạn có muốn xóa quyền này không?');"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                @endforeach
            </div>
        </div>
@endsection