<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <!-- 
      /***************  Modal Add   ****************/  
    -->
    <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="myform">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">ชื่อเเผนก</label>
                            <input type="text" class="form-control form-control-sm text-center" id="add_department_name" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">บริษัท</label>
                            <input class="form-control form-control-sm text-center" list="companylist" autocomplete="off" name="companyname" id="companyname" required>
                            <datalist id="companylist">
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="department_save_add">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 
      /***************   Close Modal Add   ****************/  
    -->
    <!-- 
      /***************  Modal Edit   ****************/  
    -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เเก้ไขข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">

                    <div class="mb-3">
                        <label for="user_id" class="form-label">รหัสเเผนก</label>
                        <input type="text" class="form-control form-control-sm text-center" id="department_id" placeholder="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">ชื่อเเผนก</label>
                        <input type="text" class="form-control form-control-sm text-center" id="department_name" placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="department_save_edit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 
      /***************  Close Modal Edit   ****************/  
    -->
    <div class="container">
        <div class="card mt-5 border-dark ">
            <div class="card-header bg-dark text-white ">
                ManageDepartment
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="h3 fw-bold">ManageDepartment</div>
                </div>
                <div class="text-end">
                    <button class="btn btn-lg btn-success" id="add_department"> + เพิ่ม</button>
                </div>

                <br>
                <div class="table-responsive ">
                    <div id="department_table">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php include("share/footer.php"); ?>
</footer>
<script>
    function getdepartment() {
        $.ajax({
            type: "post",
            url: "controller/Department.php",
            data: {
                type: "gettabledepartment"
            },
            success: function(msg) {
                $("#department_table").html(msg);
                $("#table_department").DataTable();
            }
        });
    }

    function adddepartment() {

        var department_name = $("#add_department_name").val();
        if (!department_name) {
            $("#myform").addClass('was-validated');
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                text: 'กรุณากรอกข้อมูลให้ถูกต้อง'
            });
        } else {
            $.ajax({
                type: "post",
                url: "controller/Department.php",
                data: {
                    type: "adddepartment",
                    department: $("#add_department_name").val(),
                    company: $("#companyname").val()
                },
                success: function(msg) {
                    console.log(msg);
                    getdepartment();
                    $('#modaladd').modal('hide');
                }
            });
        }

    }

    function getcompany() {

        $.ajax({
            type: "post",
            url: "controller/Company.php",
            data: {
                type: "getcompany"
            },
            success: function(msg) {
                var jsdecode = JSON.parse(msg);
                var html = "";
                $.each(jsdecode, function(k, v) {
                    html += "<option value='" + v[0] + "'>" + v[1] + "</option>";
                });
                $("#companylist").empty();
                $("#companylist").append(html);
            }
        });
    }

    function editdepartment(id) {
        $.ajax({
            type: "post",
            url: "controller/Department.php",
            data: {
                type: "getdepartmentbyid",
                department_id: id
            },
            success: function(msg) {
                var jsdecode = JSON.parse(msg);
                $('#department_id').val(jsdecode[0][0]);
                $('#department_name').val(jsdecode[0][1]);
                $('#modaledit').modal('show');
                $("#department_save_edit").click(function() {
                    var id = $("#department_id").val();
                    var department = $("#department_name").val();
                    updatedepartment(id, department);
                    $('#modaledit').modal('hide');
                })
            }
        });
    }

    function updatedepartment(id, department) {
        $.ajax({
            type: "post",
            url: "controller/Department.php",
            data: {
                type: "updatedepartment",
                department_id: id,
                department_name: department
            },
            success: function(msg) {
                console.log(msg);
                getdepartment();
            }
        });
    }

    function deldepartment(id) {
        $.ajax({
            type: "post",
            url: "controller/Department.php",
            data: {
                type: "deldepartment",
                department_id: id
            },
            success: function(msg) {
                console.log(msg);
                getdepartment();
            }
        });
    }

    $(document).ready(function() {
        $("#managecdepartment").addClass("active");

        getdepartment();
        $("#add_department").click(function() {
            $('#modaladd').modal('show');
            getcompany();
        });
        $("#department_save_add").click(function() {
            adddepartment();
        });
    });
</script>

</html>