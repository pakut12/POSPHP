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
                Company
            </div>
            <div class="card-body">
                <div class="text-end">
                    <button class="btn btn-lg btn-success" id="add_company"> + เพิ่ม</button>
                </div>
                <table class="table" id="table_company">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รหัสบริษัท</th>
                            <th>บริษัท</th>
                        </tr>
                    </thead>
                    <tbody id="data_company">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php include("share/footer.php"); ?>
</footer>
<script>
    function addcompany() {
        $.ajax({
            type: "post",
            url: "controller/Product.php",
            data: {
                type: "addproduct",
                company: "company"
            },
            success: function(msg) {
                console.log(msg);
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

            }
        });
    }
    $(document).ready(function() {
        $("#managecompany").addClass("active");

        getcompany();
    });
</script>

</html>