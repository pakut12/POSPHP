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
    .myfont {
        font-size: 6pt;
    }
</style>

<body>
    <div class="text-center myfont w-100">
        <div class="fw-bold">บริษัท ประชาอาภรณ์ จํากัด (มหาชน)<br>
            666 ถ.พระราม3 เเขวงบางโพงพาง เขตยานาวา กรุงเทพฯ 10120<br>
            โทร 02-685-6500<br>
            ใบมัดจำ 50% ค่าเสื้อ PoLo
        </div>
        <p class="mb-0">-------------------------------------------------------------------------------------</p>
        <div class="d-flex justify-content-evenly">
            <div class="fw-bold">ชื่อ : </div>
            <div class="text-decoration-underline">นาย ปากัต ซิงห์</div>
            <div class="fw-bold">นามสกุล : </div>
            <div class="text-decoration-underline">จาวาลา</div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="fw-bold">เเผนก : </div>
            <div class="text-decoration-underline">computer</div>
            <div class="fw-bold">โทร : </div>
            <div class="text-decoration-underline">0956182209</div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="fw-bold">DOCNO : </div>
            <div class="text-decoration-underline">100</div>
            <div class="fw-bold">DATE : </div>
            <div class="text-decoration-underline"><?= date('d-m-Y H:i:s') ?></div>
        </div>
        <p class="mb-0">-------------------------------------------------------------------------------------</p>
        <table class="table table-borderless mt-3 ">
            <thead>
                <tr>
                    <th class="p-0">Item</th>
                    <th class="p-0">Qty</th>
                    <th class="p-0">Amt</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-0">asd</td>
                    <td class="p-0">asd</td>
                    <td class="p-0">asd</td>
                </tr>
                <tr>
                    <td class="p-0">asd</td>
                    <td class="p-0">asd</td>
                    <td class="p-0">asd</td>
                </tr>
                <tr>
                    <td class="p-0">asd</td>
                    <td class="p-0">asd</td>
                    <td class="p-0">asd</td>
                </tr>
            </tbody>
        </table>
        <p class="mb-0">-------------------------------------------------------------------------------------</p>
        <div class="row">
            <div class="col-6 ">
            </div>
            <div class="col-6 ">
                <div class="col-12 mx-auto">
                    <div class="d-flex justify-content-evenly">
                        <div class="fw-bold">Vat Exc : </div>
                        <div class="fw-bold">3</div>
                        <div class="fw-bold">Bath</div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="fw-bold">Vat Amt : </div>
                        <div class="fw-bold">10</div>
                        <div class="fw-bold">Bath</div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="fw-bold">Total : </div>
                        <div class="fw-bold">12</div>
                        <div class="fw-bold">Bath</div>
                    </div>

                </div>
            </div>
        </div>
        <p class="mb-0">-------------------------------------------------------------------------------------</p>
    </div>
</body>
<script>
    $(document).ready(function() {
        alert('asd');
    });
</script>

</html>