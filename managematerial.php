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
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="myform">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">MaterialGroup</label>
                            <input type="text" class="form-control form-control-sm text-center" id="add_material_group" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">MaterialName</label>
                            <input type="text" class="form-control form-control-sm text-center" id="add_material_name" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="material_save_add" onclick="AddMaterial()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">MaterialNo</label>
                        <input type="text" class="form-control form-control-sm text-center" id="edit_material_id" placeholder="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">MaterialGroup</label>
                        <input type="text" class="form-control form-control-sm text-center" id="edit_material_group" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">MaterialName</label>
                        <input type="text" class="form-control form-control-sm text-center" id="edit_material_name" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="material_save_edit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-5 ">
            <div class="card-header  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pass" viewBox="0 0 16 16">
                    <path d="M5.5 5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5Zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Z" />
                    <path d="M8 2a2 2 0 0 0 2-2h2.5A1.5 1.5 0 0 1 14 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-13A1.5 1.5 0 0 1 3.5 0H6a2 2 0 0 0 2 2Zm0 1a3.001 3.001 0 0 1-2.83-2H3.5a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-1.67A3.001 3.001 0 0 1 8 3Z" />
                </svg>
                Material
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="h3 fw-bold">ManageMaterial</div>
                </div>
                <div class="text-end">
                    <button class="btn btn-lg btn-success" id="add_material"> + Add</button>
                </div>
                <br>
                <div class="table-responsive ">
                    <table class="table text-nowrap" id="table_material">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>MaterialNo</th>
                                <th>MaterialGroup</th>
                                <th>MaterialName</th>
                                <th>Edit</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody id="data_material">

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
    function EditMaterial(material_id, material_name, material_group) {
        $('#modaledit').modal('show');
        $("#edit_material_id").val(material_id);
        $("#edit_material_group").val(material_group);
        $("#edit_material_name").val(material_name);


    }

    function updateMaterial(id) {
        $.ajax({
            type: "post",
            url: "controller/Material.php",
            data: {
                type: "updatematerial",
                material_id: $("#edit_material_id").val(),
                material_name: $("#edit_material_name").val(),
                material_group: $("#edit_material_group").val()
            },
            success: function(msg) {
                var js = JSON.parse(msg);
                if (js.status == "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'เเก้ไข',
                        text: 'เเก้ไขเรียบร้อย'
                    });
                } else if (js.status == "false") {
                    Swal.fire({
                        icon: 'error',
                        title: 'เเก้ไข',
                        text: 'เเก้ไขไม่สำเร็จ'
                    });
                }
                GetMaterial();
                $('#modaledit').modal('hide');
            }
        });
    }

    function DelMaterial(material_id) {
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
                    url: "controller/Material.php",
                    data: {
                        type: "delmaterial",
                        material_id: material_id
                    },
                    success: function(msg) {
                        var js = JSON.parse(msg);
                        if (js.status == "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบข้อมูล',
                                text: 'ลบสำเร็จ'
                            });
                        } else if (js.status == "false") {
                            Swal.fire({
                                icon: 'error',
                                title: 'ลบข้อมูล',
                                text: 'ลบไม่สำเร็จ'
                            });
                        }
                        GetMaterial()
                    }
                });
            }
        })

    }

    function AddMaterial() {
        var material_name = $("#add_material_name").val();
        var material_group = $("#add_material_group").val();

        if (!material_name || !material_group) {
            $("#myform").addClass('was-validated');
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                text: 'กรุณากรอกข้อมูลให้ถูกต้อง'
            });
        } else {
            $.ajax({
                type: "post",
                url: "controller/Material.php",
                data: {
                    type: "addmaterial",
                    material_name: $("#add_material_name").val(),
                    material_group: $("#add_material_group").val()
                },
                success: function(msg) {
                    var js = JSON.parse(msg);
                    if (js.status == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกข้อมูล',
                            text: 'บันทึกสำเร็จ'
                        });
                    } else if (js.status == "false") {
                        Swal.fire({
                            icon: 'error',
                            title: 'บันทึกข้อมูล',
                            text: 'บันทึกไม่สำเร็จ'
                        });
                    }
                    $('#modaladd').modal('hide');
                    $("#add_material_name").val("");
                    $("#add_material_group").val("");
                    GetMaterial();
                }
            });
        }
    }

    function GetMaterial() {
        $.ajax({
            type: "post",
            url: "controller/Material.php",
            data: {
                type: "getmaterial"
            },
            success: function(msg) {
                var jsdecode = JSON.parse(msg);
                var html = "";
                $.each(jsdecode, function(k, v) {
                    var material_name = '"' + v.material_name + '"';
                    var material_group = '"' + v.material_group + '"';


                    html += "<tr>";
                    html += "<td>" + (k + 1) + "</td>";
                    html += "<td>" + v.material_id + "</td>";
                    html += "<td>" + v.material_group + "</td>";
                    html += "<td>" + v.material_name + "</td>";
                    html += "<td><button type='button' onclick='EditMaterial(" + v.material_id + "," + material_name + "," + material_group + ");' class='btn btn-warning btn-sm '>เเก้ไข</button></td>";
                    html += "<td><button type='button' onclick='DelMaterial(" + v.material_id + ");' class='btn btn-danger btn-sm '>ลบ</button></td>";
                    html += "</tr>";
                });
                $("#data_material").empty();
                $("#data_material").append(html);
                $("#table_material").DataTable();
            }
        });
    }

    $(document).ready(function() {
        $("#managesystem").addClass("active");

        $("#add_material").click(function() {
            $('#modaladd').modal('show');
        });

        $("#material_save_edit").click(function() {
            var id = $("#edit_material_id").val();
            updateMaterial(id);

        });

        GetMaterial();
    });
</script>

</html>