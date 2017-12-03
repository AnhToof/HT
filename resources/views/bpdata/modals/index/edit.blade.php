<!-- Edit Modal -->
<div style="text-align: left ;vertical-align:baseline" class="modal fade" id="edit-bpindex{{ $index['id'] }}"
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Sửa chỉ số</h4>
            </div>
            <div class="modal-body">

                <form id="frmUser" data-toggle="validator" action="{{ route('bpindex.edit', ['id' =>$index['id']]) }}"
                      method="PUT">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <label class="col-md-2 col-form-label">Huyết áp tâm trương</label>
                        <div class="form-group col-md-4">
                            <input type="number" name="from_systolic" class="form-control"
                                   value="{{$index['from_systolic']}}"
                                   id="from_systolic-edit" placeholder="1" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input value="{{$index['to_systolic']}}" type="number" name="to_systolic"
                                   class="form-control"
                                   id="to_systolic-edit" placeholder="12" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Huyết áp tâm trương</label>
                        <div class="form-group col-md-4">
                            <input value="{{$index['from_diastolic']}}" type="number" name="from_diastolic"
                                   class="form-control" id="from_diastolic-edit" placeholder="1" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input value="{{$index['to_diastolic']}}" type="number" name="to_diastolic"
                                   class="form-control" id="to_diastolic-edit" placeholder="12" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Kiểu so sánh</label>
                        <div class="form-group col-md-4">
                            <select name="operator" id="operator-edit" class="form-control" required>

                                <option value="0" @if($index['operator']==0) selected='selected' @endif>Và</option>
                                <option value="1" @if($index['operator']==1) selected='selected' @endif>Hoặc</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label">Chẩn đoán</label>
                        <div class="form-group col-md-4 ">
                            <select name="diagnose_id" id="diagnose_id" class="form-control" required>

                                @foreach($diagnoses as $diagnose)
                                    <option value="{{$diagnose}}"
                                            @if($diagnose==$index['diagnose_id']) selected='selected' @endif>{{\App\BPDiagnose::find($diagnose)['diagnose']}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnEditBPIndex"
                                name="btnEditBPIndex">Lưu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>