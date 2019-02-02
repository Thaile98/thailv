<?php 
	require 'mobiledetect/mobiledetectlib/Mobile_Detect.php';
	$detect = new Mobile_Detect;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$category->cat_meta_title}} | 123Job.vn</title>
	<meta name="description" content="{{$category->cat_meta_description}}">
	<meta name="keywords" itemprop="keywords" content="{{$category->cat_meta_keyword}}">
	<meta name="language" content="vietnamese">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta itemprop="image" content="{{$category->cat_avatar}}">
	<meta property="og:image" content="{{$category->cat_avatar}}">
	<meta property="og:image:width" content="600">
	<meta property="og:image:height" content="315">
	<meta name="author" content="Tuyển Dụng, Việc Làm Mới Nhất 123job.vn">
	<meta http-equiv="content-language" content="vi">
	<meta name="GENERATOR" content="123job.vn">
	<meta name="copyright" content="Copyright © 2018 by 123job.vn">
	<meta property="og:description" content="{{$category->cat_meta_description}}">
	<meta property="og:locale" content="vi_VN">
	<meta property="og:title" itemprop="name" content="{{$category->cat_meta_title}} | 123Job.vn">
	<meta name="ROBOTS" content="INDEX, FOLLOW">
	<link rel="canonical" href="https://123job.vn/danh-muc/{{$category->cat_meta_title}}">
	<link rel="next" href="https://123job.vn/bai-viet?page=2" class="next-head">
	<title>Tuyển Dụng, Tìm Kiếm Việc Làm Mới Lương Cao - 123Job.vn</title>
	@if($detect->isMobile())
		<style>
			<?php $style = file_get_contents('css/main_posts_mobile.css');echo $style;?>
		</style>
	@else 
		<style>
			<?php $style = file_get_contents('css/main_posts.css');echo $style;?>
		</style>
	@endif
	<link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
</head>
<body>
	<div style="display: none">
		@inject('dateHelper','App\Core123\helper\DateHelper');
	</div>
	@if($detect->isMobile())
		@include('component.mobile.box_mobile_sidebar')
		@include('component.mobile.job_favorite_box_mobile')
		<div id="blog-content">
			@include('component.mobile.header_mobile')
			<div id="bc-maincontent">
				<div id="breadcrumb">
					<div class="container p-0">
						<nav aria-label="breadcrumb">
							<ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumb pl-0">
								<li class="" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
									<a itemprop="item" href="https://123job.vn/bai-viet/bi-quyet-viet-cv-xin-viec-5.html"> <span itemprop="name">Bí quyết viết cv xin việc</span> 
										<meta itemprop="position" content="0">
									</a>
								</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<h1 class="fs-28" style="margin-bottom: 20px"><b>Kênh thông tin tư vấn nghề nghiệp</b></h1> 
							<div class="bc-content list--blog-cv">
									@include('component.desktop.posts.bc_content_item')
								<div class="job__list-pagination">
									<ul class="pagination">
										<li class="disabled"><a rel="nofollow" class="isDisabled" href="javascript:void(0)"> Trang trước </a>
										</li>
										<li class="active"><a rel="nofollow" class="item" href="javascript:void(0)">1</a>
										</li>
										<li><a rel="nofollow" class="item" href="https://123job.vn/bai-viet?page=2">2</a>
										</li>
										<li><a rel="nofollow" class="item" href="https://123job.vn/bai-viet?page=3">3</a>
										</li>
										<li><a href="https://123job.vn/bai-viet?page=2" rel="nofollow"> Trang sau</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			@include('component.mobile.footer_mobile')
		</div>
	@else 
		<div id="blog-content">
			@include('component.desktop.header')
			<div id="bc-maincontent">
				<div id="breadcrumb">
					<div class="container p-0">
						<nav aria-label="breadcrumb">
							<ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumb pl-0">
								<li class="" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
									<a itemprop="item" href="https://123job.vn/bai-viet/bi-quyet-viet-cv-xin-viec-5.html"> <span itemprop="name">{{$category->cat_name}}</span> 
										<meta itemprop="position" content="0">
									</a>
								</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<h1 class="fs-28" style="margin-bottom: 20px"><b>Kênh thông tin tư vấn nghề nghiệp</b></h1> 
							<div class="bc-content list--blog-cv">
								@include('component.desktop.posts.bc_content_item')
								<div class="job__list-pagination">
									<ul class="pagination">
										<li class="disabled"><a rel="nofollow" class="isDisabled" href="javascript:void(0)"> Trang trước </a>
										</li>
										<li class="active"><a rel="nofollow" class="item" href="javascript:void(0)">1</a>
										</li>
										<li><a rel="nofollow" class="item" href="https://123job.vn/bai-viet?page=2">2</a>
										</li>
										<li><a rel="nofollow" class="item" href="https://123job.vn/bai-viet?page=3">3</a>
										</li>
										<li><a href="https://123job.vn/bai-viet?page=2" rel="nofollow"> Trang sau</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="bc-sidebar">
								<div class="bc-sidebar-title">
									<h4>Bài viết được xem nhiều nhất</h4>
								</div>
								<div class="bc-box-job">
									@include('component.desktop.posts.bc_box_best_post_item')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('component.desktop.footer')
		</div>
	@endif
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	@if(!$detect->isMobile())
	<script>
		var cb = function () {
			var l = document.createElement('link');
			l.rel = "stylesheet";
			l.href = "{{url('css/full_posts.css')}}";
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
	<script src="{{url('js/jquery.lazyload.js')}}" type="text/javascript" charset="utf-8" async defer></script>
	<script>
		window.addEventListener("load",function(event){
			$(function() {
	            $("img.lazy").lazyload();
	        });
		});
	</script>
</body>
</html>