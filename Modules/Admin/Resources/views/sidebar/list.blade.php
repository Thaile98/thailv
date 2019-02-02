@extends('admin::admin_app')

@section('title','Danh sách các Sidebar Item')
@section('content')
			<div class="form-group">
				<a href="{{route('get.sidebar_item.create')}}" class="btn btn-sm btn-info" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-plus"></i>&nbsp;Tạo mới</a>
			</div>
			<table class="table table-responsive table-hover table-bordered">
				<thead>
					<tr>
						<th scope="col" width="3%" class="text-center">ID</th>
						<th scope="col" width="15%" class="text-center">Tên Service</th>
						<th scope="col" width="10%" class="text-center">Quyền truy cập</th>
						<th scope="col" width="10%" class="text-center">Class icon</th>
						<th scope="col" width="25%" class="text-center">List item</th>
						<th scope="col" width="10%" class="text-center">Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sidebarItems as $sbi)
					<tr>
						<td class="text-center text-bold">{{$sbi->id}}</td>
						<td class="text-center text-bold">{{$sbi->name}}</td>
						<td class="text-center text-bold">{{$sbi->permission}}</td>
						<td class="text-center text-bold">{{$sbi->icon}}</td>
						<td class="">
							@foreach(json_decode($sbi->item) as $item_name => $item_link)
								<p>
									<span class="label label-info" style="font-size: 13px">{{$item_link}}</span>
									<span><i class="fa fa-arrow-right"></i></span>
									<span class="label label-info" style="font-size: 13px">{{$item_name}}</span>
								</p>
							@endforeach
						</td>
						<td class="text-center">
							<a href="{{route('get.sidebar_item.edit',$sbi->id)}}" class="btn btn-default btn-xs" title="Sửa thông tin tài khoản"><i class="fa fa-wrench"></i> Sửa</a>
							<a href="{{route('get.sidebar_item.delete',$sbi->id)}}" class="btn btn-default btn-xs" title="Xóa tài khoản"><i class="fa fa-close"></i> Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
@endsection