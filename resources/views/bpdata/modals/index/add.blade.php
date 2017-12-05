<!-- Add Modal -->
<div style="text-align: left ;vertical-align:baseline" class="modal fade" id="create-bpindex" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tạo chỉ số</h4>
            </div>

            <div class="modal-body">

                <form id="frmUser" data-toggle="validator" action="{{ route('bpindex.store') }}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <label class="col-md-2 col-form-label">Huyết áp tâm thu</label>
                        <div class="form-group col-md-4">
                            <input min="0"  type="number" name="from_systolic" class="form-control" id="from_systolic"
                                   placeholder="1" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input min="0"  type="number" name="to_systolic" class="form-control" id="to_systolic"
                                   placeholder="12" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-2 col-form-label">Huyết áp tâm trương</label>
                        <div class="form-group col-md-4">
                            <input min="0"  type="number" name="from_diastolic" class="form-control" id="from_diastolic"
                                   placeholder="1" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input min="0"  type="number" name="to_diastolic" class="form-control" id="to_diastolic"
                                   placeholder="12" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Kiểu so sánh</label>
                        <div class="form-group col-md-4">
                            <select name="operator" id="operator" class="form-control" required>

                                <option value="0">Và</option>
                                <option value="1">Hoặc</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label">Chẩn đoán</label>
                        <div class="form-group col-md-4 ">
                            <select name="diagnose_id" id="diagnose_id" class="form-control" required>

                                @foreach($diagnoses as $diagnose)
                                    <option value="{{$diagnose}}">{{\App\BPDiagnose::find($diagnose)['diagnose']}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnSubmitBPIndex"
                                name="btnSubmitBPIndex">Tạo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>