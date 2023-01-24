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
        <div class="card mt-5  ">
            <div class="card-header ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                    <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                    <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                </svg>
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
                var groupColumn = 3;
                var table = $('#table_department').DataTable({
                    destroy: true,
                    scrollY: true,
                    columnDefs: [{
                        visible: false,
                        targets: groupColumn
                    }],
                    order: [
                        [0, 'asc']
                    ],
                    displayLength: 10,
                    drawCallback: function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api
                            .column(groupColumn, {
                                page: 'current'
                            })
                            .data()
                            .each(function(group, i) {
                                if (last !== group) {
                                    $(rows)
                                        .eq(i)
                                        .before('<tr class="group text-start" style="background-color:#ddd"><td colspan="5">' + group + '</td></tr>');
                                    last = group;
                                }
                            });
                    },
                });
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
                    if (msg == "true") {
                        Swal.fire({
                            title: "บันทึก",
                            icon: "success",
                            text: "บันทึกเรียบร้อย"
                        })
                    } else {
                        Swal.fire({
                            title: "บันทึก",
                            icon: "success",
                            text: "บันทึกไม่สำเร็จ"
                        })
                    }
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
                if (msg == "true") {
                    Swal.fire({
                        title: "บันทึก",
                        icon: "success",
                        text: "บันทึกเรียบร้อย"
                    })
                } else {
                    Swal.fire({
                        title: "บันทึก",
                        icon: "success",
                        text: "บันทึกไม่สำเร็จ"
                    })
                }
                getdepartment();
            }
        });
    }

    function deldepartment(id) {
        Swal.fire({
            title: 'ลบ',
            text: "คุณต้องการลบใช่หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ไม่',
            confirmButtonText: 'ใช่'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "controller/Department.php",
                    data: {
                        type: "deldepartment",
                        department_id: id
                    },
                    success: function(msg) {
                        if (msg == "true") {
                            Swal.fire({
                                title: "ลบ",
                                icon: "success",
                                text: "ลบเรียบร้อย"
                            })
                        } else {
                            Swal.fire({
                                title: "ลบ",
                                icon: "success",
                                text: "ลบไม่สำเร็จ"
                            })
                        }
                        getdepartment();
                    }
                });
            }
        })

    }

    $(document).ready(function() {
        $("#managesystem").addClass("active");

        getdepartment();
        $("#add_department").click(function() {
            $('#modaladd').modal('show');
            getcompany();
            $("#add_department_name").val("");
            $("#companyname").val("");
        });
        $("#department_save_add").click(function() {
            adddepartment();

        });
    });
</script>

</html>