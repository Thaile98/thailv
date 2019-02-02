<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/skins/skin-black.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/dist/css/css-handle.css')}}">
    <link href="{{asset('admin/rateit/src/rateit.css')}}" rel="stylesheet" type="text/css">
</head>

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
        @include('admin::admin_header')
        <aside class="main-sidebar" style="box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);background: url({{asset('uploads/article/abc.jpg')}});padding-top: 0;position: fixed">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('images/avatar.png')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::guard('admins')->user()->name}}</p> <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
                              </span>
                    </div>
                </form>
                @include('admin::admin_sidebar_menu')
            </section>
        </aside>
        <div class="content-wrapper" style="background: #ECF0F5;margin-top: 50px;">
            <section class="content-header"> 
                <h1>@yield('title')</h1>
            </section>
            <section id="content">
                <div class="container-fluid">
                    <div>
                        &nbsp;
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-danger">
                                <div class="box-body">
                                    @if(\Session::has('success'))
                                    <div class="alert fade in alert-fade-out">
                                        <strong>Success : </strong> {{\Session::get('success')}}
                                    </div>
                                    @endif
                                    @yield('content')
                                    <div style="height: 100px">&nbsp;</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('admin::admin_footer')
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/ckeditor/adapters/jquery.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
    <script src="{{asset('admin/rateit/src/jquery.rateit.js')}}" type="text/javascript"></script> 
    @yield('js-handle')
    <script>
        if ($('.alert-fade-out')) {
            function hideAlert(){
                setTimeout(function(){
                    $('.alert-fade-out').fadeOut('slow');
                },4000);
            }
            hideAlert();
        }
    </script>
</body>

</html>