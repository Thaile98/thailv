$('.profile__header-btn-dropdown').click(function(){
	$('.profile__header-btn-dropdown ul').fadeToggle();	
});
$("body").on("click", function () {
	$(".profile__header-btn-dropdown ul").fadeOut();
});
$(".profile__header-btn-dropdown").on("click", function (t) {
	t.stopPropagation();
});
$('.signin-popup').click(function(){
	$('.signin-popup-box').css('display','block');
	$('.sign-in').css('display','block');
	$('.register').css('display','none');
});
$('.register-popup').click(function(){
	$('.signin-popup-box').css('display','block');
	$('.sign-in').css('display','none');
	$('.register').css('display','block');
});
$('.close-popup').click(function(){
	$('.signin-popup-box').css('display','none');
});


$('#form-register').submit(function ()
{
    var name = $(this.name).val();
    var email = $(this.email).val();
    var phone = $(this.phone).val();
    var password = $(this.password).val();
    $('.error-form').remove();
    if ($.trim(name) == ''){
        $(this.name).parent().append(`<span class="error-form">Bạn chưa nhập tên tài khoản</span>`);
        return false;
    }
    if ($.trim(email) == ''){
        $(this.email).parent().append(`<span class="error-form">Bạn chưa nhập email</span>`);
        return false;
    }
    if ($.trim(password) == ''){
        $(this.password).parent().append(`<span class="error-form">Bạn chưa nhập mật khẩu</span>`);
        return false;
    }
    if (password.length < 6 || password.length > 20){
        $(this.password).parent().append(`<span class="error-form">Mật khẩu phải từ 6 đến 20 kí tự</span>`);
        return false;
    }
    if ($.trim(phone) == ''){
        $(this.phone).parent().append(`<span class="error-form">Bạn chưa nhập số điện thoại</span>`);
        return false;
    }

    $.ajax({
    	headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/candidate/register',
        type : 'post',
        dataType : 'json',
        data : {
            name : name,
            email : email,
            password : password,
            phone : phone,
            verify_token : $('meta[name="csrf-token"]').attr('content')
        },
        success : function (data)
        {
        	$('.error-form').remove();
            if(data.errorEmail)
            {
            	$('#form-register #email').parent().append(`<span class="error-form">${data.errorEmail}</span>`);
            }
            else if(data.errorPhone)
            {
            	$('#form-register #phone').parent().append(`<span class="error-form">${data.errorPhone}</span>`);
            }
            else
            {
            	$('.signin-popup-box').css('display','none');
            	alert(`Đăng ký tài khoản thành công, vui lòng kiểm tra email của bạn để xác thực tài khoản`);
            }
        }
    });
 
    return false;
});
$('#form-sign-in').submit(function ()
{
    var email = $('#email-sign-in').val();
    var password = $('#password-sign-in').val();
    $('.error-form').remove();
    if ($.trim(password) == ''){
        $(this.password).parent().append(`<span class="error-form">Bạn chưa nhập mật khẩu</span>`);
        return false;
    }
    $.ajax({
    	headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/candidate/login',
        type : 'post',
        dataType : 'json',
        data : {
            email : email,
            password : password,
        },
        success : function (data)
        {
        	console.log(data);
        	$('.error-form').remove();
            if(data.error == true)
            {
            	$('#form-sign-in').prepend(`<div class="text-center mt0"><span class="error-form error-account">Mật khẩu hoặc tài khoản chưa đúng</span></div>`);
            }
            else
            {
            	location.reload();
            }
        }
    });
 
    return false;
});