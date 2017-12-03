@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dữ liệu chỉ số
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Quản lý dữ liệu huyết áp</a></li>
                <li>Dữ liệu chỉ số</li>
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
                                    data-toggle="modal" data-target="#create-bpindex">Tạo chỉ số
                            </button>
                            @include('bpdata.modals.index.add')

                            <table id="bpindex" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center">Huyết áp tâm thu</th>
                                    <th rowspan="2" style="text-align: center ;vertical-align:middle"></th>
                                    <th colspan="2" style="text-align: center">Huyết áp tâm trương</th>
                                    <th rowspan="2" style="text-align: center ;vertical-align:middle">Chẩn đoán</th>
                                    <th rowspan="2" style="text-align: center ;vertical-align:middle">Sửa</th>
                                    <th rowspan="2" style="text-align: center ;vertical-align:middle">Xóa</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center">Từ</th>
                                    <th style="text-align: center">Đến</th>
                                    <th style="text-align: center">Từ</th>
                                    <th style="text-align: center">Đến</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($indices as $index)

                                    <tr style="text-align: center">
                                        <td>{{$index['from_systolic']}}</td>
                                        <td>{{$index['to_systolic']}}</td>
                                        <td>
                                            @if($index['operator'] == 0)
                                                Và
                                            @else
                                                Hoặc
                                            @endif
                                        </td>
                                        <td>{{$index['from_diastolic']}}</td>
                                        <td>{{$index['to_diastolic']}}</td>
                                        <td>{{\App\BPDiagnose::find($index['diagnose_id'])->diagnose}}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#edit-bpindex{{$index['id']}}">Sửa
                                            </button>
                                            @include('bpdata.modals.index.edit')
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#delete-bpindex{{$index['id']}}">Xóa
                                            </button>
                                            @include('bpdata.modals.index.delete')

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>

                            </table>
                            {{$indices->links()}}

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
    </div>
    <!-- /.content-wrapper -->
@endsection