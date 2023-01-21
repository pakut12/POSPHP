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
                Date
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <label for="customer_id" class="form-label">บริษัท</label>
                        <input class="form-control form-control-sm text-center" list="companylist" autocomplete="off" name="companyname" id="companyname" required>
                        <datalist id="companylist">
                        </datalist>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="mb-3">
                            <label for="date_start" class="form-label">วันที่</label>
                            <input type="date" class="form-control form-control-sm " id="date_start" require>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="mb-3">
                            <label for="date_end" class="form-label">ถึงวันที่</label>
                            <input type="date" class="form-control form-control-sm " id="date_end" require>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 ">
                        <button class="btn btn-sm btn-success w-100" id="bt_search">ค้นหา</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 border-dark ">
            <div class="card-header bg-dark text-white ">
                ExportExcel
            </div>
            <div class="card-body">
                <div id="listorder">
                    <h3 class="text-center">ExportExcel</h3>
                    <br>
                    <div id="order_table">
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

    function getreportsummarizeorder() {
        $.ajax({
            type: "post",
            url: "controller/Report.php",
            data: {
                type: "summarizeorder",
                date_start: $("#date_start").val(),
                date_end: $("#date_end").val(),
                company_id: $("#companyname").val()
            },
            success: function(msg) {
                $("#order_table").html(msg);
                var groupColumn = 1;
                var table = $('#table_exportexcel').DataTable({
                    destroy: true,
                    scrollY: true,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excel',
                        title: "List Order " + $("#companyname").val() + " " + $("#date_start").val() + " ถึง " + $("#date_end").val()
                    }],
                    columnDefs: [{
                        visible: false,
                        targets: groupColumn
                    }],
                    order: [
                        [0, 'asc']
                    ],
                    displayLength: 10,
                    drawCallback: function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api
                            .column(groupColumn, {
                                page: 'current'
                            })
                            .data()
                            .each(function(group, i) {
                                if (last !== group) {
                                    $(rows)
                                        .eq(i)
                                        .before('<tr class="group text-start" style="background-color:#ddd"><td colspan="10">' + group + '</td></tr>');
                                    last = group;
                                }
                            });
                    },
                });

                // Order by the grouping
                $('#table_exportexcel tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                        table.order([groupColumn, 'desc']).draw();
                    } else {
                        table.order([groupColumn, 'asc']).draw();
                    }
                });

            }
        })
    }

    $(document).ready(function() {
        $("#exportexcel").addClass("active");
        getcompany();
        $("#bt_search").click(function() {
            getreportsummarizeorder();
        });

    });
</script>

</html>