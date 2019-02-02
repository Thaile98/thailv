@extends('admin::admin_app')

@section('title', 'Quản lí bài viết')
@section('content')

<div class="box-search">
	<form action > 
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
						<label>Tìm theo ID</label>
					<input type="text" class="form-control" name="art_id" placeholder="Nhập ID" value="{{array_get($quering,'art_id')}}">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
						<label>Tìm theo danh mục</label>
					<select name="art_cat_id" class="form-control">
						<option value="">------ Danh mục ------</option>
						@foreach($categories as $cate)
						<option value="{{$cate->id}}" {{array_get($quering,'art_cat_id') == $cate->id ? 'selected' : ''}}
							>{{$cate->cat_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tìm theo trạng thái</label>
					<select name="art_status" class="form-control">
						<option value="">------ Trạng thái ------</option>
						<option value="4" {{array_get($quering,'art_status') == 4 ? 'selected' : ''}}>Chưa hoàn thành</option>
						<option value="1" {{array_get($quering,'art_status') == 1 ? 'selected' : ''}}>Yêu cầu duyệt</option>
						<option value="2" {{array_get($quering,'art_status') == 2 ? 'selected' : ''}}>Đã duyệt</option>
						<option value="3" {{array_get($quering,'art_status') == 3 ? 'selected' : ''}}>Hủy duyệt</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tìm theo tác giả</label>
					<select name="art_author_id" class="form-control">
						<option value="">------ Người viết ------</option>
						@foreach($admins as $admin)
						<option value="{{$admin->id}}" 
							{{array_get($quering,'art_author_id') == $admin->id ? 'selected' : ''}}
							>{{$admin->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<a href="{{route('get.article.create')}}" class="btn btn-sm btn-info" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-plus"></i>&nbsp;Tạo bài viết </a>
            <a href="{{route('get.article.list')}}" class="btn btn-sm btn-danger pull-right" style="padding-top: 8px;margin-bottom:1px;"><i class="fa fa-refresh"></i>&nbsp;Làm mới </a>
			<span class="pull-right">&nbsp;</span>
			<button type="submit" class="btn btn-sm btn-success pull-right" style="padding-top: 8px;margin-bottom: 1px;"> <i class="fa fa-search"></i> Tìm kiếm</button> 
		</div>
	</form>
</div>
<div class="clearfix">
	<span>Hiển thị {{$articles->firstItem()}} - {{$articles->lastItem()}} / Tổng : {{$articles->total()}} record</span>
</div>
<div>&nbsp;</div>
<table class="table table-bordered table-responsive table-hover">
	<thead>
		<tr>
			<th rowspan="2" class=" text-center" width="1%">ID</th>
			<th rowspan="2" width="3%" class="text-center ">Hình ảnh</th>
			<th rowspan="2" width="13%" class="text-center ">Tiêu đề</th>
			<th rowspan="2" width="13%" class="text-center ">Danh mục</th>
			<th rowspan="" width="7%" class="text-center bg-tr">Người đăng</th>
			<th rowspan="2" width="7%" class="text-center ">Người duyệt</th>
			<th rowspan="" width="10%" class="text-center bg-tr">Trạng Thái</th>
			<th rowspan="2" width="1%" class="text-center ">Thao tác</th>
		</tr>
		<tr>
			<th width="7%" class="text-center bg-tr">Ngày đăng</th>
			<th width="10%" class="text-center bg-tr">Ngày Update</th>
		</tr>
	</thead>
	<tbody>
		@foreach($articles as $art)
		<tr>
			<td class="text-center">{{$art->id}}</td>
			<td class="text-center"><img src="/uploads/article/{{$art->art_avatar}}" alt="" width="80px" height="60px"></td>
			<td class="text-primary text-bold">{{$art->art_name}}</td>
			<td class="text-center text-info text-bold">{{$art->category->cat_name}}</td>
			<td class="text-center">
				<span class="text-info text-bold">{{$art->author->name}}</span>
				<br>
				<span class="text-danger">{{$art->created_at}}</span>
			</td>
			<td class="text-center">
				@if($art->art_inspec_id===0)
					<span style="color:green;font-size: 15px">N/A</span>
				@else
					<span class="text-info text-bold">{{$art->inspec->name}}</span>
					<br>
					<span class="text-danger">Số lần hủy: {{$art->art_hit_cancel}}</span>
				@endif
			</td>
			<td class="text-center">
				<?php $status = $art->getValue(); ?>
				<span style="font-weight: 500" class="label {{$status['class']}}">{{$status['status']}}</span>
				<br>
				@if($art->art_status===3)
				<span>{{$art->article_detail->art_cancel_comment}}</span>
				<br>
				@endif
				<span style="font-weight: 500">{{$status['date']}}</span>
			</td>
			<td class="text-center">
				<div class="dropdown">
			    <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cogs"></i>
			    <span class="caret"></span></button>
				    <ul class="dropdown-menu dropdown-menu-handle" role="menu" >
						<li><a class="btn btn-default btn-xs" href="{{route('bai-viet',$art->id)}}" title="Preview"><i class="fa fa-eye"></i>Preview</a></li>
						<li><a class="btn btn-default btn-xs" href="{{route('get.article.edit',$art->id)}}" title="Sửa"><i class="fa fa-wrench"></i>Sửa</a></li>
						<li><a class="btn btn-default btn-xs view-article" title="Xem" data-id="{{$art->id}}"><i class="fa fa-link"></i>Xem</a></li>
							@if($art->art_status === 1)
							<li><a class="btn btn-default btn-xs" href="{{route('get.article.accept',$art->id)}}" title="Duyệt"><i class="fa fa-check"></i>Duyệt</a></li>
							@endif
							@if($art->art_status === 1 || $art->art_status === 2)
							<li><a class="btn btn-default btn-xs cancel-article" title="Hủy duyệt" data-id="{{$art->id}}"><i class="fa fa-close"></i>Hủy</a></li>
							@endif
							<li><a class="btn btn-default btn-xs" href="{{route('get.article.delete',$art->id)}}" title="Xóa" onclick="return confirm('Bạn có muốn xóa bài viết này không?');"><i class="fa fa-trash"></i>Xóa</a></li>
				    </ul>
			  	</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="clearfix">
	{{$articles->links()}}
</div>



<div class="modal fade" id="modalFormCancel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Li do hủy bài viết</h4>
            </div>
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <textarea rows="5" type="text" class="form-control" name="art_cancel_comment" id="art_cancel_comment" placeholder="Nhập lí do hủy bài"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger submitBtn" data-id="">Hủy duyệt</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalFormView" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="overflow-y: scroll;height: 95vh;">
        	
		</div>
    </div>
</div>
@endsection
@section('js-handle')
<script>
    $('.view-article').click(function()
    {
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/admin/articles/view',
            data:{ id : $(this).attr('data-id') },
            success:function(data){
                console.log(data.id);
                $('#modalFormView .modal-content').empty();
                let html = `
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" style="font-size: 24px">Nội dung SEO</h4>
                    </div>
                    <div class="modal-body">
                       <label for="">Meta Title</label>
                       <p>${data.art_meta_title}</p>
                        <label for="">Meta Description</label>
                        <p>${data.art_meta_description}</p>
                        <label for="">Meta Keywords</label>
                        <p>${data.art_meta_keyword}</p>
                    </div>
                    <div class="modal-body">
                        <h1 style="font-size: 22px;margin: 0;margin-bottom: 10px;">${data.art_name}</h1>
                       <div class="auth--info" style="margin-bottom: 10px;">
                            <div class="box-icon-info-auth">
                                <span class="bc-auth">
                                    <img src="https://123job.vn/favicon.png" style="width: 20px;height: 20px;border-radius: 50%"><span> ${data.author.name}</span> </span> <span style="margin:0 10px">${data.art_published_at}</span>
                                <span>${data.art_hit_view} lượt xem </span>
                            </div>
                        </div>
                        <p style="font-weight: 600">${data.art_meta_description}</p>
                        <div class="content" style="overflow: hidden;padding: 0">
                            ${data.article_detail.art_content}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-success btn-accept"><i class="fa fa-check"></i> Duyệt bài </a>
                        <a class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Đóng</a>
                    </div>
                `;
                $('#modalFormView .modal-content').html(html);
                $('#modalFormView .btn-accept').attr('href','/admin/article/accept/'+ data.id);
                $('#modalFormView').modal('show');
            }
        });
    });
    $('.cancel-article').click(function(){
        $('#modalFormCancel').modal('show');
        id = $(this).attr('data-id');
        $('.submitBtn').attr('data-id',id);
        $('.submitBtn').click(function(obj){
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'/admin/articles/cancel',
                data:{art_cancel_comment : $('#art_cancel_comment').val(), id : $(this).attr('data-id') },
                success:function(data){
                    $('#modalForm').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>

@endsection