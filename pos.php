<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card mt-5 border-dark ">
                    <div class="card-header bg-dark text-white ">
                        ข้อมูลลูกค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mx-auto">
                                <div class="col-sm-12 col-md-2  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">รหัสพนักงาน</label>
                                    <input type="text" id="user_id" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-12 col-md-2  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">คำนำหน้า</label>
                                    <select class="form-select form-select-sm" id="user_prefix">
                                        <option value="" selected disabled>โปรดเลือก</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-2  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                                    <input type="text" id="user_firstname" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-12 col-md-2  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">สกุล</label>
                                    <input type="text" id="user_lastname" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-12 col-md-2  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">เเผนก</label>
                                    <select class="form-select form-select-sm" name="" id="department_id">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-2  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">บริษัท</label>
                                    <select class="form-select form-select-sm" id="company_id">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card mt-5 border-dark ">
                    <div class="card-header bg-dark text-white ">
                        ค้นหาสินค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-4  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">ค้นหาสินค้า</label>
                                    <input type="text" id="mat_barcode" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-12 col-md-4  mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">จำนวน</label>
                                    <input type="number" id="product_num" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-12 col-md-4  mt-3 text-center">
                                    <button class="btn btn-lg btn-success mt-3 w-50" id="add_product"> + Add</button>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class='table' id='tb_product'>
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>รหัสสินค้า</th>
                                            <th>บาร์โค้ดสินค้า</th>
                                            <th>รายละเอียดสินค้า</th>
                                            <th>สี</th>
                                            <th>ไซร์</th>
                                            <th>ราคา</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_product" class="mt-5">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card mt-5 border-dark ">
                    <div class="card-header bg-dark text-white ">
                        ตะกร้าสินค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="table-responsive">
                                <div class="" style="height: 30vh;">
                                    <table class="table overflow-auto" id="table_sumproduct">
                                        <thead>
                                            <tr>
                                                <th scope="col">สินค้า</th>
                                                <th scope="col">ราคา</th>
                                                <th scope="col">จำนวน</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="d-flex justify-content-between">
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-success">พิมพ์ใบชำระสินค้า</button>
                                    </div>
                                    <div class="">
                                        ยอดรวม 0
                                    </div>
                                </div>
                            </div>
                        </div>
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
    function getproduct() {
        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "searchproduct",
                barcode: $("#mat_barcode").val()
            },
            success: function(msg) {

                var js = JSON.parse(msg);
                var html = '';
                html += '<tr>';
                html += '<td>' + js.product_id + '</td>';
                html += '<td>' + js.product_mat_no + '</td>';
                html += '<td>' + js.product_mat_barcode + '</td>';
                html += '<td>' + js.product_mat_name_th + '</td>';
                html += '<td>' + js.product_color_id + '</td>';
                html += '<td>' + js.product_size_id + '</td>';
                html += '<td>' + js.product_sale_price + '</td>';
                html += '</tr>';
                $("#table_product").empty();
                $("#table_product").append(html);

                $("#tb_product").DataTable();

            }
        })
    }

    $(document).ready(function() {
        $("#pospage").addClass("active");
        $("#mat_barcode").change(function() {
            getproduct();
        });


    });
</script>

</html>