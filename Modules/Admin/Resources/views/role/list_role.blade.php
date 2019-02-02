@extends('admin::admin_app')

@section('title','Danh sách các vai trò')
@section('content')
		<div class="form-group">
		    <a href="{{route('get.role.create')}}" class="btn btn-sm btn-info" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-plus"></i>&nbsp;Tạo vai trò </a>
		</div>
		<table class="table table-responsive table-hover table-bordered">
			<thead>
				<tr>
					<th scope="col" width="3%" class="text-center">ID</th>
					<th scope="col" width="10%" class="text-center">Tên vai trò</th>
					<th scope="col" width="10%" class="text-center">Mô tả</th>
					<th scope="col" width="40%" class="text-center">Các quyền</th>
					<th scope="col" width="10%" class="text-center">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					<td class="text-center text-success">{{$role->id}}</td>
					<td class="text-center text-success">{{$role->name}}</td>
					<td class="text-center text-success">{{$role->description}}</td>
					<td class="text-center">
						@if($role->name==="admin")
							<span class="label label-info" style="font-size: 12px">FULL</span>
						@else
							@foreach($role->permissions as $rp)
									<span class="label label-info" style="font-size: 12px">{{$rp->name}}</span>
							@endforeach
						@endif
					</td>
					<td class="text-center">
						<a href="{{route('get.role.edit',$role->id)}}" class="btn btn-default btn-xs" title="Sửa thông tin tài khoản"><i class="fa fa-wrench"></i> Sửa</a>
						<a href="{{route('get.role.delete',$role->id)}}" class="btn btn-default btn-xs" title="Xóa tài khoản" onclick="return confirm('Bạn có muốn xóa vai trò này không?');"><i class="fa fa-close"></i> Xóa</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
@endsection