<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
</head>
<body style="background-color: #ccc">
    <div style="height: 100px">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b>Quên mật khẩu</b></div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('post.candidate.reset_password')}}" id="form-reset-password" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Nhập mật khẩu </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password-reset" name="password" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Nhập lại mật khẩu </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password-reset-confirm" name="confirm_password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-info">
                                        Xác nhận
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('#form-reset-password').submit(function ()
        {
            var password = $('#password-reset').val();
            var password_confirm = $('#password-reset-confirm').val();
            
            if (password.length < 6 || password.length > 20){
                alert('Mật khẩu phải từ 6 đến 20 kí tự');
                return false;
            }

            if (password != password_confirm){
                alert('Mật khẩu không trùng khớp');
                return false;
            }

            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '/candidate/reset-password',
                type : 'post',
                dataType : 'json',
                data : {
                    id : '{{$candidate->id}}',
                    email : '{{$candidate->email}}',
                    password : password,
                },
                success : function (data)
                {
                    console.log(data);
                    if(data.error)
                    {
                        alert(data.error);
                    }
                    window.location.replace("http://codetest.abc/home-page");
                }
            });
            return false;
        });
    </script>
</body>
</html>
