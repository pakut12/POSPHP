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
                                <th>เเก้ไข</th>
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
                    console.log(v);
                    html += "<tr><td class=''>" + v.doc_id + "</td><td class=''>" + v.customer_code + "</td><td class=''>" + v.customer_prefix + " " + v.customer_firstname + " " + v.customer_lastname + "</td><td class=''>" + v.department_name + "</td><td class=''>" + v.company_name + "</td>";
                    html += "<td class=''>" + v.date_create + "</td>";
                    html += "<td class=''><button type='button' class='btn btn-sm btn-warning'>เเก้ไข</button></td>";
                    html += "<td class=''><button type='button' class='btn btn-sm btn-danger'>ลบ</button></td></tr>";
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