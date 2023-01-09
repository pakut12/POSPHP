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
                UploadExcel
            </div>
            <div class="card-body">
            
                
                <div class="table-responsive ">
                    <table class="table text-nowrap" id="table_company">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสบริษัท</th>
                                <th>ชื่อบริษัท</th>
                                <th>เเก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody id="data_company">
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
        $("#uploadexcel").addClass("active");
        $("#table_company").DataTable();
        getcompany();
        $("#add_company").click(function() {
            addcompany();
        });
    });
</script>

</html>