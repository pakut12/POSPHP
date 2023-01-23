<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>

    <div class="container">
        <div class="card mt-3  ">
            <div class="card-header  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                </svg>
                UploadExcel
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between ">
                    <div class="h3 fw-bold ">UploadExcel</div>
                    <a href="attachfile/downloadmaster/Master.xlsx"><button class="btn btn-success btn-md" id="">โหลดไฟล์ Master</button></a>
                </div>
                <form id="myForm" class="">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="mt-3">
                                <label for="asd" class="form-label">MaterialGroup : </label>
                                <select class="form-select form-select-sm text-center" id="materialgroup" name="materialgroup" required>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mt-3">
                                <input type="hidden" id="type" name="type" value="uploadproduct">
                                <label for="fileexcel" class="form-label">FileExcel : </label>
                                <input class="form-control form-control-sm" id="fileexcel" name="fileexcel" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                                <div class="text-danger mt-2 text-center">* กรุณา UploadFile ที่โหลดจากโปรเเกรมเท่านั้น</div>
                            </div>
                        </div>
                    </div>
                    <input type="button" value="Upload" id="uploadFile" name="uploadFile" class="btn btn-success btn-sm w-100 mt-3">
                </form>
            </div>
        </div>
        <div class="card mt-3  ">
            <div class="card-header  ">
                ProductList
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered text-nowrap" id="table_excel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NoGroup</th>
                                <th>NoMat</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Price Vat</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="data_file">
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
    function getproduct(id) {
        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "getproduct",
                groupid: id
            },
            success: function(msg) {
                var js = JSON.parse(msg);
                var html = "";
                $.each(js, function(k, v) {
                    html += "<tr>";
                    html += "<td>" + v.product_id + "</td>";
                    html += "<td>" + v.product_group + "</td>";
                    html += "<td>" + v.product_mat_no + "</td>";
                    html += "<td>" + v.product_mat_barcode + "</td>";
                    html += "<td>" + v.product_mat_name_th + "</td>";
                    html += "<td>" + v.product_color_id + "</td>";
                    html += "<td>" + v.product_size_id + "</td>";
                    html += "<td>" + v.product_sale_price + "</td>";
                    html += "<td>" + v.product_sale_vat + "</td>";
                    html += "<td>" + v.date_create + "</td>";
                    html += "</tr>";
                })
                $("#data_file").empty();
                $("#data_file").html(html);
                $("#table_excel").DataTable({
                    retrieve: true,
                    scrollY: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'print'
                    ]
                });
            }
        });
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
                console.log(jsdecode);
                var html = "";
                html += "<option value='' selected disabled>โปรดเลือก</option>";
                $.each(jsdecode, function(k, v) {
                    html += "<option value='" + v.material_id + "'>" + v.material_name + "</option>";
                });
                $("#materialgroup").empty();
                $("#materialgroup").append(html);
            }
        });
    }

    function uploadFile() {

        if ($('#fileexcel').get(0).files.length === 0 || $("#materialgroup").val() == "") {
            $("#myForm").addClass("was-validated");
            Swal.fire({
                title: 'ผิดพลาด',
                icon: 'error',
                text: 'กรุณากรอกข้อมูลให้ถูกต้อง'
            })

        } else {
            var formData = new FormData();
            var file = document.getElementById('fileexcel').files[0];
            formData.append('fileexcel', file);
            formData.append('type', "uploadproduct");
            formData.append('materialgroup', $("#materialgroup").val());

            $.ajax({
                url: 'controller/Product.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            //console.log(percentComplete + '% uploaded');
                        }
                    }, false);
                    return xhr;
                },
                success: function(data) {

                    var js = JSON.parse(data);
                    console.log(js);
                    if (js.status == "true") {
                        Swal.fire({
                            title: "เรียบร้อย",
                            icon: "success",
                            text: "Upload File เรียบร้อย"
                        })
                        getproduct(js.groupid);
                    } else if (js.status == "false") {
                        Swal.fire({
                            title: "ผิดพลาด",
                            icon: "error",
                            text: "ไม่สามารถ Upload File ได้"
                        })
                    } else if (js.status == "updatetrue") {
                        Swal.fire({
                            title: "เรียบร้อย",
                            icon: "success",
                            text: "Update Product เรียบร้อย"
                        })
                        getproduct(js.groupid);
                    }

                },
                error: function(xhr, status, error) {
                    console.log("Error uploading file");
                }
            });
        }
    }

    $(document).ready(function() {
        $("#uploadproduct").addClass("active");
        $("#uploadFile").click(function() {
            uploadFile();
        });
        GetMaterial();
    });
</script>

</html>