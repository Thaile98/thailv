<form method="post" id="form-register" class="popup-login">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="type" value="candidates">
	<div class="text-center">
		<h3>Người tìm việc đăng kí</h3>
	</div>
	<div class="text-center mt-0" style="display: none"><span class="error-form error-account"></span>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="cfield">
				<input type="email" placeholder="Email hoặc số điện thoại" name="email" id="email-sign-in" required>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="cfield">
				<input type="password" placeholder="Mật khẩu" name="password" id="password-sign-in">
				<span class="error-form">Bạn chưa nhập mật khẩu</span>
			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit" class="button-submit-form" id="button-submit-form-register">Tạo tài khoản</button>
		</div>
		<div class="col-lg-12">
			<hr>
			<span class="mxh">Mạng xã hội</span>
		</div>
		<div class="col-lg-12 sign-in-social">
			<button class="btn-signin-facebook"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
			<button class="btn-signin-google"><i class="fa fa-google-plus"></i> Sign in with Google</button>
		</div>
		<div class="col-lg-12 text-center">
			<p class="text-form-footer">Khi bạn đăng nhập bằng facebook, google mặc định bạn đồng ý với <a href="#">Điều khoản dịch vụ</a> và <a href="#">Chính sách bảo mật</a> của chúng tôi</p>
		</div>
		<div class="col-lg-12 text-center">
			<p class="text-form-footer">
				Đã có tài khoản tại 123job.vn? <a href="#" class="text-pink">Đăng nhập</a>
			</p>
		</div>
	</div>
</form>