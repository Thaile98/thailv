@extends('admin::admin_app')

@section('title', 'Sửa tài khoản : '.$admin->name)
@section('content')
                <div class="col-md-6 col-md-offset-3">
                        <form action="{{route('post.admin.update',$admin->id)}}" class="form-handle" method="POST" role="form">
                            <div class="text-center">
                                <img src="{{asset('images/avatar.png')}}" width="150px" alt="avatar" class="img-circle">
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label">Tên tài khoản</label>
                                <input type="text" name="name" class="form-control" value="{{Old('name',$admin->name)}}" required>
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{Old('name',$admin->email)}}" required>
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label">Vai trò : </label>
                                <div class="row">
                                    @foreach($roles as $role)
                                        <div class="col-md-4">
                                            <input type="checkbox" name="roles[{{$role->id}}]" @foreach($admin->roles as $ur)
                                            {{ ($ur->id === $role->id) ? 'checked' : ''}}
                                        @endforeach> {{$role->name}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Cập nhật</button>
                                <a href="{{route('get.admin.list')}}" class="btn btn-danger"><i class="fa fa-close"></i> Hủy</a>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        </form>
                    </div>
@endsection