<!-- Add Modal -->
<div style="text-align: left ;vertical-align:baseline" class="modal fade" id="create-hrindex" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tạo chỉ số</h4>
            </div>
            <div class="modal-body">

                <form id="frmUser" data-toggle="validator" action="{{ route('hrindex.store') }}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <label class="col-md-2 col-form-label">Chỉ số</label>
                        <div class="form-group col-md-4">
                            <input type="number" name="from_index" min="0" class="form-control" id="from_index"
                                   placeholder="1" data-error="Vui lòng điền Chỉ số từ" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input type="number" name="to_index" class="form-control" id="to_index" placeholder="12"
                                   data-error="Vui lòng điền vào trường còn trống" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Tuổi</label>
                        <div class="form-group col-md-4">
                            <input type="number" min="0" name="from_age" class="form-control" id="from_age"
                                   placeholder="1" data-error="Vui lòng điền vào trường còn trống" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input type="number" name="to_age" class="form-control" id="to_age" max="150"
                                   placeholder="12" data-error="Vui lòng điền vào trường còn trống" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Giới tính</label>
                        <div class="form-group col-md-4">
                            <select name="sex" id="sex" class="form-control" required>

                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label">Chẩn đoán</label>
                        <div class="form-group col-md-4 ">
                            <select name="diagnose_id" id="diagnose_id" class="form-control" required>

                                @foreach($diagnoses as $diagnose)
                                    <option value="{{$diagnose}}">{{\App\HRDiagnose::find($diagnose)['diagnose']}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnSubmitHRIndex"
                                name="btnSubmitHRIndex">Tạo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>