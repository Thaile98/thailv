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
			<?php $style = file_get_contents('css/main_post_detail_mobile.css');echo $style;?>
		</style>
	@else 
		<style>
			<?php $style = file_get_contents('css/main_post_detail.css');echo $style;?>
		</style>
	@endif
	<link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
</head>
<body>
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
						<div class="share"> 
							<span>Chia sẻ</span>  
							<a href="#" rel="nofollow" title="chia sẻ facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://123job.vn/bai-viet/cach-viet-cv-xin-viec-bang-tieng-trung-gay-an-tuong-voi-nha-tuyen-dung-72.html')" class="btn-facebook">
								<i class="fa fa-facebook"></i>
							</a>  
							<a href="#" rel="nofollow" title="chia sẻ google + " onclick="window.open('https://plus.google.com/share?url=https://123job.vn/bai-viet/cach-viet-cv-xin-viec-bang-tieng-trung-gay-an-tuong-voi-nha-tuyen-dung-72.html')" class="btn-gooogle">
								<i class="fa fa-google-plus"></i>
							</a>  
							<a href="javascript:;void(0)" id="share--comment" class="btn-comment" rel="nofollow" title="bình luận">
								<i class="fa fa-comment"></i>
							</a> 
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
			@include('component.desktop.footer')
		</div>
	@endif
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	@if(!$detect->isMobile())
	<script>
		var cb = function () {
			var l = document.createElement('link');
			l.rel = "stylesheet";
			l.href = "css/full_post_detail.css";
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
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=389771091427443&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>