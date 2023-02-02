<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>


    <div class="container">
        <div class="modal fade" id="modalprint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">พิมพ์มัดจำ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-evenly mb-3">
                            <div class="fw-bold">DocID : </div>
                            <div id="docid"></div>
                            <div class="fw-bold">Date : </div>
                            <div class="text-center"><?= date("Y-m-d h:i:s") ?></div>
                        </div>
                        <table class="table table-sm text-center w-100 h-25" id="table_print">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ราคา(หน่วย)</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคา(ทั้งหมด)</th>
                                </tr>
                            </thead>
                            <tbody id="viewprint">

                            </tbody>
                        </table>
                        <div class="row mt-3 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2 fw-bold">ราคาสินค้า</div>
                                        <div class="p-2 fw-bold">
                                            <div id="print_product" class="fw-bold text-primary">0</div>
                                        </div>
                                        <div class="p-2 fw-bold">บาท</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2 fw-bold">ภาษีมูลค่าเพิ่ม 7 %</div>
                                        <div class="p-2 ">
                                            <div id="print_totalvat" class="fw-bold text-danger">0</div>
                                        </div>
                                        <div class="p-2 fw-bold">บาท</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2 fw-bold">รวมทั้งสิ้น</div>
                                        <div class="p-2 ">
                                            <div id="print_total" class="fw-bold text-success">0</div>
                                        </div>
                                        <div class="p-2 fw-bold">บาท</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-success" id="printout">พิมพ์</button>
                        <button type="button" class="btn btn-primary" id="finishorder" onclick="cleanorder();">เสร็จสิ้น</button>
                    </div>
                </div>
            </div>
        </div>
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
                                <label for="customer_id" class="form-label">เพศ</label>
                                <select class="form-select form-select-sm text-center" id="customer_gender" required>
                                    <option value="" selected disabled>โปรดเลือก</option>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                    <option value="-">ไม่ระบุ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">คำนำหน้า</label>
                                <select class="form-select form-select-sm text-center" id="customer_prefix" required>
                                    <option value="" selected disabled>โปรดเลือก</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="ว่าที่ร้อยตรี">ว่าที่ร้อยตรี</option>
                                    <option value="-">ไม่ระบุ</option>
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
                                <label for="customer_id" class="form-label">เบอร์โทร</label>
                                <input type="text" class="form-control form-control-sm text-center" id="customer_phone" maxlength="10" size="10" pattern="[0-9]{10}" required>
                            </div>

                            <div class="mb-3">
                                <label for="customer_id" class="form-label">บริษัท</label>
                                <input class="form-control form-control-sm text-center" list="companylist" autocomplete="off" name="companyname" id="companyname" required>
                                <datalist id="companylist">
                                </datalist>
                            </div>
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">เเผนก</label>
                                <input class="form-control form-control-sm text-center" list="departmentlist" autocomplete="off" name="departmentname" id="departmentname" disabled required>
                                <datalist id="departmentlist">
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
                <div class="card mt-3 ">
                    <div class="card-header  ">
                        ค้นหาสินค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 ">
                                    <div class="input-group input-group-sm mt-3">
                                        <span class="input-group-text" id="basic-addon1">SizeOther</span>
                                        <input type="text" class="form-control text-center" id="size_other" value="000" maxlength="3" minlength="3" pattern=".{3}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12  mt-3">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="basic-addon1">Barcode</span>
                                        <input type="text" class="form-control text-center" id="mat_barcode" onclick="this.select();" maxlength="13" minlength="13" pattern=".{13}" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="card mt-3 ">
                    <div class="card-header  ">
                        ตะกร้าสินค้า
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered text-center w-100" id="table_cart">
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
                        <div class="row mt-3 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2 fw-bold">ราคาสินค้า</div>
                                        <div class="p-2 fw-bold">
                                            <div id="cart_product" class="fw-bold text-primary">0</div>
                                        </div>
                                        <div class="p-2 fw-bold">บาท</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2 fw-bold">ภาษีมูลค่าเพิ่ม 7 %</div>
                                        <div class="p-2 ">
                                            <div id="cart_totalvat" class="fw-bold text-danger">0</div>
                                        </div>
                                        <div class="p-2 fw-bold">บาท</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2 fw-bold">รวมทั้งสิ้น</div>
                                        <div class="p-2 ">
                                            <div id="cart_total" class="fw-bold text-success">0</div>
                                        </div>
                                        <div class="p-2 fw-bold">บาท</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-sm btn-primary w-100 mt-3" id="confirm_order">ยืนยัน Order</button>
                                <button class="btn btn-sm btn-success w-100 mt-3 " id="print_order" disabled>พิมพ์ใบมัดจำ</button>
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
    const cart = [];

    function displayprint() {
        var sumproduct = 0;
        var sumtotalvat = 0;
        var sumtotal = 0;
        let output = '';

        for (let i = 0; i < cart.length; i++) {
            output += "<tr>";
            output += "<td>" + (i + 1) + "</td>";
            output += "<td>" + cart[i].no + "</td>";
            output += "<td>" + cart[i].price + "</td>";
            output += "<td>" + cart[i].num + "</td>";
            output += "<td>" + numberformat(cart[i].totalpricenovat) + "</td>";
            output += "</tr>";
            sumproduct = (parseFloat(sumproduct) + parseFloat(cart[i].totalproduct)).toFixed(2);
            sumtotalvat = (parseFloat(sumtotalvat) + parseFloat(cart[i].totalvat)).toFixed(2);
            sumtotal = (parseFloat(sumtotal) + parseFloat(cart[i].total)).toFixed(2);
        }

        $("#print_product").text(numberformat(sumproduct));
        $("#print_totalvat").text(numberformat(sumtotalvat));
        $("#print_total").text(numberformat(sumtotal));

        $("#viewprint").html(output);

    }


    function getproduct() {

        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "searchproduct",
                barcode: $("#mat_barcode").val()
            },
            success: function(msg) {
                console.log(msg);
                if (msg) {
                    var js = JSON.parse(msg);
                    var size_other = $("#size_other").val();
                    addToCart(js.product_id, js.product_mat_no + size_other, js.product_mat_name_th, js.product_sale_price, js.product_size_id, js.product_color_id, 1, js.product_sale_vat);
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



    function addToCart(product_id, product_no, product_name, product_price, product_size, product_color, product_num, product_sale_vat) {

        for (let i = 0; i < cart.length; i++) {
            if (cart[i].no === product_no) {
                cart[i].num = (parseInt(cart[i].num) + parseInt(product_num));
                cart[i].totalproduct = (parseFloat(cart[i].num) * parseFloat(product_price)).toFixed(2).toLocaleString('en-US');
                cart[i].totalvat = (parseFloat(cart[i].num) * (parseFloat(product_sale_vat) - parseFloat(product_price))).toFixed(2).toLocaleString('en-US');
                cart[i].total = (parseFloat(cart[i].num) * parseFloat(product_sale_vat)).toFixed(2).toLocaleString('en-US');
                cart[i].totalpricenovat = (parseFloat(cart[i].num) * parseFloat(cart[i].price)).toFixed(2).toLocaleString('en-US');
                displayCart();
                return;
            }
        }
        cart.push({
            id: product_id,
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
            total: (parseFloat(product_num) * parseFloat(product_sale_vat)).toFixed(2).toLocaleString('en-US'),
            totalpricenovat: (parseFloat(product_num) * parseFloat(product_price)).toFixed(2).toLocaleString('en-US')
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
            cart[index].totalpricenovat = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');

            //cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2);
        } else if (status == 2) {
            cart[index].num = (parseInt(cart[index].num) - 1);
            cart[index].totalproduct = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
            cart[index].totalvat = (parseFloat(cart[index].num) * parseFloat(cart[index].vat)).toFixed(2).toLocaleString('en-US');
            cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].pricevat)).toFixed(2).toLocaleString('en-US');
            cart[index].totalpricenovat = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');

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
            output += "<td>" + numberformat(cart[i].totalpricenovat) + "</td>";
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
        displayprint();
    }

    function getdepartment() {

        $.ajax({
            type: "post",
            url: "controller/Department.php",
            data: {
                type: "getdepartmentbycompanyid",
                company_id: $("#companyname").val()
            },
            success: function(msg) {

                var jsdecode = JSON.parse(msg);
                if (jsdecode.length > 0) {
                    $("#departmentname").attr("disabled", false);
                    var html = "";
                    $.each(jsdecode, function(k, v) {
                        html += "<option value='" + v.department_id + "'>" + v.department_name + "</option>";
                    });
                    $("#departmentlist").empty();
                    $("#departmentlist").append(html);
                } else {
                    $("#departmentlist").empty();
                    $("#departmentname").attr("disabled", true);
                }
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

    function cleanorder() {
        $("#confirm_order").attr("disabled", false);
        cart.length = 0;
        $("#myform").removeClass("was-validated");
        $("#mat_barcode").val("");
        $("#customer_code").val("");
        $("#customer_prefix").val("");
        $("#customer_phone").val("");
        $("#customer_firstname").val("");
        $("#customer_lastname").val("");
        $("#departmentname").val("");
        $("#docid").empty("");
        $("#print_order").attr("disabled", true);
        displayCart();
        $("#modalprint").modal('hide');
        $("#modalcustomer").modal('show');
    }

    function printout(id) {
        window.open('distplayprint.php?docid=' + id, '_blank', 'height=600,width=800,left=200,top=200');
    }

    function confirmorder() {
        if (cart.length > 0) {
            if ($("#customer_phone").val().length != 10 || !$("#customer_phone").val() || !$("#customer_code").val() || !$("#customer_prefix").val() || !$("#customer_firstname").val() || !$("#customer_lastname").val() || !$("#departmentname").val() || !$("#companyname").val()) {
                $("#myform").addClass("was-validated");
                $("#modalcustomer").modal('show');
                Swal.fire({
                    title: "ผิดพลาด",
                    icon: "error",
                    text: "กรุณากรอกข้อมูลให้ถูกต้อง"
                })
            } else {
                Swal.fire({
                    title: 'ยืนยัน',
                    text: "ต้องการยืนยันใช่หรือไม่",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var listcustomer = {
                            customercode: $("#customer_code").val(),
                            customergender: $("#customer_gender").val(),
                            customerprefix: $("#customer_prefix").val(),
                            customerfirstname: $("#customer_firstname").val(),
                            customerlastname: $("#customer_lastname").val(),
                            customerphone: $("#customer_phone").val(),
                            departmentlist: $("#departmentname").val(),
                            companylist: $("#companyname").val()
                        }
                        $.ajax({
                            type: "post",
                            url: "controller/Customer.php",
                            data: {
                                type: "addcustomer",
                                listcustomer: listcustomer,
                                listcart: cart
                            },
                            success: function(msg) {
                                $("#confirm_order").attr("disabled", true);
                                var js = JSON.parse(msg);
                                $("#docid").text(js.doc_id);
                                $("#print_order").attr("disabled", false);
                                $('#modalprint').modal('show');
                                $("#print_order").click(function() {
                                    $('#modalprint').modal('show');
                                });

                                $("#printout").click(function() {
                                    var id = $("#docid").text();
                                    printout(id);
                                });
                                $("#noprint").click(function() {
                                    cleanorder();
                                });
                            }
                        });
                    }
                })

            }
        } else {
            Swal.fire({
                title: "ผิดพลาด",
                icon: "error",
                text: "กรุณาเพิ่มสินค้า"
            })
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
        getcompany();
        $("#view_customer").click(function() {
            $("#modalcustomer").modal('show');
        });
        $("#confirm_order").click(function() {

            confirmorder()
        });
        $("#print_order").click(function() {
            $('#modalprint').modal('show');
        });
        $("#noprint").click(function() {
            cleanorder();
        });
        $("#companyname").change(function() {
            getdepartment();
        })
    });
</script>

</html>