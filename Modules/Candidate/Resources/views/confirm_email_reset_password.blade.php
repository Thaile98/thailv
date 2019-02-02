<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                        <form method="POST" action="{{ route('post.candidate.confirm_email_password') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Nhập email tài khoản của bạn</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autofocus>
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
    
</body>
</html>
