<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>

    <div class="container">
        <div class="card mt-5 border-dark ">
            <div class="card-header bg-dark text-white ">
                UploadExcel
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">FileExcel</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
            </div>
        </div>
        <div class="card mt-5 border-dark ">
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
    function getproduct() {
        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "getproduct"
            },
            success: function(msg) {
                var js = JSON.parse(msg);
                console.log(js[0]);
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
                    scrollY: true
                });

            }
        });
    }

    $(document).ready(function() {
        $("#uploadproduct").addClass("active");
        getproduct();
    });
</script>

</html>