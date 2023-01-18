<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <title>Document</title>
</head>
<style>

</style>

<body>
    <div class="text-center myfont w-100">
        <p class="mb-0">=====================================================</p>
        <div class="fw-bold">บริษัท ประชาอาภรณ์ จํากัด (มหาชน)<br>
            666 ถ.พระราม3 เเขวงบางโพงพาง เขตยานาวา กรุงเทพฯ 10120<br>
            โทร 02-685-6500<br>
            ใบมัดจำ 50% ค่าเสื้อ PoLo
        </div>
        <p class="mb-0">=====================================================</p>
        <div class="d-flex justify-content-evenly">
            <div class="fw-bold">ชื่อ : </div>
            <div class="text-decoration-underline" id="customer_firstname">นาย ปากัต ซิงห์</div>
            <div class="fw-bold">นามสกุล : </div>
            <div class="text-decoration-underline" id="customer_lastname">จาวาลา</div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="fw-bold">เเผนก : </div>
            <div class="text-decoration-underline" id="department_name">computer</div>
            <div class="fw-bold">โทร : </div>
            <div class="text-decoration-underline" id="customer_phone">0956182209</div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="fw-bold">DOCNO : </div>
            <div class="text-decoration-underline" id="doc_id">100</div>
            <div class="fw-bold">DATE : </div>
            <div class="text-decoration-underline"><?= date('d-m-Y H:i:s') ?></div>
        </div>
        <p class="mb-0">=====================================================</p>
        <table class="table table-sm mx-auto">
            <thead>
                <tr>
                    <th class="p-0">Item</th>
                    <th class="p-0">Qty</th>
                    <th class="p-0">Amt</th>
                </tr>
            </thead>
            <tbody id="list_order">

            </tbody>
        </table>
        <p class="mb-0">=====================================================</p>
        <div class="row">
            <div class="col-6 ">
            </div>
            <div class="col-6 ">
                <div class="col-12 mx-auto">
                    <div class="d-flex justify-content-evenly">
                        <div class="fw-bold">Vat Exc : </div>
                        <div class="fw-bold" id="totalnovat"></div>
                        <div class="fw-bold">Bath</div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="fw-bold">Vat Amt : </div>
                        <div class="fw-bold" id="vat"></div>
                        <div class="fw-bold">Bath</div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="fw-bold">Total : </div>
                        <div class="fw-bold" id="totalvat"></div>
                        <div class="fw-bold">Bath</div>
                    </div>

                </div>
            </div>
        </div>
        <p class="mb-0">=====================================================</p>
    </div>
</body>
<script>
    function getdocid() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const docid = urlParams.get('docid');

        $.ajax({
            type: "post",
            url: "controller/Order.php",
            data: {
                type: "getorderbyid",
                doc_id: docid
            },
            success: function(msg) {

                var jsdecode = JSON.parse(msg);

                $("#customer_firstname").text(jsdecode[0].customer_prefix + " " + jsdecode[0].customer_firstname);
                $("#customer_lastname").text(jsdecode[0].customer_lastname);
                $("#department_name").text(jsdecode[0].department_name);
                $("#customer_lastname").text(jsdecode[0].customer_lastname);
                $("#customer_phone").text(jsdecode[0].customer_phone);
                $("#doc_id").text(jsdecode[0].doc_id);

                var html = "";
                var totalnovat = 0;
                var vat = 0;
                var totalvat = 0;

                $.each(jsdecode, function(k, v) {
                    html += "<tr><td class='p-0'>" + v.product_mat_no + "</td><td class='p-0'>" + v.product_qty + "</td><td class='p-0'>" + (v.product_sale_price * v.product_qty).toFixed(2) + "</td></tr>";
                    totalnovat += parseFloat(v.product_sale_price) * parseInt(v.product_qty);
                    totalvat += parseFloat(v.product_sale_vat) * parseInt(v.product_qty);
                })
                vat = totalvat - totalnovat;

                $("#totalnovat").text(totalnovat.toFixed(2));
                $("#vat").text(vat.toFixed(2));
                $("#totalvat").text(totalvat.toFixed(2));

                $("#list_order").empty();
                $("#list_order").html(html);
                window.print();
            }
        })
    }

    $(document).ready(function() {
        getdocid();

    });
</script>

</html>