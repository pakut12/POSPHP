<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div class="container">
        <div class="card mt-5 ">
            <div class="card-header ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>
                Date
            </div>
            <div class="card-body">
                <div class="" id="myform">
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
                                <input type="date" class="form-control form-control-sm " id="date_start" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="mb-3">
                                <label for="date_end" class="form-label">ถึงวันที่</label>
                                <input type="date" class="form-control form-control-sm " id="date_end" required>
                            </div>
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
        <div class="card mt-3 ">
            <div class="card-header ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                </svg>
                ExportOrder
            </div>
            <div class="card-body">
                <div id="listorder">
                    <h3 class="text-center">ExportOrder</h3>
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
                    html += "<option value='" + v[0] + ":" + v[1] + "' '>" + v[1] + "</option>";
                });
                $("#companylist").empty();
                $("#companylist").append(html);
            }
        });
    }

    function getreportsummarizeorder() {
        if (!$("#companyname").val() || !$("#date_start").val() || !$("#date_end").val()) {
            $("#myform").addClass("was-validated");
            Swal.fire({
                title: "ผิดพลาด",
                icon: "error",
                text: "กรุณากรอกข้อมูลให้ถูกต้อง"
            })
        } else {
            var company = $("#companyname").val().split(":");
            $.ajax({
                type: "post",
                url: "controller/Report.php",
                data: {
                    type: "summarizeorder",
                    date_start: $("#date_start").val(),
                    date_end: $("#date_end").val(),
                    company_id: company[0]
                },
                success: function(msg) {
                    console.log(msg);
                    $("#order_table").html(msg);
                    var groupColumn = 2;
                    var table = $('#table_exportexcel').DataTable({
                        destroy: true,
                        scrollY: true,
                        dom: 'Bfrtip',
                        buttons: [{
                            extend: 'excel',
                            title: "List Order " + company[1] + " " + $("#date_start").val() + " ถึง " + $("#date_end").val()
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
                                            .before('<tr class="group text-start" style="background-color:#ddd"><td colspan="11">' + group + '</td></tr>');
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
    }

    $(document).ready(function() {
        $("#exportorder").addClass("active");
        getcompany();
        $("#bt_search").click(function() {
            getreportsummarizeorder();
        });

    });
</script>

</html>