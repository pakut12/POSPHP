<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>


</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div class="container">
        <div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลลูกค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">รหัสพนักงาน</label>
                            <input type="text" class="form-control form-control-sm text-center" id="user_code">
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">คำนำหน้า</label>
                            <select class="form-select form-select-sm text-center" id="user_prefix">
                                <option value="" selected disabled>โปรดเลือก</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control form-control-sm text-center" id="user_firstname">
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control form-control-sm text-center" id="user_lastname">
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">เเผนก</label>
                            <select class="form-select form-select-sm text-center" id="user_prefix">
                                <option value="" selected disabled>โปรดเลือก</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">บริษัท</label>
                            <select class="form-select form-select-sm text-center" id="user_prefix">
                                <option value="" selected disabled>โปรดเลือก</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12 col-md-12 text-end ">
                <button class="btn btn-primary btn-lg " id="view_user">ข้อมูลลูกค้า</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card mt-3 border-dark ">
                    <div class="card-header bg-dark text-white ">
                        ค้นหาสินค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-6  mt-3">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="basic-addon1">บาร์โค้ด</span>
                                        <input type="number" class="form-control " id="mat_barcode">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3  mt-3">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="basic-addon1">จำนวน</span>
                                        <input type="number" class="form-control " id="product_num" min="0" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 mt-3 ">
                                    <button class="btn btn-sm btn-success w-100" id="add_product"> + Add</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class='table text-nowrap ' id='tb_product'>
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
            <div class="col-sm-12 col-md-6">
                <div class="card mt-3 border-dark ">
                    <div class="card-header bg-dark text-white ">
                        ตะกร้าสินค้า
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered text-center " id="table_cart">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ราคา(หน่วย)</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคา(ทั้งหมด)</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody id="viewcart">

                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="h2">
                                        ยอดรวมทั้งหมด
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="h2 text-end" id="sumcart">
                                        0 บาท
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-sm btn-success w-100">พิมพ์ใบชำระสินค้า</button>
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
                addToCart(js.product_mat_no, js.product_mat_name_th, js.product_sale_price, js.product_size_id, js.product_color_id, $("#product_num").val());
                $("#table_product").empty();
                $("#table_product").append(html);
                $("#tb_product").DataTable();
            }
        })
    }

    const cart = [];


    function addToCart(product_no, product_name, product_price, product_size, product_color, product_num) {

        for (let i = 0; i < cart.length; i++) {
            if (cart[i].no === product_no) {
                cart[i].num = (parseInt(cart[i].num) + parseInt(product_num));
                cart[i].total = (parseFloat(cart[i].num) * parseFloat(product_price)).toFixed(2);
                displayCart();

                return;
            }
        }

        cart.push({
            no: product_no,
            name: product_name,
            price: product_price,
            size: product_size,
            color: product_color,
            num: product_num,
            total: (parseFloat(product_num) * parseFloat(product_price)).toFixed(2)
        });

        displayCart();
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        displayCart();
    }

    function editQuantity(index, price) {
        cart[index].num = "3";
        displayCart();
    }

    function displayCart() {
        var sum = 0;
        let output = '';
        for (let i = 0; i < cart.length; i++) {
            output += "<tr>";
            output += "<td>" + (i + 1) + "</td>";
            output += "<td>" + cart[i].no + "</td>";
            output += "<td>" + cart[i].price + "</td>";
            output += "<td>" + cart[i].num + "</td>";
            output += "<td>" + cart[i].total + "</td>";
            output += "<td><button type='button' class='btn btn-danger btn-sm' onclick='removeFromCart(" + i + ")'>ลบ</button></td>";
            output += "</tr>";
            sum = (parseFloat(sum) + parseFloat(cart[i].total)).toFixed(2);
        }
        $("#sumcart").text(sum + " บาท");
        $("#viewcart").html(output);
        var table = $("#table_cart").DataTable({
            retrieve: true,
            "searching": false,
            "paging": false,
            "ordering": false,
            "info": false,
            "columns": [{
                    "width": "16%"
                },
                {
                    "width": "16%"
                },
                {
                    "width": "16%"
                },
                {
                    "width": "16%"
                },
                {
                    "width": "16%"
                },
                {
                    "width": "16%"
                }
            ],
            "scrollY": "40vh",
            "scrollCollapse": true,

        });

    }

    $(document).ready(function() {
        $("#modaluser").modal('show');
        $("#pospage").addClass("active");
        $("#add_product").click(function() {
            getproduct();
        });

        $("#view_user").click(function() {
            $("#modaluser").modal('show');
        });

    });
</script>

</html>