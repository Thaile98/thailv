<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Tuyển Dụng, Tìm Kiếm Việc Làm Mới Lương Cao - 123Job.vn</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<section id="page-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 m-auto">
					<div class="page-login__logo d-flex justify-content-center">
						<a href="https://123job.vn" title="123job.vn">
							<img width="100px" class="" src="uploads/logo.png" alt="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh" />
						</a>
					</div>
					<div class="page-form">
						@include('form_page_login')
					</div>
					<div class="page-form">
						@include('form_page_register')
					</div>
					<div class="page-form">
						@include('form_page_forgot_password')
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>