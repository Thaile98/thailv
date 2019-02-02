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
	<title>{{$article->art_meta_title}} | 123Job.vn</title>
	<meta name="description" content="{{$article->art_meta_description}}">
	<meta name="keywords" itemprop="keywords" content="{{$article->art_meta_keyword}}">
	<meta name="language" content="vietnamese">
	<meta name="author" content="Tuyển Dụng, Việc Làm Mới Nhất 123job.vn">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta itemprop="image" content="{{$article->art_avatar}}">
	<meta property="og:image" content="{{$article->art_avatar}}">
	<meta property="og:image:width" content="600">
	<meta property="og:image:height" content="315">
	<meta http-equiv="content-language" content="vi">
	<meta name="GENERATOR" content="123job.vn">
	<meta name="copyright" content="Copyright © 2018 by 123job.vn">
	<meta property="og:locale" content="vi_VN">
	<meta property="og:title" itemprop="name" content="{{$article->art_meta_title}}">
	<meta property="og:description" content="{{$article->art_meta_description}}">
	<meta name="ROBOTS" content="INDEX, FOLLOW">
	<link rel="canonical" href="{{url()->current()}}">
	<link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
	@if($detect->isMobile())
		<style>
			<?php 
				$css = "css/main_post_detail_mobile.css";
				$style = file_get_contents($css);
				echo $style;
			?>
		</style>
	@else 
		<style>
			<?php 
				$css = "css/main_post_detail.css";
				$style = file_get_contents($css);
				echo $style;
			?>
		</style>
	@endif
</head>
<body>
	<div style="display: none">
		@inject('dateHelper','App\Core123\helper\DateHelper');
	</div>
	@if($detect->isMobile())
		<div class="box--action-mobile">
			<div class="box__icon-share"> 
				<a href="javascript:;void(0)" target="_blank" rel="nofollow" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://123job.vn/bai-viet/cach-viet-cv-xin-viec-bang-tieng-trung-gay-an-tuong-voi-nha-tuyen-dung-72.html')" class="btn-facebook box--btn">
					<i class="fa fa-facebook"></i>
				</a>  
				<a href="javascript:;void(0)" target="_blank" rel="nofollow" onclick="window.open('https://plus.google.com/share?url=https://123job.vn/bai-viet/cach-viet-cv-xin-viec-bang-tieng-trung-gay-an-tuong-voi-nha-tuyen-dung-72.html')" class="btn-gooogle box--btn">
					<i class="fa fa-google-plus"></i>
				</a> 
			</div>
		</div>
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
						<div class="col-sm-12">
							<nav class="breadcrumb__menu">
								<ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item"> <a itemtype="http://schema.org/Thing" itemprop="item" href="/" title="Trang chủ"><span itemprop="name"> Trang chủ </span> </a> 
										<meta itemprop="position" content="1">
									</li>
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item "> <a itemtype="http://schema.org/Thing" itemprop="item" href="https://123job.vn/bai-viet" title="Bài viết"><span itemprop="name"> Bài viết </span> </a> 
										<meta itemprop="position" content="2">
									</li>
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item ">
										<a href="https://123job.vn/bai-viet/bi-quyet-viet-cv-xin-viec-5.html" title="Bí quyết viết cv xin việc" itemtype="http://schema.org/Thing" itemprop="item"> <span itemprop="name">Bí quyết viết cv xin việc</span> 
										</a>
										<meta itemprop="position" content="3">
									</li>
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item active" title="Cách viết CV xin việc bằng tiếng Trung gây ấn tượng với nhà tuyển dụng"> <a itemprop="name" href="https://123job.vn/bai-viet/bi-quyet-viet-cv-xin-viec-72.html" title="Cách viết CV xin việc bằng tiếng Trung gây ấn tượng với nhà tuyển dụng">Cách viết CV xin việc bằng tiếng Trung gây ấn tượng với nhà tuyển dụng</a> 
										<meta itemprop="position" content="4">
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-sm-8">
							@include('component.desktop.post_detail.post_detail_content')
						</div>
						<div class="col-sm-4">
							<div class="bc-sidebar">
								<div class="bc-sidebar-title">
									<h4>Việc làm mới</h4>
								</div>
								<div class="bc-box-job">
									@include('component.desktop.posts.bc_box_new_job_item')
								</div>
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
									<a itemprop="item" href="https://123job.vn/bai-viet/bi-quyet-viet-cv-xin-viec-5.html">
										<span itemprop="name">{{$article->category->cat_name}}</span> 
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
								@include('component.desktop.post_detail.post_detail_content')
						</div>
						<div class="col-sm-4">
							<div class="bc-sidebar">
								<div class="bc-sidebar-title">
									<h4>Bài viết được xem nhiều nhất</h4>
								</div>
								<div class="bc-box-job">
									@include('component.desktop.posts.bc_box_new_job_item')
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
			l.href = "{{url('css/full_post_detail.css')}}";
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
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=389771091427443&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
