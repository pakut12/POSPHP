<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>

    <?php
    $mat = "4TM26S3569NB036";
 
    ?>
    <div class="container">
        <div class="card mt-3 border-dark ">
            <div class="card-header bg-dark text-white ">
                UploadExcel
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between ">
                    <div class="h3 fw-bold ">UploadExcel</div>
                    <a href="attachfile/downloadmaster/Master.xlsx"><button class="btn btn-success btn-md" id="">โหลดไฟล์ Master</button></a>
                </div>
                <form id="myForm">
                    <div class="mt-3">
                        <input type="hidden" id="type" name="type" value="uploadproduct">
                        <label for="fileexcel" class="form-label">FileExcel : </label>
                        <input class="form-control form-control-sm" id="fileexcel" name="fileexcel" type="file">
                        <div class="text-danger mt-2 text-end">* กรุณา UploadFile ที่โหลดจากโปรเเกรมเท่านั้น</div>
                        <input type="button" value="Upload" onclick="uploadFile()" class="btn btn-success btn-sm w-100 mt-3">

                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3 border-dark ">
            <div class="card-header bg-dark text-white ">
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
    function test() {
        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "test"
            },
            success: function(msg) {
                console.log(msg);
            }
        })
    }

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
                    html += "<td>" + v.date_create + "</td>";
                    html += "</tr>";
                })
                $("#data_file").empty();
                $("#data_file").html(html);
                $("#table_excel").DataTable({
                    scrollY: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'print'
                    ]
                });
            }
        });
    }

    function uploadFile() {
        var formData = new FormData();
        var file = document.getElementById('fileexcel').files[0];
        formData.append('fileexcel', file);
        formData.append('type', "uploadproduct");
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
                console.log(data);
                var js = JSON.parse(data);
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
                }


            },
            error: function(xhr, status, error) {
                console.log("Error uploading file");
            }
        });
    }

    $(document).ready(function() {
        $("#uploadproduct").addClass("active");
        test();
    });
</script>

</html>