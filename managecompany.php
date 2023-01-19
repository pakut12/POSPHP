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
        <div class="card mt-5 border-dark ">
            <div class="card-header bg-dark text-white ">
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
                    <table class="table text-nowrap" id="table_company">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสบริษัท</th>
                                <th>ชื่อบริษัท</th>
                                <th>เเก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody id="data_company">

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
                    $('#modaladd').modal('hide');
                    getcompany();
                }
            });
        }


    }

    function delcompany(id) {
        $.ajax({
            type: "post",
            url: "controller/Company.php",
            data: {
                type: "delcompany",
                company_id: id
            },
            success: function(msg) {
                console.log(msg);
                getcompany();
            }
        });
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
                console.log(msg);
                getcompany();
            }
        });
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
                    html += "<tr>";
                    html += "<td>" + (k + 1) + "</td>";
                    html += "<td>" + v[0] + "</td>";
                    html += "<td>" + v[1] + "</td>";
                    html += "<td><button type='button' onclick='editcompany(" + v[0] + ");' class='btn btn-warning btn-sm '>เเก้ไข</button></td>";
                    html += "<td><button type='button' onclick='delcompany(" + v[0] + ");' class='btn btn-danger btn-sm '>ลบ</button></td>";
                    html += "</tr>";
                });
                $("#data_company").empty();
                $("#data_company").append(html);
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