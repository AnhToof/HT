<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/css/bootstrap.css"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    $('.flash-message').delay(500).fadeIn(250).delay(4000).fadeOut(500);
</script>
<script type="text/javascript">
    $(function () {
        $("#btnSubmitUser").click(function () {
            validateConfirmPasswordIn();
            ValidateFullnameAdd();
            ValidateDate();
            

        });
        $("#btnEditUser").click(function () {
            ValidateFullnameEdit();
            ValidateDate();


        });

        function validateConfirmPasswordIn() {
            var password = $("#password").val();
            var cpassword = $("#password_confirmation").val();
            document.getElementById('password_confirmation').setCustomValidity('');
            if (cpassword == password) {

            }
            else {
                document.getElementById('password_confirmation').setCustomValidity("Mật khẩu xác thực không khớp!");
            }
        }

        function ValidateFullnameAdd() {
            var fullname = $('#fullname').val();
            var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
            var check = function (string) {
                for (i = 0; i < specialChars.length; i++) {
                    if (string.indexOf(specialChars[i]) > -1) {
                        return true
                    }
                }
                return false;
            }
            if (check(fullname))
                document.getElementById('fullname').setCustomValidity("Họ và tên không được để trống và có ký tự đặc biệt");
            else document.getElementById('fullname').setCustomValidity("");

        }

        function ValidateFullnameEdit() {
            var fullname = $('#fullname-edit').val();
            var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
            var check = function (string) {
                for (i = 0; i < specialChars.length; i++) {
                    if (string.indexOf(specialChars[i]) > -1) {
                        return true
                    }
                }
                return false;
            }
            if (check(fullname))
                document.getElementById('fullname-edit').setCustomValidity("Họ và tên không được để trống và có ký tự đặc biệt");
            else document.getElementById('fullname-edit').setCustomValidity("");

        }


        function ValidateDate() {
            var selectedDate = $("#dob").val();
            var now = new Date();
            var dt1 = Date.parse(now),
                dt2 = Date.parse(selectedDate);
            if (dt2 > dt1) {
                document.getElementById('dob').setCustomValidity("Ngày sinh phải nhỏ hơn ngày hiện tại");
            } else document.getElementById('dob').setCustomValidity("");
            var selectedDateEdit = $("#dob-edit").val();
            var nowedit = new Date();
            var dte1 = Date.parse(nowedit),
                dte2 = Date.parse(selectedDateEdit);
            if (dte2 > dte1) {
                document.getElementById('dob-edit').setCustomValidity("Ngày sinh phải nhỏ hơn ngày hiện tại");
            } else document.getElementById('dob-edit').setCustomValidity("");
        }

        $("#btnSubmitHRIndex").click(function () {
            ValidateToIndex();
            ValidateToAge();
        });
        $("#btnEditHRIndex").click(function () {
            ValidateToIndex();
            ValidateToAge();

        });

        function ValidateToIndex() {
            var to_index = $('#to_index').val();
            var from_index = $('#from_index').val();
            var n1 = parseInt(to_index);
            var n2 = parseInt(from_index);
            if (n1 <= n2)
                document.getElementById('to_index').setCustomValidity("Giá trị này phải lớn hơn chỉ số");
            else document.getElementById('to_index').setCustomValidity("");
            var to_indexedit = $('#to_index-edit').val();
            var from_indexedit = $('#from_index-edit').val();
            var ne1 = parseInt(to_indexedit);
            var ne2 = parseInt(from_indexedit);
            if (ne1 <= ne2)
                document.getElementById('to_index-edit').setCustomValidity("Giá trị này phải lớn hơn Chỉ số");
            else document.getElementById('to_index-edit').setCustomValidity("");
        }

        function ValidateToAge() {
            var to_age = $('#to_age').val();
            var from_age = $('#from_age').val();
            var n1 = parseInt(to_age);
            var n2 = parseInt(from_age);
            if (n1 < n2)
                document.getElementById('to_age').setCustomValidity("Giá trị này phải lớn hơn Tuổi và nhỏ hơn 150");
            else document.getElementById('to_age').setCustomValidity("");
            var to_ageedit = $('#to_age-edit').val();
            var from_ageedit = $('#from_age-edit').val();
            var ne1 = parseInt(to_ageedit);
            var ne2 = parseInt(from_ageedit);
            if (ne1 < ne2)
                document.getElementById('to_age-edit').setCustomValidity("Giá trị này phải lớn hơn Tuổi và nhỏ hơn 150");
            else document.getElementById('to_age-edit').setCustomValidity("");
        }

        $("#btnSubmitBPIndex").click(function () {
            ValidateToSystolic();
            ValidateToDiastolic();
        });
        $("#btnEditBPIndex").click(function () {
            ValidateToSystolic();
            ValidateToDiastolic();
        });

        function ValidateToSystolic() {
            var to_systolic = $('#to_systolic').val();
            var from_systolic = $('#from_systolic').val();
            var n1 = parseInt(to_systolic);
            var n2 = parseInt(from_systolic);
            if (n1 <= n2)
                document.getElementById('to_systolic').setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm thu");
            else document.getElementById('to_systolic').setCustomValidity("");
            var to_systolicedit = $('#to_systolic-edit').val();
            var from_systolicedit = $('#from_systolic-edit').val();
            var ne1 = parseInt(to_systolicedit);
            var ne2 = parseInt(from_systolicedit);
            if (ne1 <= ne2)
                document.getElementById('to_systolic-edit').setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm thu");
            else document.getElementById('to_systolic-edit').setCustomValidity("");
        }

        function ValidateToDiastolic() {
            var to_diastolic = $('#to_diastolic').val();
            var from_diastolic = $('#from_diastolic').val();
            var n1 = parseInt(to_diastolic);
            var n2 = parseInt(from_diastolic);
            if (n1 <= n2)
                document.getElementById('to_diastolic').setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm trương");
            else document.getElementById('to_diastolic').setCustomValidity("");
            var to_diastolicedit = $('#to_diastolic-edit').val();
            var from_diastolicedit = $('#from_diastolic-edit').val();
            var ne1 = parseInt(to_diastolicedit);
            var ne2 = parseInt(from_diastolicedit);
            if (ne1 <= ne2)
                document.getElementById('to_diastolic-edit').setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm trương");
            else document.getElementById('to_diastolic-edit ').setCustomValidity("");
        }
        

    });
</script>
<script>
    $(document).ready(function () {
        var url = window.location;
        var element = $('ul.sidebar-menu a').filter(function () {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }).parent().addClass('active');

        if (element.is('li')) {
            element.addClass('active').parent().parent('li').addClass('active')
        }

    });
</script>
<script>
    $(document).ready(function () {
        var msg = "";

        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                if (!e.target.validity.valid) {
                    switch (e.target.id) {
                        case 'password' :
                            e.target.setCustomValidity("Mật khẩu phải lớn hơn hoặc bằng 6 ký tự");
                            break;
                        case 'email' :
                            e.target.setCustomValidity("Email phải hợp lệ. Vd: anh@gmail.com");
                            break;
                        case 'fullname' :
                            e.target.setCustomValidity("Họ và tên không được để trống và có ký tự đặc biệt");
                            break;
                        case 'fullname-edit' :
                            e.target.setCustomValidity("Họ và tên không được để trống");
                            break;
                        case 'dob':
                            e.target.setCustomValidity("Ngày sinh phải trước ngày hiện tại");
                            break;
                        case 'dob-edit':
                            e.target.setCustomValidity("Ngày sinh phải trước ngày hiện tại");
                            break;
                        case 'from_index':
                            e.target.setCustomValidity("Chỉ số không được để trống và lớn hơn hoặc bằng 0");
                            break;
                        case 'to_index':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn trường Chỉ số");
                            break;
                        case 'from_age':
                            e.target.setCustomValidity("Tuổi không được để trống và lớn hơn hoặc bằng 0");
                            break;
                        case 'to_age':
                            e.target.setCustomValidity("Giá trị này không được nhỏ hơn Tuổi và nhỏ hơn 150");
                            break;
                        case 'from_index-edit':
                            e.target.setCustomValidity("Chỉ số không được để trống và lớn hơn hoặc bằng 0");
                            break;
                        case 'to_index-edit':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn Chỉ số");
                            break;
                        case 'from_age-edit':
                            e.target.setCustomValidity("Tuổi không được để trống và lớn hơn hoặc bằng 0");
                            break;
                        case 'to_age-edit':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn Tuổi và nhỏ hơn 150");
                            break;
                        case 'from_systolic':
                            e.target.setCustomValidity("Huyết áp tâm thu không được để trống");
                            break;
                        case 'to_systolic':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm thu");
                            break;
                        case 'from_diastolic':
                            e.target.setCustomValidity("Huyết áp tâm trương không được để trống");
                            break;
                        case 'to_diastolic':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm trương");
                            break;
                        case 'from_systolic-edit':
                            e.target.setCustomValidity("Huyết áp tâm thu không được để trống");
                            break;
                        case 'to_systolic-edit':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm thu");
                            break;
                        case 'from_diastolic-edit':
                            e.target.setCustomValidity("Huyết áp tâm trương không được để trống");
                            break;
                        case 'to_diastolic-edit':
                            e.target.setCustomValidity("Giá trị này phải lớn hơn Huyết áp tâm trương");
                            break;
                    }
                }
            };

            elements[i].oninput = function (e) {
                e.target.setCustomValidity(msg);
            };
        }
        var elements1 = document.getElementsByTagName("SELECT");
        for (var i = 0; i < elements1.length; i++) {
            elements1[i].oninvalid = function (e) {
                if (!e.target.validity.valid) {
                    switch (e.target.id) {
                        case 'sex' :
                            e.target.setCustomValidity("Giới tính không được để trống");
                            break;
                        case 'diagnose_id':
                            e.target.setCustomValidity("Chẩn đoán không được để trống");
                            break;
                        case 'operator':
                            e.target.setCustomValidity("So sánh không được để trống");
                            break;
                        default:
                            e.target.setCustomValidity('');
                    }
                }
            };
            elements1[i].oninput = function (e) {
                e.target.setCustomValidity(msg);
            };
        }
        var elements2 = document.getElementsByTagName("TEXTAREA");
        for (var i = 0; i < elements2.length; i++) {
            elements2[i].oninvalid = function (e) {
                if (!e.target.validity.valid) {
                    switch (e.target.id) {
                        case 'nutrition' :
                            e.target.setCustomValidity("Chế độ dinh dưỡng không được để trống");
                            break;
                        default:
                            e.target.setCustomValidity('');
                    }
                }
            };
            elements2[i].oninput = function (e) {
                e.target.setCustomValidity(msg);
            };
        }
    });
</script>
<script>
    $("#calendar").datepicker().datepicker("setDate", new Date());
</script>
