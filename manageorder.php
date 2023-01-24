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
                                <input type="hidden" id="detail_customer_id" value="">
                                <input type="hidden" id="detail_department_id" value="">
                                <input type="hidden" id="detail_company_id" value="">

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
                                                <label for="" class="col-form-label">บาร์โค้ด : </label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="detail_barcode" class="form-control form-control-sm text-center">
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-success btn-sm" id="addproduct">เพิ่มข้อมูล</button>
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
                                        <button class="btn btn-success btn-sm w-100 mb-3" id="confirm">ยืนยัน</button>
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
        <div class="card mt-5 ">
            <div class="card-header ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg>
                Order
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="h3 fw-bold">ManageOrder</div>
                </div>
                <div class="text-end">
                    <a href="pos.php"><button class="btn btn-lg btn-success" id="add_department"> + Add</button></a>
                </div>
                <br>
                <div class="table-responsive ">
                    <table class="table text-nowrap" id="table_order">
                        <thead>
                            <tr>
                                <th>DocID</th>
                                <th>CustomerCode</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Detail</th>
                                <th>Print</th>
                                <th>Del</th>
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
        })
    }

    function addToCart(order_id, product_id, product_no, pricenovat, pricevat, product_num) {
        for (let i = 0; i < cart.length; i++) {
            if (cart[i].no === product_no) {
                cart[i].qty = (parseInt(cart[i].qty) + 1);
                displayCart();
                return;
            }
        }
        cart.push({
            orderid: order_id,
            id: product_id,
            no: product_no,
            pricenovat: pricenovat,
            pricevat: pricevat,
            qty: product_num
        });
        displayCart();
    }

    function editProduct(index, status) {

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

    function DelProduct(index, orderid) {
        $.ajax({
            type: "post",
            url: "controller/Order.php",
            data: {
                type: "delorderbyid",
                orderid: orderid
            },
            success: function(msg) {
                cart.splice(index, 1);
                displayCart();
                console.log(msg);
            }
        });
    }

    function getproduct(barcode) {
        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "searchproduct",
                barcode: barcode
            },
            success: function(msg) {
                if (msg) {
                    var js = JSON.parse(msg);
                    //addToCart(js.product_id, js.product_mat_no, js.product_mat_name_th, js.product_sale_price, js.product_size_id, js.product_color_id, 1, js.product_sale_vat);
                    var x = '"new"';

                    addToCart(x, js.product_id, js.product_mat_no, js.product_sale_price, js.product_sale_vat, 1);

                    displayCart();
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
            html += "<td><button type='button' class='btn btn-primary btn-sm' onclick='editProduct(" + k + ",2)'>-</button> " + v.qty + " <button type='button' class='btn btn-primary btn-sm' onclick='editProduct(" + k + ",1)'>+</button></td>";
            html += "<td class=''>" + (v.pricenovat * v.qty).toFixed(2) + "</td>";
            html += "<td class=''><button type='button' class='btn btn-sm btn-danger' onclick='DelProduct(" + k + "," + v.orderid + ")'>ลบ</button></td>";
            html += "</tr>";

            totalnovat += (v.pricenovat * v.qty);
            totalvat += (v.pricevat * v.qty);
            vat = totalvat - totalnovat;
        });



        $("#cart_product").text(numberformat(totalnovat.toFixed(2)));
        $("#cart_totalvat").text(numberformat(vat.toFixed(2)));
        $("#cart_total").text(numberformat(totalvat.toFixed(2)));

        $("#data_detail").html(html);
        $("#table_detail").DataTable();
    }

    function confirmorder() {
        $.ajax({
            type: "post",
            url: "controller/Order.php",
            data: {
                type: "updateorderbyid",
                listcart: cart,
                customer_id: $("#detail_customer_id").val(),
                department_id: $("#detail_department_id").val(),
                company_id: $("#detail_company_id").val(),
                doc_id: $("#detail_doc_id").val()
            },
            success: function(msg) {
                var js = JSON.parse(msg);
                console.log(js);
                if (js.status) {
                    Swal.fire({
                        title: "ยืนยัน",
                        icon: "success",
                        text: "ยืนยันสำเร็จ"
                    })
                } else {
                    Swal.fire({
                        title: "ยืนยัน",
                        icon: "error",
                        text: "ยืนยันไม่สำเร็จ"
                    })
                }
            }
        });
    }

    function editorder(doc_id, customer_id) {
        $("#detail_barcode").val("");
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
                $("#detail_customer_id").val(js[0].customer_id);
                $("#detail_department_id").val(js[0].department_id);
                $("#detail_company_id").val(js[0].company_id);

                $('#detail_doc_id').val(js[0].doc_id);
                $('#detail_customer_code').val(js[0].customer_code);
                $('#detail_customer_name').val(js[0].customer_prefix + " " + js[0].customer_firstname + " " + js[0].customer_lastname);
                $('#detail_customer_phone').val(js[0].customer_phone);
                $('#detail_department').val(js[0].department_name);
                $('#detail_company').val(js[0].company_name);
                $('#detail_date_create').val(js[0].date_create);
                $.each(js, function(k, v) {
                    addToCart(v.order_id, v.product_id, v.product_mat_no, v.product_sale_price, v.product_sale_vat, v.product_qty);
                });

                displayCart();
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
                    html += "<td class=''>" + v.doc_id + "</td><td class=''>" + v.customer_code + "</td><td class=''>" + v.customer_prefix + " " + v.customer_firstname + " " + v.customer_lastname + "</td><td class=''>" + v.company_name + "</td><td class=''>" + v.department_name + "</td>";
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
        $("#addproduct").click(function() {
            var barcode = $("#detail_barcode").val();
            getproduct(barcode);
        });
        $("#confirm").click(function() {
            confirmorder();
        })
        $("#print_order").click(function() {
            var id = $("#detail_doc_id").val();
            printout(id);
        });
    });
</script>

</html>