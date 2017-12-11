@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dữ liệu người dùng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Dữ liệu người dùng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="approved" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Nhịp tim</th>
                                    <th>Huyết áp</th>
                                    <th>Thời gian đo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{\App\User::find($result['user_id'])->email}}</td>
                                        <td>{{$result['heart_rate']}}</td>
                                        <td>{{$result['blood_pressure']}}</td>
                                        <td>{{$result['created_at']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$results->links()}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection