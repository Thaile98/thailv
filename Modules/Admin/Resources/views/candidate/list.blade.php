@extends('admin::admin_app')

@section('title', 'Danh sách ứng viên')
@section('content')
<div class="form-search-pro" style="margin: 8px 10px;float: left;">
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-search"></i> Tìm kiếm nâng cao
    </a>
</div>
<table class="table table-responsive table-hover">
	<thead>
		<tr class="text-success">
			<th  class=" text-center" width="1%">ID</th>
			<th  width="30%" class="text-center ">Name & Email</th>
			<th  width="10%" class="text-center bg-tr">Nguồn</th>
			<th  width="10%" class="text-center bg-tr">Stage</th>
			<th  width="10%" class="text-center ">Đánh giá</th>
			<th  width="1%" class="text-center ">Action</th>
		</tr>
	</thead>
	<tbody>
		@for($i=1;$i<=5;$i++)
		<tr>
			<td class="text-center">{{$i}}</td>
			<td>
				<div class="" style="float: left;margin-right: 10px">
					<img src="http://codetest.abc/images/avatar.png" class="img-circle" width="45px" height="45px" alt="User Image">
				</div>
				<div class=" text-info" style="float: left;margin-top: 3px">
					<a href="#"><span>Phương Anh Hoàng</span></a>
					<br>
					<a href="#"><span>phuonganhhoangvp98@gmail.com</span></a> - <a href="#"><span>0969080985</span></a>
				</div>
			</td>
			<td class="text-center"><span class="label label-info">123job</span></td>
			<td class="text-center">
				<span class="text-success"><i class="fa fa-circle"></i></span>
				<span class="text-success">-----</span>
				<span class="text-success"><i class="fa fa-circle"></i></span>
				<span class="text-light">-----</span>
				<span class="text-light"><i class="fa fa-circle-o"></i></span>
			</td>
			<td class="text-center">
				<div class="rateit_star1" data-rateit-value="2.5"  data-productid="{{$i}}"></div>
				<div class="count-star">
					<span class="label label-danger">
						2.5 / 5 star
					</span>
				</div>
			</td>
			<td class="text-center">
				<div class="dropdown">
			    <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cogs"></i>
			    <span class="caret"></span></button>
				    <ul class="dropdown-menu dropdown-menu-handle" role="menu" >
						<li><a class="btn btn-default btn-xs" href="" title="Preview"><i class="fa fa-eye"></i>Preview</a></li>
						<li><a class="btn btn-default btn-xs" href="" title="Sửa"><i class="fa fa-wrench"></i>Sửa</a></li>
						<li><a class="btn btn-default btn-xs view-article" title="Xem" data-id=""><i class="fa fa-link"></i>Xem</a></li>
						<li><a class="btn btn-default btn-xs" href="" title="Duyệt"><i class="fa fa-check"></i>Duyệt</a></li>
						<li><a class="btn btn-default btn-xs cancel-article" title="Hủy duyệt" data-id=""><i class="fa fa-close"></i>Hủy</a></li>
						<li><a class="btn btn-default btn-xs" href="" title="Xóa" onclick="return confirm('Bạn có muốn xóa bài viết này không?');"><i class="fa fa-trash"></i>Xóa</a></li>
				    </ul>
			  	</div>
			</td>
		</tr>
		@endfor
		@for($i=6;$i<=10;$i++)
		<tr>
			<td class="text-center">{{$i}}</td>
			<td>
				<div class="" style="float: left;margin-right: 10px">
					<img src="http://codetest.abc/images/avatar.png" class="img-circle" width="45px" height="45px" alt="User Image">
				</div>
				<div class=" text-info" style="float: left;margin-top: 3px">
					<a href="#"><span>Phương Anh Hoàng</span></a>
					<br>
					<a href="#"><span>phuonganhhoangvp98@gmail.com</span></a> - <a href="#"><span>0969080985</span></a>
				</div>
			</td>
			<td class="text-center"><span class="label label-info">123job</span></td>
			<td class="text-center">
				<span class="text-danger text-bold text-uppercase">| Rejected</span>
			</td>
			<td class="text-center">
				<div class="rateit_star1"  data-productid="{{$i}}"></div>
				<div class="count-star">
					<span class="label label-danger">
						0 / 5 star
					</span>
				</div>
			</td>
			<td class="text-center">{{$i}}</td>
		</tr>
		@endfor
		@for($i=11;$i<=15;$i++)
		<tr>
			<td class="text-center">{{$i}}</td>
			<td>
				<div class="" style="float: left;margin-right: 10px">
					<img src="http://codetest.abc/images/avatar.png" class="img-circle" width="45px" height="45px" alt="User Image">
				</div>
				<div class=" text-info" style="float: left;margin-top: 3px">
					<a href="#"><span>Phương Anh Hoàng</span></a>
					<br>
					<a href="#"><span>phuonganhhoangvp98@gmail.com</span></a> - <a href="#"><span>0969080985</span></a>
				</div>
			</td>
			<td class="text-center"><span class="label label-info">123job</span></td>
			<td class="text-center">
				<span class="text-success text-bold text-uppercase">| Hired</span>
			</td>
			<td class="text-center">
				<div class="rateit_star1"  data-productid="{{$i}}"></div>
				<div class="count-star">
					<span class="label label-danger">
						0 / 5 star
					</span>
				</div>
			</td>
			<td class="text-center">{{$i}}</td>
		</tr>
		@endfor
	</tbody>
</table>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tìm kiếm ứng viên</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">label</label>
                                <input type="text" class="input-handle" id="" placeholder="Input field">
                            </div><div class="form-group">
                                <label for="">label</label>
                                <input type="text" class="input-handle" id="" placeholder="Input field">
                            </div><div class="form-group">
                                <label for="">label</label>
                                <input type="text" class="input-handle" id="" placeholder="Input field">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">label</label>
                                <input type="text" class="input-handle" id="" placeholder="Input field">
                            </div><div class="form-group">
                                <label for="">label</label>
                                <input type="text" class="input-handle" id="" placeholder="Input field">
                            </div><div class="form-group">
                                <label for="">label</label>
                                <input type="text" class="input-handle" id="" placeholder="Input field">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Tìm ứng viên</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-handle')
	<script type="text/javascript">
	   $(function () {
	       $('.rateit_star1').rateit({min: 0, max: 5, step: 1});
	       $('.rateit_star1').bind('rated', function (e) {
	         var ri = $(this);
	         var value = ri.rateit('value');
	         var productID = ri.data('productid');
	         alert('Bạn đã đánh giá '+value +' sao cho ứng viên có id là : '+productID );
	         //không cho phép đánh giá,sau khi đã đánh giá xong
	         ri.rateit('readonly', true);
	     });
	   });
	</script>
@endsection
