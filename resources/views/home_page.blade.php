<?php 
	require 'mobiledetect/mobiledetectlib/Mobile_Detect.php';
	$detect = new Mobile_Detect;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Tuyển Dụng, Tìm Kiếm Việc Làm Mới Lương Cao - 123Job.vn</title>
	@if($detect->isMobile())
		<style>
			<?php $style = file_get_contents('css/main_home_mobile.css');echo $style;?>
		</style>
	@else 
		<style>
			<?php $style = file_get_contents('css/main_home.css');echo $style;?>
		</style>
	@endif
	<link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
</head>
<body>
	@if($detect->isMobile())
		@include('component.mobile.header_mobile')
		@include('component.mobile.home_page.form_search_content_mobile')
		@include('component.mobile.home_page.career_category_mobile')
		<section id="main-content-job">
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="card" style="margin-bottom: 0 !important">
								<div class="card-title text-center">
									<h3 class="mb0 text-default">Việc Làm Mới Nhất</h3>
								</div>
								<div class="card-body">
									<div class="row">
											@include('component.mobile.job_box_mobile')
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-center mt10"> 
							<a class="btn btn-pink" href="https://123job.vn/tuyen-dung" style="margin-bottom: 90px;" rel="nofollow" title="Xem thêm việc làm mới nhất">Xem thêm việc làm</a> 
						</div>
					</div>
				</div>
			</div>
		</section>
		@include('component.mobile.job_favorite_box_mobile')
		@include('component.mobile.box_mobile_sidebar')
		@include('component.mobile.footer_mobile')
	@else 
		@include('component.desktop.header')
		<section id="banner" class="overlape"></i> 
			<i class="fa fa-times" id="close_form_search"></i>
			<div class="block no-padding" id="main-menu">
					<div class="row">
						<div class="col-lg-12">
							<div class="main-featured-sec">
								<div class="main-slider-sec text-arrows">
									<div class="slideHome active">
										<img src="/uploads/mslider2.jpg" alt="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh">
									</div>
								</div>
								<div class="job-search-sec">
									<div class="job-search">
										<h1>KÊNH TÌM VIỆC HIỆU QUẢ NHẤT 2018</h1>  
										<span class="input-keyword-home">Tìm việc nhanh có ngay chức danh, công ty bạn mơ ước</span>  
										<span class="input-address-home">Địa điểm việc làm</span> 



										@include('component.desktop.home_page.form_search_banner')



										<div class="home__search-extra">
											<div class="home__search-extra-candidate"> 
												<a href="https://123job.vn/cv/gioi-thieu-cv" title="tạo cv xin việc miễn phí"> Tạo CV của bạn </a> 
												<span> – </span>  
												<span>Chỉ mất vài giây thôi</span> 
											</div>
											<div class="home__search-extra-employer"> 
												<a href="https://123job.vn/nha-tuyen-dung/quan-ly-tin-dang" rel="nofollow" title="Đăng tin tuyển dụng hiệu quả"> Nhà tuyển dụng: Đăng việc làm </a>  
												<span> – </span>  
												<span>Tuyển dụng nhanh chóng, dễ dàng</span> 
											</div>
										</div>
									</div>
								</div>
								<div class="scroll-to"> 
									<a href="#scroll-here" rel="nofollow" title="123job.vn">
										<i class="la la-arrow-down"></i>
									</a> 
								</div>
							</div>
						</div>
					</div>
			</div>
		</section>
		<section id="scroll-here">
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-lg_mobile">
							<div class="heading">
								<h2>NGÀNH NGHỀ HOT NHẤT</h2> 
							</div>
							<div class="cat-sec cat-sec-desctop">
								<div class="row no-gape">
									
									@include('component.desktop.home_page.career_category_top')

								</div>
							</div>
							<div class="cat-sec cat-sec-desctop">
								<div class="row no-gape">

									@include('component.desktop.home_page.career_category_end')

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="main-content-job">
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading">
								<h2>VIỆC LÀM BẠN SẼ THÍCH</h2> 
							</div>
							<div class="tab__title mt-3 mb-3">
								<ul class="tab__title-list" role="tablist">
									<li class="tab__title-list-item text-center no-padding active">
										<a href="">
											<h3 class="no-padding no-margin">VIỆC LÀM TUYỂN GẤP</h3>
										</a>
									</li>
									<li class="tab__title-list-item text-center no-padding">
										<a href="">
											<h3 class="no-padding no-margin">VIỆC LÀM MỚI NHẤT</h3>
										</a>
									</li>
								</ul>
							</div>
							<div class="clear-both"></div>
							<div class="w-100 float-left">
								<div class="w-50 float-left">
									<div class="card d-flex">
										<div class="card-body">
											<div class="row">
												@include('component.desktop.home_page.job_box_home')
											</div>
										</div>
									</div>
								</div>
								<div class="w-50 float-left">
									<div class="card d-flex">
										<div class="card-body">
											<div class="row">
												@include('component.desktop.home_page.job_box_home')
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="job-list-link">
			<div class="container">
				<div class="job__category">
					<div class="w-50 float-left pl-2">
						<div class="job__category-list"> 
							<a href="" class="title">
								<h5>Việc làm theo ngành nghề</h5>
							</a>
							<div class="job__category-list-link">
								<div class="w-50 float-left">
									<ul class="list-group">
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Kế toán</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Ngân hàng</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm IT - Phần mềm</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm IT-Phần cứng/Mạng</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Xây dựng</a>
										</li>
									</ul>
								</div>
								<div class="w-50 float-left">
									<ul class="list-group last-group">
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Quảng cáo/Khuyến mãi/Đối ngoại</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Hàng không/Du lịch</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Giáo dục/Đào tạo</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Điện/Điện tử</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm Bán hàng</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="link-view-all">
							<a href="" class="text-info" title="Xem tất cả ngành nghề">Xem tất cả ngành nghề <i class="la la-arrow-right"></i>
	                        </a>
						</div>
					</div>
					<div class="w-50 float-left pl-2 ">
						<div class="job__category-list">
							<a href="" class="title">
								<h5>Việc làm tại</h5>
							</a>
							<div class="job__category-list-link">
								<div class="w-50 float-left">
									<ul class="list-group">
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Hồ Chí Minh</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Hà Nội</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Hải Phòng</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Đà Nẵng</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Cần Thơ</a>
										</li>
									</ul>
								</div>
								<div class="w-50 float-left">
									<ul class="list-group last-group">
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Bình Dương</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Đồng Nai</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Vĩnh Phúc</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Bắc Ninh</a>
										</li>
										<li class="list-group-item text-collapse w-100"><a href="">Việc làm tại Long An</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="link-view-all"> 
							<a href="" class="text-info" title="Xem tất cả khu vực">Xem tất cả khu vực <i class="la la-arrow-right"></i>
	                        </a>
						</div>
					</div>
				</div>
			</div>
		</section>
		@include('component.desktop.footer')
		<section class="popup-show">
		@include('component.desktop.popup_reg_sign.popup_main')
		</section>
	@endif
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	@if(!$detect->isMobile())
	<script>
		var cb = function () {
			var l = document.createElement('link');
			l.rel = "stylesheet";
			l.href = "css/full_home.css";
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
		});
	</script>
	<script src="{{asset('js/js-handle.js')}}" type="text/javascript"></script>
	@if(Session::has('success'))
		<script>
			var success = '{{Session::get("success")}}';
			alert(success);
		</script>
	@endif
</body>
</html>