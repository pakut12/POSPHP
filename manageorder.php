<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                ข้อมูลลูกค้า
                            </div>
                            <div class="card-body ">
                                <div class="d-flex justify-content-around mb-3">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">เลขที่เอกสาร : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_doc_id" class="form-control form-control-sm text-center " readonly>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">รหัสพนักงาน : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_customer_code" class="form-control form-control-sm text-center" readonly>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">ชื่อ : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_customer_name" class="form-control form-control-sm text-center" readonly>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">โทร : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_customer_phone" class="form-control form-control-sm text-center" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">เเผนก : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_department" class="form-control form-control-sm text-center" readonly>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">บริษัท : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_company" class="form-control form-control-sm text-center" readonly>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="" class="col-form-label">วันที่ : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="detail_date_create" class="form-control form-control-sm text-center" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <div class="col-sm-12 col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        ข้อมูลสินค้า
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="" class="col-form-label">รหัสพนักงาน : </label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="detail_barcode" class="form-control form-control-sm text-center">
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-success btn-sm">เพิ่มข้อมูล</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-nowrap text-center table-sm" id="table_detail">
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
                                                <tbody id="data_detail">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        ข้อมูลราคา
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center ">
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
                                                <div class="d-flex justify-content-center">
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
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2 fw-bold">รวมทั้งสิ้น</div>
                                                    <div class="p-2 ">
                                                        <div id="cart_total" class="fw-bold text-success">0</div>
                                                    </div>
                                                    <div class="p-2 fw-bold">บาท</div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-success btn-sm w-100 mb-3">ยืนยัน</button>
                                        <button class="btn btn-primary btn-sm w-100 mb-3" id="print_order">พิมพ์</button>
                                        <button class="btn btn-secondary btn-sm w-100" data-bs-dismiss="modal">ปิด</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-5 border-dark ">
            <div class="card-header bg-dark text-white ">
                Order
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="h3 fw-bold">ManageOrder</div>
                </div>
                <br>
                <div class="table-responsive ">
                    <table class="table text-nowrap" id="table_order">
                        <thead>
                            <tr>
                                <th>เลขที่เอกสาร</th>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ</th>
                                <th>เเผนก</th>
                                <th>บริษัท</th>
                                <th>วันที่</th>
                                <th>รายละเอียด</th>
                                <th>พิมพ์</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody id="data_order">

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
    var cart = [];

    function delorder(doc_id, customer_id) {
        $.ajax({
            type: "post",
            url: "controller/Order.php",
            data: {
                type: "delorder",
                doc_id: doc_id,
                customer_id: customer_id
            },
            success: function(msg) {
                var js = JSON.parse(msg);
                if (js.status == "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'เรียบร้อย',
                        text: 'ลบเรียบร้อย'
                    })
                } else if (js.status == "false") {
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สำเร็จ',
                        text: 'ลบไม่สำเร็จ'
                    })
                }
                getorder();
            }
        });
    }

    function addToCart(product_no, pricenovat, pricevat, num) {
        /*
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
                */
        cart.push({
            no: product_no,
            pricenovat: pricenovat,
            pricevat: pricevat,
            qty: num
        });

        //displayCart();
    }

    function editQuantity(index, status) {

        if (status == 1) {
            cart[index].qty = (parseInt(cart[index].qty) + 1);
            /*
            cart[index].totalproduct = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
            cart[index].totalvat = (parseFloat(cart[index].num) * parseFloat(cart[index].vat)).toFixed(2).toLocaleString('en-US');
            cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].pricevat)).toFixed(2).toLocaleString('en-US');
            cart[index].totalpricenovat = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
*/
            //cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2);
        } else if (status == 2) {
            cart[index].qty = (parseInt(cart[index].qty) - 1);
            /*
            cart[index].totalproduct = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
            cart[index].totalvat = (parseFloat(cart[index].num) * parseFloat(cart[index].vat)).toFixed(2).toLocaleString('en-US');
            cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].pricevat)).toFixed(2).toLocaleString('en-US');
            cart[index].totalpricenovat = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2).toLocaleString('en-US');
*/
            //cart[index].total = (parseFloat(cart[index].num) * parseFloat(cart[index].price)).toFixed(2);
        }

        displayCart();
    }

    function DelQuantity(index) {
        cart.splice(index, 1);
        displayCart();
    }

    function displayCart() {
        var html = "";
        var totalvat = 0;
        var vat = 0;
        var totalnovat = 0;

        $.each(cart, function(k, v) {

            html += "<tr>";
            html += "<td class=''>" + (k + 1) + "</td>";
            html += "<td class=''>" + v.no + "</td>";
            html += "<td class=''>" + v.pricenovat + "</td>";
            html += "<td><button type='button' class='btn btn-primary btn-sm' onclick='editQuantity(" + k + ",2)'>-</button> " + v.qty + " <button type='button' class='btn btn-primary btn-sm' onclick='editQuantity(" + k + ",1)'>+</button></td>";
            html += "<td class=''>" + (v.pricenovat * v.qty).toFixed(2) + "</td>";
            html += "<td class=''><button type='button' class='btn btn-sm btn-danger' onclick='DelQuantity(" + k + ")'>ลบ</button></td>";
            html += "</tr>";

            totalnovat += (v.pricenovat * v.qty);
            totalvat += (v.pricevat * v.qty);
            vat = totalvat - totalnovat;

        });



        $("#print_order").click(function() {
            var id = $("#detail_doc_id").val();
            printout(id);
        });

        $("#cart_product").text(numberformat(totalnovat.toFixed(2)));
        $("#cart_totalvat").text(numberformat(vat.toFixed(2)));
        $("#cart_total").text(numberformat(totalvat.toFixed(2)));

        $("#data_detail").html(html);
        $("#table_detail").DataTable();
    }

    function editorder(doc_id, customer_id) {
        $.ajax({
            type: "post",
            url: "controller/Order.php",
            data: {
                type: "getorderbyid",
                doc_id: doc_id

            },
            success: function(msg) {
                var js = JSON.parse(msg);
                cart = [];
                $('#modaledit').modal('show');
                $('#detail_doc_id').val(js[0].doc_id);
                $('#detail_customer_code').val(js[0].customer_code);
                $('#detail_customer_name').val(js[0].customer_prefix + " " + js[0].customer_firstname + " " + js[0].customer_lastname);
                $('#detail_customer_phone').val(js[0].customer_phone);
                $('#detail_department').val(js[0].department_name);
                $('#detail_company').val(js[0].company_name);
                $('#detail_date_create').val(js[0].date_create);
                $.each(js, function(k, v) {
                    addToCart(v.product_mat_no, v.product_sale_price, v.product_sale_vat, v.product_qty, );
                });

                displayCart()
            }
        });
    }

    function numberformat(number) {
        var format = new Intl.NumberFormat('en-US').format(number);
        return format;
    }

    function printout(id) {
        window.open('distplayprint.php?docid=' + id, '_blank', 'height=600,width=800,left=200,top=200');
    }

    function getorder() {
        $.ajax({
            type: "post",
            url: "controller/Order.php",
            data: {
                type: "getorder"
            },
            success: function(msg) {

                var js = JSON.parse(msg);
                var html = "";
                $.each(js, function(k, v) {
                    html += "<tr>";
                    html += "<td class=''>" + v.doc_id + "</td><td class=''>" + v.customer_code + "</td><td class=''>" + v.customer_prefix + " " + v.customer_firstname + " " + v.customer_lastname + "</td><td class=''>" + v.department_name + "</td><td class=''>" + v.company_name + "</td>";
                    html += "<td class=''>" + v.date_create + "</td>";
                    html += "<td class=''><button type='button' class='btn btn-sm btn-warning' onclick='editorder(" + v.doc_id + "," + v.customer_id + ")'>ดูรายละเอียด</button></td>";
                    html += "<td class=''><button type='button' class='btn btn-sm btn-primary' onclick='printout(" + v.doc_id + ")'>พิมพ์</button></td>";
                    html += "<td class=''><button type='button' class='btn btn-sm btn-danger' onclick='delorder(" + v.doc_id + "," + v.customer_id + ")'>ลบ</button></td>";
                    html += "</tr>";
                });

                $("#data_order").html(html);
                $("#table_order").DataTable();
            }
        });
    }

    $(document).ready(function() {
        $("#manageorder").addClass("active");

        getorder();
        $("#add_order").click(function() {
            $('#modaladd').modal('show');
        });
        $('#order_save_add').click(function() {
            addorder();
        });
    });
</script>

</html>