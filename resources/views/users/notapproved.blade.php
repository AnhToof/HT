@extends('layouts.app')
<style>
    .flash-message {
        bottom: 30px;
        position: absolute;
        right: 20px;
        z-index: 10;
    }
</style>
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tài khoản chưa cho phép
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Quản lý tài khoản</a></li>
                <li class="active">Tài khoản chưa cho phép</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-user">
                                Tạo tài khoản
                            </button>
                        </div>


                        <table id="notapproved" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Cho phép</th>
                                <th>Từ chối</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user['status'] == 0 && $user['isAdmin'] == 0)
                                    <tr>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['fullname']}}</td>
                                        <td>{{$user['dob']}}</td>
                                        <td>
                                            @if($user['sex'] == 1)
                                                Nam
                                            @else
                                                Nữ
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('notapproved.update', ['id' =>$user['id']])}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-success">Cho phép</button>
                                            </form>


                                        </td>

                                        <td>
                                            <form method="POST" action="{{route('notapproved.destroy', ['id' =>$user['id']])}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-warning">Từ chối</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>

                        </table>

                        @include('users.modals.add')

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection