<!-- Add Modal -->
<div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Tạo tài khoản</h4>
            </div>
            <div class="modal-body">

                <form id="frmUser" data-toggle="validator" action="{{ route('approved.store') }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" name="email" id="email" class="form-control" data-error="Vui lòng điền vào Email" required />

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Mật khẩu</label>
                            <input pattern=".{6,}" title="Six or more characters" type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu"data-error="Vui lòng điền vào Mật khẩu" required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password-confirm">Xác thực mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password_confirmation" placeholder="Xác thực mật khẩu"data-error="Vui lòng điền vào Xác thực mật khẩu" required />
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" data-error="Vui lòng điền vào Họ và tên" required />
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="dob">Ngày sinh</label>
                            <input  type="date" id="dob" name="dob" class="form-control" data-error="Vui lòng điền vào Ngày sinh" required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="input-type">Giới tính</label>
                            <select name="sex" id="sex" class="form-control" required>
                                <option value="">Chọn giới tính</option>
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn crud-submit btn-success" id="btnSubmit" name="btnSubmit" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
