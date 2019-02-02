<div class="text-center">
	<h3>Người tìm việc đăng nhập</h3>
</div>
<form method="post" id="form-sign-in" class="popup-login">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="type" value="candidates">
	<div class="text-center mt-0"><span class="error-form error-account"></span>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="cfield">
				<div class="cfield__title">Email</div>
				<input type="email" placeholder="Nhập email của bạn ..." name="email" id="email-sign-in" required> <i class="la la-envelope"></i>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="cfield">
				<div class="cfield__title">Mật khẩu</div>
				<input type="password" placeholder="Nhập mất khẩu của bạn ..." name="password" id="password-sign-in"> <i class="la la-key"></i>
				<span class="error-form"></span>
			</div>
		</div>
		<div class="col-lg-12 register-forget account-box__link d-flex justify-content-between"> <a href="https://123job.vn/nguoi-tim-viec/dang-ky">Đăng ký tại đây</a>
			<a href="{{route('get.candidate.confirm_email_password')}}">Quên mật khẩu?</a>
		</div>
		<div class="col-lg-12">
			<button type="submit" id="button-submit-form-login">Đăng nhập</button>
		</div>
	</div>
</form>