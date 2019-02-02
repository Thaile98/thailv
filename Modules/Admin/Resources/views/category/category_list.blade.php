@extends('admin::admin_app')

@section('title','Danh sách các danh mục')
@section('content')
		    <div class="row">
			    @if(\Session::has('deleteCategory_success'))
		    	<div class="alert alert-info alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success : </strong> {{\Session::get('deleteCategory_success')}}
				</div>
			    @endif
                <div class="col-md-12">
	                <h3 class="text-info">Danh mục : {{$cat->cat_name}}</h3>
	            </div>
				<div class="col-md-12">
					<div class="box">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th width="5%" scope="col" class="text-center">ID</th>
									<th width="20%" scope="col" class="text-center">Tên danh mục</th>
									<th width="30%" scope="col" class="text-center">Mô tả</th>
									<th width="10%" scope="col" class="text-center">Trạng thái</th>
									<th width="20%" scope="col" class="text-center">Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $cat)
								<tr>
									<td class="text-center">{{$cat->id}}</td>
									<td>{{$cat->cat_name}}</td>
									<td><?php echo str_limit($cat->cat_meta_description,100) ?></td>
									<td class="text-center">
										@if($cat->cat_status===1)
											<span class="label label-info">Hiển thị</span>
										@else
											<span class="label label-danger">Ẩn</span>
										@endif
									</td>
									<td class="text-center">
										<a href="{{route('view-categories',$cat->id)}}" class="btn btn-sm btn-primary" title="Xem"><i class="fa fa-eye"></i></a>
										<a href="{{route('edit-category',$cat->id)}}" class="btn btn-sm btn-warning" title="Sửa"><i class="fa fa-wrench"></i></a>
										<a href="{{route('delete-category',$cat->id)}}" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có muốn xóa danh mục này không?');"><i class="fa fa-close"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
	    </div>
        <div class="clearfix">
        	<a href="{{route('create-category')}}" class="btn btn-primary" title="Tạo danh mục">Tạo danh mục</a>
        	<a href="{{route('create-article')}}" class="btn btn-success" title="Tạo bài viết">Tạo bài viết</a>
        </div>
@endsection