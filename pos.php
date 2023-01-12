<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div class="container">
        <div class="modal fade" id="modalcustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลลูกค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div id="myform">
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">รหัสพนักงาน</label>
                                <input type="text" class="form-control form-control-sm text-center" id="customer_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">คำนำหน้า</label>
                                <select class="form-select form-select-sm text-center" id="customer_prefix" required>
                                    <option value="" selected disabled>โปรดเลือก</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control form-control-sm text-center" id="customer_firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control form-control-sm text-center" id="customer_lastname" required>
                            </div>
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">เเผนก</label>
                                <input class="form-control form-control-sm text-center" list="departmentlist" autocomplete="off" name="departmentname" id="departmentname" required>
                                <datalist id="departmentlist">

                                </datalist>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12 col-md-12 text-end ">
                <button class="btn btn-primary btn-lg " id="view_customer">ข้อมูลลูกค้า</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card mt-3 border-dark ">
                    <div class="card-header bg-dark text-white ">
                        ค้นหาสินค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12  mt-3">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="basic-addon1">บาร์โค้ด</span>
                                        <input type="number" class="form-control " id="mat_barcode">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
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
                                <div class="col-sm-12 col-md-9">
                                    <div class="text-end ">
                                        ราคาสินค้า
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class=" text-center">
                                        <div id="cart_product">0</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class=" text-end">
                                        บาท
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-9">
                                    <div class="text-end ">
                                        ภาษีมูลค่าเพิ่ม 7 %
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class=" text-center">
                                        <div id="cart_totalvat">0</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class=" text-end">
                                        บาท
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-9">
                                    <div class="text-end ">
                                        รวมทั้งสิ้น
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class=" text-center">
                                        <div id="cart_total">0</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class=" text-end">
                                        บาท
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-sm btn-primary w-100 mt-3" id="confirm_order">ยืนยัน Order</button>
                                <button class="btn btn-sm btn-success w-100 mt-3 " id="print_order" disabled>พิมพ์ใบชำระสินค้า</button>
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

                if (msg) {
                    var js = JSON.parse(msg);
                    addToCart(js.product_mat_no, js.product_mat_name_th, js.product_sale_price, js.product_size_id, js.product_color_id, 1, js.product_sale_vat);
                    $("#tb_product").DataTable();
                } else {
                    Swal.fire({
                        title: "ผิดพลาด",
                        text: "ไม่พบข้อมูล",
                        icon: "error"
                    })
                }
            }
        })
    }

    const cart = [];

    function addToCart(product_no, product_name, product_price, product_size, product_color, product_num, product_sale_vat) {

        for (let i = 0; i < cart.length; i++) {
            if (cart[i].no === product_no) {
                cart[i].num = (parseInt(cart[i].num) + parseInt(product_num));
                cart[i].totalproduct = (parseFloat(cart[i].num) * parseFloat(product_price)).toFixed(2).toLocaleString('en-US');
                cart[i].totalvat = (parseFloat(cart[i].num) * (parseFloat(product_sale_vat) - parseFloat(product_price))).toFixed(2).toLocaleString('en-US');
                cart[i].total = (parseFloat(cart[i].num) * parseFloat(product_sale_vat)).toFixed(2).toLocaleString('en-US');

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
            pricevat: product_sale_vat,
            vat: (parseFloat(product_sale_vat) - parseFloat(product_price)).toFixed(2).toLocaleString('en-US'),
            totalproduct: (parseFloat(product_num) * parseFloat(product_price)).toFixed(2).toLocaleString('en-US'),
            totalvat: (parseFloat(product_sale_vat) - parseFloat(product_price)).toFixed(2).toLocaleString('en-US'),
            total: (parseFloat(product_num) * parseFloat(product_sale_vat)).toFixed(2).toLocaleString('en-US')
        });
        displayCart();
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        displayCart();
    }

    function editQuantity(index, status) {
        if (status == 1) {
            cart[index].num = (parseInt(cart[index].num) + 1);
            cart[index].totalproduct = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
            cart[index].totalvat = (parseFloat(cart[index].num) * parseFloat(cart[index].vat)).toFixed(2).toLocaleString('en-US');
            cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].pricevat)).toFixed(2).toLocaleString('en-US');

            //cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2);
        } else if (status == 2) {
            cart[index].num = (parseInt(cart[index].num) - 1);
            cart[index].totalproduct = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
            cart[index].totalvat = (parseFloat(cart[index].num) * parseFloat(cart[index].vat)).toFixed(2).toLocaleString('en-US');
            cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].pricevat)).toFixed(2).toLocaleString('en-US');

            //cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2);
        }

        displayCart();
    }

    function numberformat(number) {
        var format = new Intl.NumberFormat('en-US').format(number);
        return format;
    }

    function displayCart() {
        var sumproduct = 0;
        var sumtotalvat = 0;
        var sumtotal = 0;
        let output = '';

        for (let i = 0; i < cart.length; i++) {
            output += "<tr>";
            output += "<td>" + (i + 1) + "</td>";
            output += "<td>" + cart[i].no + "</td>";
            output += "<td>" + cart[i].price + "</td>";
            output += "<td><button type='button' class='btn btn-primary btn-sm' onclick='editQuantity(" + i + ",2)'>-</button> " + cart[i].num + " <button type='button' class='btn btn-primary btn-sm' onclick='editQuantity(" + i + ",1)'>+</button></td>";
            output += "<td>" + numberformat(cart[i].total) + "</td>";
            output += "<td><button type='button' class='btn btn-danger btn-sm' onclick='removeFromCart(" + i + ")'>ลบ</button></td>";
            output += "</tr>";
            sumproduct = (parseFloat(sumproduct) + parseFloat(cart[i].totalproduct)).toFixed(2);
            sumtotalvat = (parseFloat(sumtotalvat) + parseFloat(cart[i].totalvat)).toFixed(2);
            sumtotal = (parseFloat(sumtotal) + parseFloat(cart[i].total)).toFixed(2);
        }

        $("#cart_product").text(numberformat(sumproduct));
        $("#cart_totalvat").text(numberformat(sumtotalvat));
        $("#cart_total").text(numberformat(sumtotal));

        $("#viewcart").html(output);
        var table = $("#table_cart").DataTable({
            retrieve: true,
            "searching": false,
            "paging": false,
            "ordering": false,
            "info": false,
            "scrollY": "40vh",
            "scrollCollapse": true
        });
    }

    function getdepartment() {
        $.ajax({
            type: "post",
            url: "controller/Department.php",
            data: {
                type: "getdepartment"
            },
            success: function(msg) {

                var jsdecode = JSON.parse(msg);
                var html = "";

                $.each(jsdecode, function(k, v) {
                    html += "<option value='" + v[0] + "'>" + v[1] + "</option>";
                });
                $("#departmentlist").empty();
                $("#departmentlist").append(html);
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
                    html += "<option value='" + v[0] + "'>" + v[1] + "</option>";
                });
                $("#companylist").empty();
                $("#companylist").append(html);
            }
        });
    }

    function confirmorder() {

        if (!$("#customer_code").val() || !$("#customer_prefix").val() || !$("#customer_firstname").val() || !$("#customer_lastname").val() || !$("#departmentname").val() || !$("#companyname").val()) {
            $("#myform").addClass("was-validated");
            $("#modalcustomer").modal('show');
        } else {

            var listcustomer = {
                customercode: $("#customer_code").val(),
                customerprefix: $("#customer_prefix").val(),
                customerfirstname: $("#customer_firstname").val(),
                customerlastname: $("#customer_lastname").val(),
                departmentlist: $("#departmentname").val(),
                companylist: $("#companyname").val()
            }

            $.ajax({
                type: "post",
                url: "Test.php",
                data: {
                    listcart: cart,
                    listcustomer:listcustomer
                },
                success: function(msg) {
                    console.log(msg);
                }
            });
            
        }
    }

    $(document).ready(function() {
        $("#modalcustomer").modal('show');
        $("#pospage").addClass("active");
        $("#add_product").click(function() {
            getproduct();
        });
        $("#mat_barcode").on('input', function() {
            if ($(this).val()) {
                getproduct();
            }
        });
        getdepartment();
        getcompany();
        $("#view_customer").click(function() {
            $("#modalcustomer").modal('show');
        });
        $("#confirm_order").click(function() {
            confirmorder()
        });
    });
</script>

</html>