<!-- Delete Modal -->
<div style="text-align: left; vertical-align: baseline" class="modal fade" id="delete-hrindex{{$index['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Xóa chỉ số</h4>
            </div>
            <div class="modal-body">
                <p> Bạn có chắc là muốn xóa không?</p>

            </div>
            <div class="modal-footer">
                <form id="frmUser" data-toggle="validator" action="{{route('hrindex.destroy', ['id' =>$index['id']])}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnSubmit" name="btnSubmit" >OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
