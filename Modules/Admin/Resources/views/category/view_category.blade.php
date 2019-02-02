@extends('admin::admin_app')

@section('content')
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Tên danh mục</th>
							<th scope="col">Trạng thái</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $cat)
						<tr>
							<td>{{$cat->id}}</td>
							<td>{{$cat->cat_name}}</td>
							<td>
								@if($cat->cat_status===1)
									Hiển thị
								@else
									Ẩn
								@endif
							</td>
							<td>
								<a href="#" class="btn btn-sm btn-primary" title="Xem"><i class="fa fa-eye"></i></a>
								<a href="{{route('edit-category',$cat->id)}}" class="btn btn-sm btn-warning" title="Sửa"><i class="fa fa-wrench"></i></a>
								<a href="{{route('delete-category',$cat->id)}}" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có muốn xóa danh mục này không?');"><i class="fa fa-close"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
@endsection