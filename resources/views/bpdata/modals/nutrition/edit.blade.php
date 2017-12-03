<!-- Edit Modal -->
<div style="text-align: left ;vertical-align:baseline" class="modal fade" id="edit-bpnutrition{{ $nutrition['id'] }}"
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Sửa chế độ dinh dưỡng</h4>
            </div>

            <div class="modal-body">

                <form  id="frmUser" data-toggle="validator" action="{{ route('bpnutrition.edit', ['id' =>$nutrition['id']]) }}" method="PUT">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <label class="col-md-2 col-form-label">Chẩn đoán</label>
                        <div class="form-group col-md-10 ">
                            <select name="diagnose_id" id="diagnose_id" class="form-control" required>

                                @foreach($diagnoses as $diagnose)
                                    <option value="{{$diagnose}}" @if($diagnose==$nutrition['diagnose_id']) selected = 'selected' @endif>{{\App\BPDiagnose::find($diagnose)['diagnose']}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 col-form-label">Chế độ dinh dưỡng</label>
                        <div class="form-group col-md-10 ">
                            <textarea class="form-control" name="nutrition" id="nutrition" rows="5"
                                      required>{{$nutrition['nutrition']}}</textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnEditBPNutrition"
                                name="btnEditBPNutrition">Lưu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>