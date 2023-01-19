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
                ExportExcel
            </div>
            <div class="card-body">
                <h3>ExportExcel</h3>
                <br>
                <table class="table" id="table_exportexcel">
                    <thead>
                        <tr>
                            <th>asd</th>
                            <th>asd</th>
                            <th>asd</th>
                            <th>asd</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asd</td>
                        </tr>
                        <tr>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asd</td>
                        </tr>
                        <tr>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asd</td>
                        </tr>
                        
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
    $(document).ready(function() {
        $("#exportexcel").addClass("active");
        $("#table_exportexcel").DataTable();

    });
</script>

</html>