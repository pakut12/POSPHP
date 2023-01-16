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
                <div class="text-end">
                    <button class="btn btn-lg btn-success" id="add_order"> + เพิ่ม</button>
                </div>

                <br>
                <div class="table-responsive ">
                    <table class="table text-nowrap" id="table_order">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสบริษัท</th>
                                <th>ชื่อบริษัท</th>
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
    
    $(document).ready(function() {
        $("#manageorder").addClass("active");
        $("#table_order").DataTable();
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