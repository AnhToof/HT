@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dữ liệu chế độ dinh dưỡng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Quản lý dữ liệu huyết áp</a></li>
                <li class="active">Dữ liệu chế độ dinh dưỡng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <button type="button" class="btn btn-sm btn-primary"
                                    data-toggle="modal" data-target="#create-bpnutrition">Tạo chế độ dinh dưỡng</button>
                            @include('bpdata.modals.nutrition.add')
                            <table id="approved" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Chẩn đoán</th>
                                    <th>Chế độ dinh dưỡng</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nutritions as $nutrition)

                                    <tr>
                                        <td>{{\App\BPDiagnose::find($nutrition['diagnose_id'])->diagnose}}</td>
                                        <td>{{$nutrition['nutrition']}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit-bpnutrition{{$nutrition['id']}}" type="button" class="btn btn-sm btn-success">Sửa</button>
                                            @include('bpdata.modals.nutrition.edit')
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('bpnutrition.destroy', ['id' => $nutrition['id']])}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-warning">Xóa</button>
                                            </form>

                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>

                            </table>
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
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection