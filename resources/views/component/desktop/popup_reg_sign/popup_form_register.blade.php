<form method="post" id="form-register" class="popup-login">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="type" value="candidates">
	<input type="hidden" name="verify_token" value="{{csrf_token()}}">
	<div class="row">
		<div class="col-lg-12">
			<div class="cfield">
				<div class="cfield__title">Tên tài khoản</div>
				<input type="text" placeholder="Nhập tên tài khoản ..." name="name" id="name"> <i class="la la-user"></i>
				<span class="error-form"></span>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="cfield">
				<div class="cfield__title">Email</div>
				<input type="email" placeholder="Nhập email ..." name="email" id="email"> <i class="la la-envelope-o"></i>
				<span class="error-form"></span>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="cfield">
				<div class="cfield__title">Mật khẩu</div>
				<input type="password" placeholder="Nhập mật khẩu ..." name="password" id="password"> <i class="la la-key"></i>
				<span class="error-form"></span>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="cfield">
				<div class="cfield__title">Số điện thoại</div>
				<input type="numeric" placeholder="Nhập số điện thoại ..." name="phone" id="phone"> <i class="la la-phone"></i>
				<span class="error-form"></span>
			</div>
		</div>
		<div class="col-lg-12 register-forget account-box__link d-flex justify-content-between"> <a href="/nguoi-tim-viec/dang-nhap" title="">Đăng nhập tại đây</a>
			<a href="#" title="">Quên mật khẩu?</a>
		</div>
		<div class="col-lg-12">
			<button type="submit" id="button-submit-form-register">Đăng ký</button>
		</div>
	</div>
</form>
