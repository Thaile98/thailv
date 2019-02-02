<?php 
	require 'mobiledetect/mobiledetectlib/Mobile_Detect.php';
	$detect = new Mobile_Detect;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="543ifUyf0LF7dibEzBsmbTMpQRg8mwm7brd5pD9j">
	<title>Tuyển Dụng, Tìm Kiếm Việc Làm Mới Lương Cao - 123Job.vn</title>
	@if($detect->isMobile())
		<style>
			<?php $style = file_get_contents('css/main_search_job_mobile.css');echo $style;?>
		</style>
	@else 
		<style>
			<?php $style = file_get_contents('css/main_search_job.css');echo $style;?>
		</style>
	@endif
	<link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
</head>
<body>
	@if($detect->isMobile())
		@include('component.mobile.header_mobile')
		<section id="search-job">
			<div class="block">
				<div class="container">
					<div class="row no-gape">
						<div class="search__job-listing column p-0">
							<div class="job__list-total-select">
								<div class="total__select-filterbar">
									<h5>Việc <b>1</b> - <b>15</b> trong <b>245433</b></h5>
									<div class="filterbar-right"><a class="active_nav" title="Tất cả việc làm" rel="nofollow" href="https://123job.vn/tuyen-dung?l=&amp;q=">Tất cả</a> | <a class="" title="Việc làm mới" rel="nofollow" href="http://123job.vn/tuyen-dung?l=&amp;q=&amp;since=lv">Việc làm mới</a>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row">
										@include( 'component.mobile.job_box_mobile')
									</div>
								</div>
								<div class="pagination">
									<ul class="pagi_mobile">
										<li class="disabled">
											<a href="/tuyen-dung?source=search&amp;page=1" rel="prev"> <i class="la la-long-arrow-left"></i> Trang trước</a>
										</li>
										<li class=""> <a href="/tuyen-dung?source=search&amp;page=2" rel="next"> Trang sau <i class="la la-long-arrow-right"></i> </a> 
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		@include('component.mobile.job_favorite_box_mobile')
		@include('component.mobile.box_mobile_sidebar')
		@include('component.mobile.box_mobile_side_right')
		@include('component.mobile.footer_mobile')
	@else 
		@include('component.desktop.header')
		<section id="search-job">
			<div class="block">
				<div class="row no-gape">
					<div class="search__job-aside col-3">
						<div class="search__hitory">
							<div class="search__hitory-heading">
								<span class="">Tìm kiếm của bạn</span>
								<span class="">-</span>
								<a href="">Xóa</a>
							</div>
							<ul class="search__hitory-list">
								<li class="search__hitory-list-item"><a href="">Nhân Viên Bán Hàng</a> - <span class="count">73.521 mới</span>
								</li>
								<li class="search__hitory-list-item"><a href="">Nhân Viên Kinh Doanh</a> - <span class="count">76.973 mới</span>
								</li>
								<li class="search__hitory-list-item"><a href="">tất cả việc làm</a> - <span class="count">132.353 mới</span>
								</li>
							</ul>
						</div>
						@include('component.desktop.search_job.aside_widget')
					</div>
					<div class="search__job-listing col-6 column">
						<!-- <div class="job__list-intro-cv pl-2">
							<div> <strong><i class="la la-star"></i> VIẾT CV NGAY - NHẬN VIỆC LIỀN TAY</strong>
								<a href="/cv/gioi-thieu-cv" rel="nofollow" class="job__list-intro-cv-link btn btn-pink"> <i class="la la-plus"></i> TẠO CV MIỄN PHÍ </a>
							</div>
						</div> -->
						<div class="job__list-total-select pl-2">
							<div class="job-search-title">
								<h1>VIỆC LÀM NHÂN VIÊN KINH DOANH</h1>
							</div>
							<div class="total__select-filterbar">
								<h5>Hiển thị <b>1</b> - <b>15</b> trên <b>245433</b> việc</h5>
								<div class="filterbar-right"> <span class="show-text-alert"> Lọc: </span>  <a class="active_nav" title="Tất cả việc làm" rel="nofollow" href="https://123job.vn/tuyen-dung?l=&amp;q=">Tất cả</a><b> |</b>  <a class="" title="Việc làm mới" rel="nofollow" href="http://123job.vn/tuyen-dung?l=&amp;q=&amp;since=lv">Việc làm mới</a>
								</div>
							</div>	
						</div>
						<div class="job__list">
							
							@foreach($jobs as $job)
								@include( 'component.desktop.search_job.job_list_item')
							@endforeach

						</div>
						<div class="job__list-pagination">
							<ul class="pagination">
								<li class="disabled"><a rel="nofollow" class="isDisabled" href="javascript:void(0)"> Trang trước </a>
								</li>
								<li class="active"><a rel="nofollow" class="item" href="javascript:void(0)">1</a>
								</li>
								<li><a rel="nofollow" class="item" href="/search-job?page=2">2</a>
								</li>
								<li><a rel="nofollow" class="item" href="/search-job?page=3">3</a>
								</li>
								<li><a rel="nofollow" class="item" href="/search-job?page=4">4</a>
								</li>
								<li><a rel="nofollow" class="item" href="/search-job?page=5">5</a>
								</li>
								<li><a href="/search-job?page=2" rel="nofollow"> Trang sau</a>
								</li>
							</ul>
						</div>
						<div class="job__list-box-email float-left d-flex justify-content-center w-100">
							<div class="box__email" style="width: 65%">
								<h5>Tạo thông báo việc làm</h5>
								<p><span>Tuyển dụng, tìm việc làm tại bất cứ đâu</span></p>
								<form class="form-inline">
									<p class="text-error w-100"><span>Email đã đăng ký nhận tìm kiếm này</span></p>
									<div class="form-group w-75 pr-2">
										<input type="email" class="form-control w-100" name="" id="" placeholder="lethaivp98@gmail.com">
									</div>
									<button type="submit" class="btn w-25 m-0 p-1"><i class="fa fa-envelope-o"></i> Kích Hoạt</button>
									<p><span>Bạn có thể hủy thông báo bất cứ lúc nào</span></p>
								</form>
							</div>
						</div>
					</div>
					<div class="col-3" style="max-width: 25%">
						<div class="box__email">
							<h5>Tạo thông báo việc làm</h5>
							<p><span>Tuyển dụng, tìm việc làm tại bất cứ đâu</span></p>
							<form class="form-inline">
								<p class="text-error w-100"><span>Email đã đăng ký nhận tìm kiếm này</span></p>
								<div class="form-group w-100">
									<input type="email" class="form-control w-100" name="" id="" placeholder="lethaivp98@gmail.com">
								</div>
								<p><span>Bạn có thể hủy thông báo bất cứ lúc nào</span></p>
								<button type="submit" class="btn w-100 m-0 p-1"><i class="fa fa-envelope-o"></i> Kích Hoạt</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		@include('component.desktop.footer')
	@endif
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	@if(!$detect->isMobile())
	<script>
		var cb = function () {
			var l = document.createElement('link');
			l.rel = "stylesheet";
			l.href = "css/full_search_job.css";
			var h = document.getElementsByTagName('body')[0];
			h.append(l);
		};
		var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
		if (raf) {
			raf(cb);
		} else {
			window.addEventListener('load', cb);
		}
	</script>
	@endif
	<script src="js/jquery.lazyload.js" type="text/javascript" charset="utf-8" async defer></script>
	<script>
		window.addEventListener("load",function(event){
			$(function() {
	            $("img.lazy").lazyload();
	        });
		})
	</script>
</html>
