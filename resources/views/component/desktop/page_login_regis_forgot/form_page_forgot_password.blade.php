<form method="post" id="form-forgot-password" class="popup-login">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="type" value="candidates">
	<div class="text-center">
		<h3>Quên Mật Khẩu</h3>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<p class="text-form-header">
				Điền email đăng ký của bạn, 123job sẽ gửi cho bạn mật khẩu mới.
			</p>
		</div>
		<div class="col-lg-12">
			<div class="cfield">
				<input type="email" placeholder="Email hoặc số điện thoại" name="email" id="email-sign-in" required>
				<span class="error-form">Bạn chưa nhập email hoặc số điện thoại</span>
			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit" class="button-submit-form" id="button-submit-form-forgot-password">Gửi lại mật khẩu</button>
		</div>
		<div class="col-lg-12 text-center">
			<p class="text-form-footer">
				Chưa có tài khoản tại 123job.vn? <a href="#" class="text-pink">Đăng ký</a>
			</p>
		</div>
	</div>
</form>