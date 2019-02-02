<header class="main-header" style="position: fixed;width: 100%">
    
    <nav class="navbar navbar-static-top">
        <button href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span>
        </button>
        @if(\Request::is('admin/candidate'))
        <div class="form-search-candidate">
            <div class="form-search-basic">
                <form class="form-inline">
                    <input type="text" name="" class="form-control" size="40" value="" placeholder="Tìm kiếm nhanh ứng viên">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('images/avatar.png')}}" class="user-image" alt="User Image"> <span class="hidden-xs">{{Auth::guard('admins')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset('images/avatar.png')}}" class="img-circle" alt="User Image">
                            <p>{{Auth::guard('admins')->user()->name}}- Web Developer <small>Member since Nov. 2018</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left"> <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right"> 
                                <a href="{{ route('get.admin.logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                    Logout
                                </a>
        
                                <form id="logout-form" action="{{ route('get.admin.logout') }}" method="get" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
