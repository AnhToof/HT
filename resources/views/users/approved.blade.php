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
                Tài khoản đã cho phép
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Quản lý tài khoản</a></li>
                <li>Tài khoản đã cho phép</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">

                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#create-user">
                                Tạo tài khoản
                            </button>
                            @include('users.modals.add')

                            <table id="approved" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center ;vertical-align:middle">Email</th>
                                    <th style="text-align: center ;vertical-align:middle">Họ và tên</th>
                                    <th style="text-align: center ;vertical-align:middle">Ngày sinh</th>
                                    <th style="text-align: center ;vertical-align:middle">Giới tính</th>
                                    <th style="text-align: center ;vertical-align:middle">Sửa</th>
                                    <th style="text-align: center ;vertical-align:middle">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user['status'] == 1  && $user['isAdmin'] == 0)
                                        <tr>
                                            <td style="text-align: center ;vertical-align:middle">{{$user->email}}</td>
                                            <td style="text-align: center ;vertical-align:middle">{{$user->fullname}}</td>
                                            <td style="text-align: center ;vertical-align:middle">{{$user->dob}}</td>
                                            <td style="text-align: center ;vertical-align:middle">
                                                @if($user->sex == 1)
                                                    Nam
                                                @else
                                                    Nữ
                                                @endif
                                            </td>
                                            <td style="text-align: center ;vertical-align:middle">
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#edit-user{{$user['id']}}">Sửa
                                                </button>
                                                @include('users.modals.edit')

                                            </td>
                                            <td style="text-align: center ;vertical-align:middle">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#delete-user{{$user['id']}}">Xóa
                                                </button>
                                                @include('users.modals.delete')
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                </tbody>

                            </table>
                            {{$users->links()}}

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                                                                                     class="close"
                                                                                                     data-dismiss="alert"
                                                                                                     aria-label="close">&times;</a>
                            </p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->




@endsection