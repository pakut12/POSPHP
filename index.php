<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("share/header.php"); ?>
</head>

<body>
    <?php include("share/navbar.php"); ?>
    <div class="container">
        <div class="card mt-5  ">
            <div class="card-header ">
                คู่มือการใช้งาน
            </div>
            <div class="card-body" style="color: green;">
                <h5 class="card-title fw-bold">ขั้นตอนการเตรียบข้อมูลสินค้า</h5>
                <p class="card-text">
                <ol>
                    <li>เพิ่มชื่อบริษัทที่จะไปขาย [<a href="managecompany.php">เพิ่มชื่อบริษัท </a>] <b class="text-danger"># ถ้าหากบริษัทมีอยู่ในรายชื่อเเล้วให้ข้ามขั้นตอนนี้ไปได้เลย</b></li>
                    <li>เพิ่มชื่อเเผนกในบริษัทที่จะไปขาย [<a href="managecdepartment.php">เพิ่มชื่อเเผนก </a>] <b class="text-danger"># ถ้าหากเเผนกมีอยู่ในรายชื่อบริษัทเเล้วให้ข้ามขั้นตอนนี้ไปได้เลย</b></li>
                    <li>เพิ่มชื่อ Material เเละ MaterialGroup [<a href="managematerial.php">เพิ่มชื่อ Material เเละ MaterialGroup </a>] <b class="text-danger"># ถ้าหากMaterial เเละ MaterialGroupมีอยู่ในรายชื่อเเล้วให้ข้ามขั้นตอนนี้ไปได้เลย</b></li>
                    <li>โหลดไฟล์ Master เเละกรอกรายละเอียดให้เรียบร้อย [<a href="attachfile/downloadmaster/Master.xlsx">โหลดไฟล์ Master </a>]</li>
                    <li>อับโหลดไฟล์ Master ที่กรอกให้เรียบร้อย [<a href="uploadproduct.php">อับโหลดไฟล์ Master </a>]</li>
                </ol>
                </p>
                <hr>
                <h5 class="card-title fw-bold">ขั้นตอนการรับออเดอร์ลูกค้า</h5>
                <p class="card-text">
                <ol>
                    <li>เข้าหน้าโปรเเกรม POS [<a href="pos.php">โปรเเกรม POS </a>]</li>
                    <li>กรอกข้อมูลลูกค้า</li>
                    <li>เพิ่มรายการสินค้าที่ลูกค้าต้องการ</li>
                    <li>ตรวจสอบออเดอร์ของลูกค้าหลังจากนั้นกดปุ่ม <b class="text-primary">ยืนยัน Order</b></li>
                    <li>กดปุ่ม <b class="text-primary"> พิมพ์ </b></li>
                    <li>กดปุ่ม <b class="text-primary"> เสร็จสิ้น</b></li>
                </ol>
                </p>
                <hr>
                <h5 class="card-title fw-bold">ขั้นตอนการนำข้อมูลออเดอร์ออกเป็น Excel</h5>
                <p class="card-text">
                <ol>
                    <li>เข้าหน้าโปรเเกรม Exportorder [<a href="exportorder.php">โปรเเกรม ExportOrder </a>]</li>
                    <li>เลือกบริษัทเเละวันที่ให้เรียบร้อย</li>
                    <li>เพิ่มรายการสินค้าที่ลูกค้าต้องการ</li>
                    <li>กดปุ่ม <b class="text-primary"> ค้นหา </b></li>
                    <li>กดปุ่ม <b class="text-primary"> Excel </b></li>

                </ol>
                </p>
            </div>
        </div>

    </div>
</body>
<footer>
    <?php include("share/footer.php"); ?>
</footer>
<script>
    $(document).ready(function() {
        $("#homepage").addClass("active");
        $("#mat_barcode").change(function() {
            getproduct();
        });
    });
</script>

</html>