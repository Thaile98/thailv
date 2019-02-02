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
	<style>
		.form-page-login {
			background: #FFFFFF;
	box-shadow: 0px 5px 16px rgba(102, 102, 102, 0.2);
	border-radius: 10px;
	padding: 30px 35px;
	margin-bottom: 10px
		}
	</style>
</head>
<body>
	


	<section id="page-login" style="margin-top: 40px">
		<div class="container">
			<div class="row">
				<div class="col-lg-5" style="margin: 0 auto">
					<div class="d-flex justify-content-center" style="margin-bottom: 10px;background: #383d74;padding: 10px 0">
						<div class="logo-page-login">
							<a href="https://123job.vn" title="123job.vn">
								<img style="width: 100px" class="" src="uploads/logo.png" alt="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh" />
							</a>
						</div>
					</div>
					<div class="form-page-login">
						@include('component.desktop.page_login_regis_forgot.form_page_login')
					</div>
					<div class="form-page-login">
						@include('component.desktop.page_login_regis_forgot.form_page_register')
					</div>
					<div class="form-page-login">
						@include('component.desktop.page_login_regis_forgot.form_page_forgot_password')
					</div>
				</div>
			</div>
		</div>
	</section>










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