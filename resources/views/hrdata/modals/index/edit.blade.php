<!-- Edit Modal -->
<div style="text-align: left ;vertical-align:baseline" class="modal fade" id="edit-hrindex{{ $index['id'] }}"
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Sửa chỉ số</h4>
            </div>
            <div class="modal-body">

                <form id="frmUser" data-toggle="validator" action="{{ route('hrindex.edit', ['id' =>$index['id']]) }}"
                      method="PUT">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <label class="col-md-2 col-form-label">Chỉ số</label>
                        <div class="form-group col-md-4">
                            <input min="0" value="{{$index['from_index']}}" type="number" name="from_index"
                                   class="form-control" id="from_index-edit" placeholder="1" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input value="{{$index['to_index']}}" type="number" name="to_index" class="form-control"
                                   id="to_index-edit" placeholder="12" data-error="Vui lòng điền vào trường còn trống"
                                   required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Tuổi</label>
                        <div class="form-group col-md-4">
                            <input min="0" value="{{$index['from_age']}}" type="number" name="from_age"
                                   class="form-control" id="from_age-edit" placeholder="1"
                                   data-error="Vui lòng điền vào trường còn trống" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label"> - </label>

                        <div class="form-group col-md-4">
                            <input max="150" value="{{$index['to_age']}}" type="number" name="to_age"
                                   class="form-control" id="to_age-edit" placeholder="12"
                                   data-error="Vui lòng điền vào trường còn trống" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Giới tính</label>
                        <div class="form-group col-md-4">
                            <select name="sex" id="sex" class="form-control" required>

                                <option value="0" @if($index['sex']==0) selected="selected" @endif>Nữ</option>
                                <option value="1" @if($index['sex']==1) selected="selected" @endif>Nam</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <label class="col-md-2 col-form-label">Chẩn đoán</label>
                        <div class="form-group col-md-4 ">
                            <select name="diagnose_id" id="diagnose_id" class="form-control" required>

                                @foreach($diagnoses as $diagnose)
                                    <option value="{{$diagnose}}"
                                            @if($diagnose==$index['diagnose_id']) selected='selected' @endif>{{\App\HRDiagnose::find($diagnose)['diagnose']}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnEditHRIndex"
                                name="btnEditHRIndex">Lưu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>