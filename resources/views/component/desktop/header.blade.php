@if (\Request::is('search-job'))
<header id="header">
	<div class="menu-header">
		<div class="row no-gape">
			<div class="logo col-3">
				<a href="https://123job.vn" title="123job.vn">
					<img class="" src="uploads/logo.png" alt="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh" />
				</a>
			</div>
			<div class="col-6 no-padding">@include('component.desktop.search_job.form_search_header')</div>
			<div class="col-3">@include('component.desktop.profile')</div>
		</div>
	</div>
</header>
@else
<header id="header">
	<div class="menu-header">
		<div class="container">
			<div class="row no-gape position-relative">
				<div class="logo">
					<a href="https://123job.vn" title="123job.vn">
						<img class="" src="{{url('uploads/logo.png')}}" alt="123job.vn | Việc làm mới hiệu quả, Tìm việc làm mới nhanh" />
					</a>
				</div>
				@if (\Request::is('job-detail')) 
					@include('component.desktop.search_job.form_search_header')
				@elseif (\Request::is('bai-viet/*') || \Request::is('danh-muc/*'))
					<div class="menu-link-header">
						<a class="link-header-item active" href="https://123job.vn/bai-viet" title="Tin tức">Tin Tức <span class="sr-only">(current)</span></a>
						<a class="link-header-item" href="https://123job.vn/tuyen-dung" title="Tìm việc nhanh">Tìm Việc Nhanh</a>
					</div>
				@endif
					@include('component.desktop.profile')
			</div>
		</div>
	</div>
</header>
@endif