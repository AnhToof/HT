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
                <li><a href="#">Quản lý dữ liệu nhịp tim</a></li>
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
                                    data-toggle="modal" data-target="#create-hrindex">Tạo chỉ số
                            </button>
                            @include('hrdata.modals.index.add')

                            <table id="approved" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center">Chỉ số</th>
                                    <th colspan="2" style="text-align: center">Tuổi</th>
                                    <th rowspan="2" style="text-align: center ;vertical-align:middle">Giới tính</th>
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

                                    <tr>
                                        <td style="text-align: center ;vertical-align:middle">{{$index['from_index']}}</td>
                                        <td style="text-align: center ;vertical-align:middle">{{$index['to_index']}}</td>
                                        <td style="text-align: center ;vertical-align:middle">{{$index['from_age']}}</td>
                                        <td style="text-align: center ;vertical-align:middle">{{$index['to_age']}}</td>
                                        <td style="text-align: center ;vertical-align:middle">
                                            @if($index['sex'] == 1)
                                                Nam
                                            @else
                                                Nữ
                                            @endif
                                        </td>
                                        <td style="text-align: center ;vertical-align:middle">{{\App\HRDiagnose::find($index['diagnose_id'])->diagnose}}</td>
                                        <td style="text-align: center ;vertical-align:middle">
                                            <button data-toggle="modal" data-target="#edit-hrindex{{ $index['id'] }}"
                                                    type="button" class="btn btn-sm btn-success">Sửa
                                            </button>
                                            @include('hrdata.modals.index.edit')
                                        </td>
                                        <td style="text-align: center ;vertical-align:middle">
                                            <button data-toggle="modal" data-target="#delete-hrindex{{ $index['id'] }}"
                                                    type="button" class="btn btn-sm btn-warning">Xóa
                                            </button>
                                            @include('hrdata.modals.index.delete')


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

            </div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                                 data-dismiss="alert"
                                                                                                 aria-label="close">&times;</a>
                        </p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->
            <!-- /.row -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection