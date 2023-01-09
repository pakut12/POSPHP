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
                    <div class="mb-3">
                        <label for="user_id" class="form-label">ชื่อเเผนก</label>
                        <input type="text" class="form-control form-control-sm text-center" id="add_department_name" placeholder="">
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
                    <table class="table text-nowrap" id="table_department">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสเเผนก</th>
                                <th>ชื่อเเผนก</th>
                                <th>เเก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody id="data_department">

                        </tbody>
                    </table>
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
                type: "getdepartment"
            },
            success: function(msg) {
                console.log(msg);
                var jsdecode = JSON.parse(msg);
                var html = "";
                $.each(jsdecode, function(k, v) {
                    html += "<tr>";
                    html += "<td>" + (k + 1) + "</td>";
                    html += "<td>" + v[0] + "</td>";
                    html += "<td>" + v[1] + "</td>";
                    html += "<td><button type='button' onclick='editdepartment(" + v[0] + ");' class='btn btn-warning btn-sm '>เเก้ไข</button></td>";
                    html += "<td><button type='button' onclick='deldepartment(" + v[0] + ");' class='btn btn-danger btn-sm '>ลบ</button></td>";
                    html += "</tr>";
                });
                $("#data_department").empty();
                $("#data_department").append(html);

            }
        });
    }

    function adddepartment() {
        $('#modaladd').modal('show');
        $("#department_save_add").click(function() {
            $.ajax({
                type: "post",
                url: "controller/Department.php",
                data: {
                    type: "adddepartment",
                    department: $("#add_department_name").val()
                },
                success: function(msg) {
                    console.log(msg);
                    getdepartment();
                    $('#modaladd').modal('hide');
                }
            });
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
        $("#table_department").DataTable();
        getdepartment();
        $("#add_department").click(function() {
            adddepartment();
        });
    });
</script>

</html>