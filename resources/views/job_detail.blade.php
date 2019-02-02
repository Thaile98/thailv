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
	@if($detect->isMobile())
		<style>
			<?php $style = file_get_contents('css/main_job_detail_mobile.css');echo $style;?>
		</style>
	@else 
		<style>
			<?php $style = file_get_contents('css/main_job_detail.css');echo $style;?>
		</style>
	@endif
</head>
<body>
	@if($detect->isMobile())
	<section id="job_detail">
		<div class="job_detail">
			<div class="job-header d-flex justify-content-between"> <span class="job-header-logo"> <a href="/" title="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh"><img src="https://123job.vn/images/logo/logo.png" alt=""></a> </span>  <a href="https://123job.vn/tuyen-dung" class="btn btn-pink btn-sm self-center"><i class="la la-search"></i> Tìm việc</a> 
			</div>
			<div class="card">
				<div class="card-body">
					<div class="w-100 job-head fix_title_detail_hide">
						<h4 class="js-jf-title"> <a href="https://123job.vn/viec-lam/hn5-baolong-telesales-bao-hiem-bao-long-lien-ket-viettel-2mrEQYlzra">[Hn5-Baolong] Telesales Bảo Hiểm Bảo Long - Liên Kết Viettel</a> </h4>  <span class="job-detail--icon js-jf-address mt10" style="display: block"><b>Địa điểm:</b> Hà Nội </span> 
						<div class="job-detail--icon mt10"><b>Mức lương:</b>  <span class="js-jf-salary"> 5 - 7 Triệu</span> 
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="card" style="padding: 0 10px !important;">
				<div class="card-body">
					<div class="card-title text-default">Thông tin cơ bản</div>
					<div class="card__box">
						<p><b>Hạn nộp: </b>30/09/2018</p>
						<p><b>Cấp bậc: </b>nhân viên</p>
						<p><b>Kinh nghiệm: </b>Chưa có</p>
						<p><b>Bằng cấp: </b>Trung Học</p>
						<p><b>Ngành nghề: </b>  <span>Chăm sóc khách hàng, </span><span>Tư vấn bảo hiểm, </span><span>Bán hàng</span> 
						</p>
					</div>
					<div class="clear-both"></div>
					<div class="card-title text-default">Mô tả công việc</div>
					<div class="card__box card__box-content" data-title="Xem toàn bộ mô tả công việc">
						<div class="">
							<ul class="">
								<li>- Thực hiệc các cuộc gọi tới khách hàng cũ và khách hàng tiềm năng (theo database được Công ty cung cấp) để tư vấn, giới thiệu về sản phẩm. Mục tiêu sau cùng là bán được sản phẩm cho KH và hoàn thiện các hợp đồng theo yêu cầu tính toán doanh số của dự án.
									<br>- CSKH, tiếp nhận và xử lý những thắc mắc của khách hàng về sản phẩm và dịch vụ qua điện thoại.&nbsp;
									<br>- Thực hiện các cuộc gọi tới khách hàng để tư vấn và giới thiệu theo chiến dịch khi có các ưu đãi hoặc chính sách mới.&nbsp;
									<br>***Nơi làm việc: Số 1A Vũ Phạm Hàm, Trung Kính, HN
									<br>***Thời gian làm việc: Làm theo giờ Hành Chính từ Thứ 2 đến Thứ 7</li>
							</ul>
						</div>
					</div>
					<div class="card-title text-default">Yêu cầu ứng viên</div>
					<div class="card__box card__box-content" data-title="Xem toàn bộ Yêu cầu ứng viên">
						<div class="">
							<ul class="">
								<li>- Nam/Nữ tuổi từ 20 – 30.&nbsp;
									<br>- Đã tốt nghiệp hoặc đang trong thời gian thực tập tại các trường từ Trung cấp trở lên.&nbsp;
									<br>- Ưu tiên các những ứng viên đã có thời gian làm Telesales và có kinh nghiệm làm việc trong lĩnh vực Tài chính, Bảo hiểm…
									<br>- Giọng nói truyền cảm, không nói ngọng, nói lắp, không nói giọng địa phương.
									<br>- Kỹ năng giao tiếp và xử lý thông tin tốt.
									<br>- Kỹ năng thuyết phục và chốt giao dịch tốt.
									<br>- Có tinh thần cầu tiến trong công việc.</li>
							</ul>
						</div>
					</div>
					<div class="card-title text-default">Quyền lợi</div>
					<div class="card__box card__box-content" data-title="Xem toàn bộ Quyền lợi">
						<div class="">
							<ul class="">
								<li>- Thu nhập = Lương cơ bản [4 triệu- 5 triệu] +%Thưởng doanh số
									<br>- Tổng thu nhập từ 5 triệu - 7 triệu.
									<br>- Được làm việc trong môi trường chuyên nghiệp, năng động, trọng dụng nhân tài và có cơ hội thăng tiến cao.
									<br>- Được đào tạo về kỹ năng và nghiệp vụ để tạo sự phát triển cá nhân.
									<br>- Thường xuyên được tham gia các hoạt động ngoại khóa và sinh hoạt văn hóa, tinh thần do công ty tổ chức.&nbsp;
									<br>- Xét nâng lương và tính thưởng theo cơ chế của công ty và Luật lao động.
									<br>- Cơ chế và chế độ đẩy đủ theo quy định của Nhà Nước khi ký Hợp đồng chính thức.</li>
							</ul>
						</div>
					</div>
					<div class="card-title text-default">Thông tin liên hệ</div>
					<div class="card__box">
						<p><b>Người liên hệ:</b> Công Ty Cp Bellsystem24-Hoa Sao</p>
						<p> <b>Địa chỉ công ty:</b> Tầng 3- Tòa nhà Trung Yên 1 - Số 1 Vũ Phạm Hàm - Yên Hòa - Cầu Giấy - Hà Nội</p>
						<p><b>Hạn nộp hồ sơ:</b> 30.09.2018</p>
						<p> <b>Ngôn ngữ hồ sơ:</b> Bất kỳ</p>
					</div>
					<div class="card-title">Yêu cầu hồ sơ</div>
					<div class="card__box">
						<p>Không yêu cầu</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="card" style="padding: 0 10px 20px !important;">
				<div class="card-body">
					<div class="card-title">VIỆC LÀM ĐỀ XUẤT BẠN SẼ THÍCH</div>
					<div class="row mb145">
						<div class="col-md-12">
							@include('component.mobile.job_box_mobile')
						</div>
					</div>
				</div>
			</div>
			<div class="job-back"> 
				<a class="bg-pink" href="https://123job.vn/tuyen-dung" rel="nofollow" title="tìm kiếm">
					<i class="la la-search"></i>
				</a>  
				<a class="bg-blue-dark" href="https://123job.vn/nguoi-tim-viec/dang-nhap" title="trang chủ">
					<i class="la la-user"></i>
				</a> 
			</div>
			<div class="job-action d-flex">
				<a class="btn btn-pink mb10 js-apply-provider" href="https://viectotnhat.com/tuyen-hn5-baolong-telesales-bao-hiem-bao-long-lien-ket-viettel-ha-noi-1121513.html" rel="nofollow" target="_blank" data-is-user="0" data-url-modal="https://123job.vn/ajax/show-modal-recruitment" data-hash-slug="2mrEQYlzra" data-cv="0"> 
					<i class="fa fa-paper-plane text-xs"></i> Ứng tuyển ngay
				</a> 
				<a class="btn btn-dark ml0 mb10 js-jf-desktop-save" data-hash-slug="2mrEQYlzra">
					<i class="la la-heart-o"></i> <span>Lưu việc làm</span>
				</a> 
			</div>
		</div>
	</section>
	@else 
		@include('component.desktop.header')
		<div id="fixed_top">
			<div class="container">
				<div class="row">
					<div class="fixed_top_job-title col-8">
						<h1>Entry Level Customer Service Representative - Full Time</h1>
						<p>
							<span><strong>CÔNG TY TNHH SEICHO</strong></span>
							<span> - </span>
							<span><strong>Hồ Chí Minh</strong></span>
						</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<section id="content">
			<div class="block no-padding">
				<div class="container">
					<div class="row">
						<div class="content-left col-8">
							<div class="job_detail">
								<div class="job_detail_item" id="title">
									<h1 class="job_detail-title">Entry Level Customer Service Representative - Full Time</h1>
									<a href="" class="job_detail-company-name"><span><strong>CÔNG TY TNHH SEICHO</strong></span></a>
									<span> - </span>
									<span><strong>Hồ Chí Minh</strong></span>
								</div>
								<div class="job_detail_item mt-3">
									<div class="job_detail_item-crit">
										<p>Mức lương</p>
										<p>Kinh nghiệm</p>
										<p>Hạn nộp hồ sơ</p>
										<p>Ngành nghề</p>
									</div>
									<div class="job_detail_item-param">
										<p>10 - 14 triệu</p>
										<p>2 năm</p>
										<p>19/09/2018</p>
										<p>
											<a href="" class="underline-hover">Nhân viên kinh doanh</a>, 
											<a href="" class="underline-hover">Kế toán kiểm toán</a>, 
											<a href="" class="underline-hover">Lập trình viên</a>
										</p>
									</div>
								</div>
								<div class="job_detail_item job_detail-description">
									<p>
										<strong>MÔ TẢ CÔNG VIỆC</strong>
									</p>
									<div>
										<p>1. Phụ trách các kênh truyền thông của VNP group (HCM): Fanpage, bảng tin, …</p>
										<p>2. Lên kế hoạch truyền thông phù hợp yêu cầu xây dựng văn hóa doanh nghiệp</p>
										<p>3. Phụ trách biên tập các ấn phẩm nội bộ, các tài liệu, hướng dẫn truyền thông nhằm gia tăng tinh thần tự hào, nâng cao kiến thức về nhận diện, phát triển thương hiệu cho nhân viên và giao tiếp với khách hàng, cộng đồng</p>
										<p>4. Lên ý tưởng xây dựng, tổ chức các event nội bộ, các hoạt động tập thể nhằm tạo sự gắn kết trong tập thể cán bộ nhân viên</p>
										<p>5. Tham gia tổ chức các sự kiện truyền thông của công ty, các hoạt động từ thiện xã hội và tham gia các hoạt động </p>
									</div>
								</div>
								<div class="job_detail_item job_detail-profile-require">
									<p>
										<strong>YÊU CẦU HỒ SƠ</strong>
									</p>
									<div>
										<p>Kỹ năng và Năng lực chuyên môn cần có:</p>
										<p>- Sử dụng internet và phần mềm máy tính thành thạo</p>
										<p>- Tinh tế, trách nhiệm, sáng tạo, hợp tác</p>
										<p>- Có khả năng làm việc độc lập và theo nhóm tốt, siêng năng, yêu thích công việc truyền thông.</p>
										<p>- Ngoại hình dễ nhìn, tác phong nhanh nhẹn.</p>
										<p>- Có khả năng làm MC, hoạt náo.</p>
										<p>Ưu tiên sinh viên từng tham gia các hoạt động ngoại khoá tại Hội sinh viên, đoàn thanh niên các trường Đại học</p>
										<p>Có khả năng xây dựng kế hoạch truyền thông;</p>
									</div>
								</div>
								<div class="job_detail_item job_detail-contact">
									<p>
										<strong>THÔNG TIN LIÊN HỆ</strong>
									</p>
									<div>
										<p><span>Người liên hệ: Nguyễn Văn Hưng</span></p>
										<p><span>Ngôn ngữ hồ sơ: Tiếng Anh / Tiếng Việt</span></p>
									</div>
								</div>
							</div>
							<div class="apply_job">
								<p>Bạn vui lòng click nút "Ứng tuyển ngay" bên dưới để nộp hồ sơ và ghi rõ vị trí ứng tuyển</p>
								<div class="apply_job-btn text-center">
									<button class="btn btn-pink"><i class="la la-paper-plane"></i> Ứng tuyển ngay</button>
									<button class="btn btn-white"><i class="la la-paper-plane"></i> Xem hoặc nộp đơn việc làm</button>
								</div>
							</div>
							<div class="more_job">
								<p>Xem thêm: 
									<a href="" class="underline-hover">Nhân viên lập trình</a>, 
									<a href="" class="underline-hover">Nhân viên kế toán kho</a>, 
									<a href="" class="underline-hover">Nhân viên bán thời gian</a>, 
									<a href="" class="underline-hover">Nhân viên kế toán</a>
								</p>
							</div>
							<div class="share_job">
								<div>
									<span class="share_job-label">Chia sẻ tin tuyển dụng đến bạn bè: </span>
									<div class="share_job-group">
										<a href="" style="background: #067E97;"><i class="fa fa-chain"></i></a>
										<a href="" style="background: #3A559F;"><i class="fa fa-facebook"></i></a>
										<a href="" style="background: #0077B5;"><i class="fa fa-linkedin"></i></a>
										<a href="" style="background: #28AAE1;"><i class="fa fa-twitter"></i></a>
										<a href="" style="background: #188EE8;"><i class="la la-envelope"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="content-right col-4">
							<div class="job_company">
								<div class="job_company-info">
									<div class="company-logo">
										<a href=""><img class="lazy" data-original="/uploads/company_default.png" src="/uploads/giphy.gif" alt="logo"></a>
									</div>
									<p class="text-justify" style="line-height: 1.7">
										Công ty TNHH Thiết bị Tự Động hóa Toàn Cầu chuyên cung cấp: • Cung cấp tủ bơm, lắp đặt phòng bơm, hệ thống bơm tăng áp... r> • Tủ điện phân phối Công Nghiệp: Nhà máy, Xí nghiệp, Khu công nghiệp, Khu đô thị… • Tủ điện phân phối trong Tòa Nhà: Trung tâm thương mại, Chung cư, Khách sạn, hộ gia đình.. • Tủ điều khiển hệ thống xử lý nước thải, hệ thống xử lý nước sạch. • Tủ điều khiển hệ thống ...
									</p>
									<p>
										<span>
											<strong>Địa chỉ: </strong>Liền kề 4 - vị trí 34 - Khu đô thị Đại Thanh - Thanh Trì - Hà Nội (Cách ngã tư Sở 6km)
										</span>
									</p>
									<p>
										<span>
											<strong>Website: </strong>http://codientoancau.com/
										</span>
									</p>
									<p>
										<span>
											<strong>Quy mô công ty: </strong>10 - 24 nhân sự
										</span>
									</p>
								</div>
							</div>
							@include('component.desktop.job_detail.job_suggest')
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
				l.href = "css/full_job_detail.css";
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
	@if($detect->isMobile())
	<script>
		window.addEventListener("load",function(event){
			$(function() {
	            $("img.lazy").lazyload();
	        });
        	$(window).bind("scroll", function () {
    			$(window).scrollTop() > 55 ? $(".job-head").removeClass("fix_title_detail_hide").addClass("fix_title_detail") : $(".job-head").removeClass("fix_title_detail").addClass("fix_title_detail_hide");
        	});
		})
	</script>
	@else
	<script>
		window.addEventListener("load",function(event){
			$(function() {
	            $("img.lazy").lazyload();
	        });
        	$(window).bind("scroll", function () {
    			$(window).scrollTop() > $("#title").offset().top ? $("#fixed_top").addClass("fixed-menu").addClass("display_block") : $("#fixed_top").removeClass("fixed-menu").removeClass("display_block");
        	});
		})
	</script>
	@endif
</html>