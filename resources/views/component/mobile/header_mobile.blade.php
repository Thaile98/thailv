<div class="responsive_header" style="display: block">
	<div class="container">
		<div class="responsive_header-menubar d-flex justify-content-between align-content-center" id="menu-mobile-header">
			<div class="menubar_icon-top" id="item-left-show-sidebar"> <i class="fa fa-bars"></i> 
			</div>
			<div class="responsive_header-logo">
				<a href="https://123job.vn/tuyen-dung?q=&l=" title="Tìm Việc Làm Nhanh | Tuyển Dụng Hiệu quả | Viết CV Chuyên Nghiệp">
					<img src="https://123job.vn/images/logo/logo-mb.png" alt="">
				</a>
			</div>
			@if (\Request::is('search-job')) 
				<div class="menubar_icon-top"> <span id="mb_filter_search" class="js-filter-job"><i class="fa fa-filter"></i></span> 
				</div>
			@endif
		</div>
	</div>
</div>
@if (\Request::is('search-job')) 
<section id="mb_input_show">
	<div class="container">
		<div class="mb_input_show">
			<div class="mb_search"><i class="la la-search"></i> Tìm kiếm công việc, chức danh...</div>
		</div>
	</div>
</section>
<section class="overlape form_search_mobile" id="form_search_mobile" style="">
	<div id="close_form_search" style="display: block;"> <span class="btn-close-side-right"><i class="la la-close"></i></span> 
	</div>
	<div class="block no-padding" id="main-menu">
		<div data-velocity="-.1" style="" class="parallax scrolly-invisible no-parallax"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header wform" style="padding-top: 110px;">
						<div class="job-search-sec">
							<div class="job-search">
								@include('component.mobile.form_search_header_mobile')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
