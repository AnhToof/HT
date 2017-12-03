<!-- Edit Modal -->
<div style="text-align: left ;vertical-align:baseline" class="modal fade" id="edit-user{{$user['id']}}" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Sửa tài khoản</h4>
            </div>
            <div class="modal-body">
                <form id="frmUser" data-toggle="validator" action="{{ route('approved.edit', ['id' =>$user['id']]) }}"
                      method="PUT">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" readonly type="email" name="email"
                               id="email" class="form-control" data-error="Vui lòng điền vào Email" required
                               value="{{$user['email']}}"/>

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname-edit" class="form-control"
                               value="{{$user['fullname']}}" required/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="dob-edit">Ngày sinh</label>
                            <input id="dob-edit" type="text" name="dob" class="form-control"
                                   data-error="Vui lòng điền vào Ngày sinh" required
                                   value="{{$user['dob']}} "/>
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="sex">Giới tính</label>
                            <select name="sex" id="sex" class="form-control" required>

                                <option value="0" @if($user['sex']==0) selected="selected" @endif>Nữ</option>
                                <option value="1" @if($user['sex']==1) selected="selected" @endif>Nam</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnEditUser" name="btnEditUser">
                            Lưu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
