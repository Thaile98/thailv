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
	<link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<style>
		body {
			font-size: 14px;
			/* background: black; */
			/* color: #fff; */
		}
		hr {
			border-top: 2px solid #ccc;
		}
		ul li {
			margin-bottom: 5px;
		}
		.margin-top-10 {
			margin-top: 15px;
		}
		h5 {
			font-size: 14px;
			/* font-weight: 600; */
		}
	</style>
</head>
<body>
	<div class="container">
		@foreach($data as $item) 
		<div class="row mb-5">
			<div class="col-6">{!!$item['content_root']!!}</div>
			<div class="col-6">{!!$item['content_transform']!!}</div>
		</div>
		<hr>
		@endforeach
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	</body>
</html>