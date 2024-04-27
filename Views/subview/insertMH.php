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
    <form action="index.php?controller=SubjectController&action=insert" method="post">
        <div class="row">
            <div class="col-6">
                <label for="MaMH" class="form-label">Mã MH</label>
                <input type="text" name="MaMH" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="TenMH" class="form-label">Tên MH</label>
                <input type="text" name="TenMH" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="SoTietLT" class="form-label">Số tiết lý thuyết</label><br>
                <input type="number" name="SoTietLT" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="SoTietTH" class="form-label">Số tiết thực hành</label>
                <input type="number" class="form-control" name="SoTietTH" id="">
            </div>
            <div class="col-6">
                <label for="SoTinChi" class="form-label">Số tín chỉ</label>
                <input type="number" name="SoTinChi" class="form-control" id="">
            </div>
            <div class="col-12 mt-4 d-flex justify-content-around">
                <input type="submit" class="btn btn-success" value="Thêm">
                <input type="reset" class="btn btn-warning" value="Xóa">
            </div>
        </div>
    </form>

</body>

</html>