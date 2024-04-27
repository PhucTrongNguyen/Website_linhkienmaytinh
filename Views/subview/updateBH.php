<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php?controller=SchedulController&action=update" method="post">
        <div class="row">
            <div class="col-6">
                <label for="MaBH" class="form-label">Mã BH</label>
                <input type="text" name="MaBH" class="form-control" id="paramet">
            </div>
            <div class="col-6">
                <label for="GioBD" class="form-label">Giờ BĐ</label>
                <input type="time" name="GioBD" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="GioKT" class="form-label">Giờ KT</label><br>
                <input type="time" name="GioKT" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="NgayBD" class="form-label">Ngày BĐ</label>
                <input type="date" class="form-control" name="NgayBD" id="">
            </div>
            <div class="col-6">
                <label for="NgayKT" class="form-label">Ngày KT</label>
                <input type="date" name="NgayKT" class="form-control" id="">
            </div>
            <div class="col-12 mt-4 d-flex justify-content-around">
                <input type="submit" class="btn btn-success" value="Thêm">
                <input type="reset" class="btn btn-warning" value="Xóa">
            </div>
        </div>
    </form>

</body>

</html>