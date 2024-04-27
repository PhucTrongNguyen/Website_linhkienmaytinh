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
    <form action="index.php?controller=DepartmentController&action=update" method="post">
        <div class="row">
            <div class="col-6">
                <label for="MaPH" class="form-label">Mã PH</label>
                <input type="text" name="MaPH" class="form-control" id="paramet">
            </div>
            <div class="col-6">
                <label for="TenPH" class="form-label">Tên phòng học</label>
                <input type="text" name="TenPH" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="DiaChiPH" class="form-label">Địa chỉ PH</label><br>
                <input type="text" name="DiaChiPH" class="form-control" id="">
            </div>
            <div class="col-12 mt-4 d-flex justify-content-around">
                <input type="submit" class="btn btn-success" value="Thêm">
                <input type="reset" class="btn btn-warning" value="Xóa">
            </div>
        </div>
    </form>

</body>

</html>