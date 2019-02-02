@extends('admin::admin_app')

@section('title','Tạo tài khoản')
@section('content')
            
            <div class="col-md-6 col-md-offset-3">
                <form action="{{route('post.admin.create')}}" method="POST" class="form-handle" role="form">
                    <div class="form-group">
                        <label class="form-control-label">Tên tài khoản</label>
                            <input type="text" name="name" class="form-control w-50" placeholder="Admin name" value="{{Old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                            <input type="email" name="email" class="form-control w-50" placeholder="Email" value="{{Old('email')}}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                            <input type="password" name="password" class="form-control w-50" placeholder="Password" required>
                    </div>
                    <div class="form-group ">
                        <label class="form-control-label">Cấp quyền :</label>
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-md-4">
                                    <input type="checkbox" name="roles[{{$role->id}}]"> {{$role->name}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Tạo tài khoản</button>
                            <a href="{{route('get.admin.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                    </div>
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                </form>
            </div>
@endsection