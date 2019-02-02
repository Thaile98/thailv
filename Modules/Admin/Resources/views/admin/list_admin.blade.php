@extends('admin::admin_app')

@section('title','Danh sách các tài khoản quản trị')
@section('content')
        	<div class="box-search">
        		<form action >
        			<div class="row">
        				<div class="col-md-3">
        					<div class="form-group">
        						<label>Tìm theo ID</label>
        						<input type="text" class="form-control" name="id" placeholder="Nhập ID" value="{{array_get($quering,'id')}}">
        					</div>
        				</div>
        				
        				<div class="col-md-3">
        					<div class="form-group">
        						<label>Tìm theo tên tài khoản</label>
        						<input type="text" class="form-control" name="name" class="typeahead-email" placeholder="Nhập tên" value="{{array_get($quering,'name')}}">
        					</div>
        				</div>
        				
        				<div class="col-md-3">
        					<div class="form-group">
        						<label>Tìm theo Email</label>
        						<input type="text" class="form-control" name="email" class="typeahead-email" placeholder="Nhập email" value="{{array_get($quering,'email')}}">
        					</div>
        				</div>
        				
        				<div class="col-md-3">
        					<div class="form-group">
        						<label>Tìm theo Vai trò</label>
        						<select name="role_id" class="form-control">
        							<option value="">-- Chọn vai trò --</option>
        							@foreach($roles as $role)
        							<option value="{{$role->id}}" 
        								{{array_get($quering,'role_id') == $role->id ? 'selected' : ''}}
        								>{{$role->name}}</option>
        							@endforeach
        						</select>
        					</div>
        				</div>
        			</div>
					<div class="form-group">
        				<a href="{{route('get.admin.create')}}" class="btn btn-sm btn-info" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-plus"></i>&nbsp;Tạo tài khoản </a>
						<button type="submit" class="btn btn-sm btn-success pull-right" style="padding-top: 8px;margin-bottom: 1px;"> <i class="fa fa-search"></i> Tìm kiếm</button>
						<span class="pull-right">&nbsp;</span>
						<a href="{{route('get.admin.list')}}" class="btn btn-sm btn-danger pull-right" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-refresh"></i>&nbsp;Làm mới </a>
					</div>
        		</form>
        	</div>
				
			<div class="clearfix">
				<span>Hiển thị {{$admins->firstItem()}} - {{$admins->lastItem()}} / Tổng : {{$admins->total()}} record</span>
			</div>
			<div>&nbsp;</div>
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr>
						<th scope="col" width="3%" class="text-center">ID</th>
						<th scope="col" width="10%" class="text-center">Avatar</th>
						<th scope="col" width="10%" class="text-center">Tên tài khoản</th>
						<th scope="col" width="20%" class="text-center">Email</th>
						<th scope="col" width="15%" class="text-center">Vai trò</th>
						<th scope="col" width="10%" class="text-center">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($admins as $admin)
					<tr>
						<td class="text-center text-success">{{$admin->id}}</td>
						<td class="text-center"><img src="{{asset('images/avatar.png')}}" width="40px" height="40px" class="img-circle" alt=""></td>
						<td class="text-center text-bold text-info">{{$admin->name}}</td>
						<td class="text-bold text-info" style="padding-left: 30px">{{$admin->email}}</td>
						<td class="text-center">
							@foreach($admin->roles as $ar)
								<span class="label label-info">{{$ar->name}}</span>
							@endforeach
						</td>
						<td class="text-center">
							<a href="{{route('get.admin.edit',$admin->id)}}" class="btn btn-default btn-xs" title="Sửa thông tin tài khoản"><i class="fa fa-wrench"></i> Sửa</a>
							<a href="{{route('get.admin.delete',$admin->id)}}" class="btn btn-default btn-xs" title="Xóa tài khoản"><i class="fa fa-close"></i> Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
@endsection