<div class="profile__header">
	<div class="profile__header-btn-dropdown flex "> 
		<span> 
			<i class="la la-angle-down"></i> 
		</span>
	</div>
	@if (Auth::guard('candidates')->check())
	<div class="profile__header-btn-dropdown"> 
		<span> 
			<img class="lazy" data-original="{{url('uploads/none-user.jpg')}}" src="{{url('uploads/giphy.gif')}}" onerror=" this.src='/images/none-user.jpg'" alt="{{Auth::guard('candidates')->user()->name}}">&nbsp;
			<span class="profile_header-user-name">{{Auth::guard('candidates')->user()->name}}</span> 
		</span>
		<ul>
			<li>
				<a href="https://123job.vn/nguoi-tim-viec/tong-quan"><i class="la la-area-chart"></i> Trang tổng quan </a>
			</li>
			<li>
				<a href="https://123job.vn/cv/sample"><i class="la la-edit"></i> Tạo CV </a>
			</li>
			<li>
				<a href="https://123job.vn/cv/my"><i class="la la-list-ul"></i> Quản lý CV </a>
			</li>
			<li>
				<a href="https://123job.vn/nguoi-tim-viec/tai-khoan"><i class="la la-user"></i> Chi tiết về bạn </a>
			</li>
			<li>
				<a href="https://123job.vn/nguoi-tim-viec/cong-viec-hoc-van"><i class="la la-graduation-cap"></i> Công việc và học vấn </a>
			</li>
			<li>
				<a href="https://123job.vn/nguoi-tim-viec/thay-doi-mat-khau"><i class="la la-lock"></i> Thay đổi mật khẩu </a>
			</li>
			<li>
				<a href="{{route('get.candidate.logout')}}"><i class="la la-sign-out"></i> Đăng xuất </a>
			</li>
		</ul>
	</div>
	<div class="wishlist__dropsec"> 
		<span class="favorite">
			<i class="la la-heart"></i>
			<strong class="js-jf-count">0</strong>
		</span>&nbsp;
		<div class="wishlist__dropsec-dropdown">
			<ul class="scrollbar">
				<li class="li-Qg9doKddDk">
					<div class="fav-title"> 
						<a href="https://123job.vn/viec-lam/tu-van-tuyen-sinh-Qg9doKddDk" title="">Tư vấn tuyển sinh</a>
						<span class="button-fav-del js-jf-home-delete" data-hash-slug="Qg9doKddDk">
							<i class="la la-close"></i>
						</span>
					</div>
					<div class="fav-sa"> 
						<span class="fav-salary">
							<i class="la la-money"></i> 6 - 8 Triệu
						</span>
						<span class="fav-address">
							<i class="la la-map-marker"></i> Hồ Chí Minh
						</span>
					</div>
				</li>
				<li class="li-b3qZ0VGv94">
					<div class="fav-title"> 
						<a href="https://123job.vn/viec-lam/lai-xe-taxi-group-chap-nhan-lai-moi-b3qZ0VGv94" title="">Lái xe Taxi Group-Chấp nhận lái mới</a>
						<span class="button-fav-del js-jf-home-delete" data-hash-slug="b3qZ0VGv94">
							<i class="la la-close"></i>
						</span>
					</div>
					<div class="fav-sa"> 
						<span class="fav-salary">
							<i class="la la-money"></i> 10 - 15 Triệu
						</span>
						<span class="fav-address">
							<i class="la la-map-marker"></i> Hà Nội
						</span>
					</div>
				</li>
			</ul>
		</div>
	</div>
	@else
	<div class="profile__header-btn-dropdown">
		<span> 
			<img class="lazy" data-original="{{url('uploads/none-user.jpg')}}" src="{{url('uploads/giphy.gif')}}" onerror=" this.src='/images/none-user.jpg'" alt="none-user">&nbsp;
			<span class="profile_header-user-name">Tài khoản</span> 
		</span>
		<ul>
			<li>
				<a href="#" class="register-popup" data-url-render="https://123job.vn/ajax/render_form_register"> <i class="la la-file-text"></i> Đăng ký</a>
			</li>
			<li>
				<a href="#" class="signin-popup" data-url-render="https://123job.vn/ajax/render_form_login"> <i class="la la-briefcase"></i> Đăng nhập</a>
			</li>
		</ul>
	</div>
	@endif
	@if(\Request::is('home-page')) 
		<a href="https://123job.vn/nha-tuyen-dung/dang-tin" class="post-job-btn">
			<i class="la la-plus"></i>Đăng tin
		</a>
		<a href="https://123job.vn/cv/sample" class="post-job-btn">
			<i class="la la-pencil-square"></i>Tạo CV
		</a>
	@elseif (\Request::is('bai-viet/*') || \Request::is('danh-muc/*'))
		<a href="https://123job.vn/cv/sample" class="post-job-btn">
			<i class="la la-pencil-square"></i>Tạo CV
		</a>
	@endif
</div>