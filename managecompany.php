<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
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
                            <label for="user_id" class="form-label">ชื่อบริษัท</label>
                            <input type="text" class="form-control form-control-sm text-center" id="add_company_name" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="company_save_add">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เเก้ไขข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">รหัสบริษัท</label>
                        <input type="text" class="form-control form-control-sm text-center" id="company_id" placeholder="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">ชื่อบริษัท</label>
                        <input type="text" class="form-control form-control-sm text-center" id="company_name" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="company_save_edit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-5 ">
            <div class="card-header  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                </svg>
                Company
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="h3 fw-bold">ManageCompany</div>
                </div>
                <div class="text-end">
                    <button class="btn btn-lg btn-success" id="add_company"> + เพิ่ม</button>
                </div>
                <br>
                <div class="table-responsive ">
                    <div id="company_table">

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
    function addcompany() {
        var company_name = $("#add_company_name").val();
        if (!company_name) {
            $("#myform").addClass('was-validated');
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                text: 'กรุณากรอกข้อมูลให้ถูกต้อง'
            });
        } else {
            $.ajax({
                type: "post",
                url: "controller/Company.php",
                data: {
                    type: "addcompany",
                    company: $("#add_company_name").val()
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
                    $('#modaladd').modal('hide');
                    getcompany();
                    $("#add_company_name").val("")
                }
            });
        }


    }

    function delcompany(id) {
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
                    url: "controller/Company.php",
                    data: {
                        type: "delcompany",
                        company_id: id
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
                        getcompany();
                    }
                });
            }
        })

    }

    function editcompany(id) {
        $.ajax({
            type: "post",
            url: "controller/Company.php",
            data: {
                type: "getcompanybyid",
                company_id: id
            },
            success: function(msg) {
                var jsdecode = JSON.parse(msg);
                $('#company_id').val(jsdecode[0][0]);
                $('#company_name').val(jsdecode[0][1]);
                $('#modaledit').modal('show');
                $("#company_save_edit").click(function() {
                    var id = $("#company_id").val();
                    var company = $("#company_name").val();
                    updatecompany(id, company);
                    $('#modaledit').modal('hide');
                })
            }
        });

    }

    function updatecompany(id, company) {
        $.ajax({
            type: "post",
            url: "controller/Company.php",
            data: {
                type: "updatecompany",
                company_id: id,
                company_name: company
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
                getcompany();
            }
        });
    }

    function getcompany() {
        $.ajax({
            type: "post",
            url: "controller/Company.php",
            data: {
                type: "gettablecompany"
            },
            success: function(msg) {
                $("#company_table").html(msg);
                $("#table_company").DataTable();
            }
        });
    }
    $(document).ready(function() {
        $("#managecompany").addClass("active");

        getcompany();
        $("#add_company").click(function() {
            $('#modaladd').modal('show');
        });
        $('#company_save_add').click(function() {
            addcompany();
        });
    });
</script>

</html>