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
    <form action="index.php?controller=TeacherController&action=insert" method="post">
        <div class="row">
            <div class="col-6">
                <label for="MaGV" class="form-label">Mã GV</label>
                <input type="text" name="MaGV" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="HoTenGV" class="form-label">Họ tên GV</label>
                <input type="text" name="HoTenGV" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="GioiTinh" class="form-label">Giới tính</label><br>
                <input type="radio" class="form-radio-input" name="GioiTinh" value="Nam" id="">Nam
                <input type="radio" class="form-radio-input" name="GioiTinh" value="Nữ" id="">Nữ
            </div>
            <div class="col-6">
                <label for="ChuyenMon" class="form-label">Chuyên môn</label>
                <input type="text" class="form-control" name="ChuyenMon" id="">
            </div>
            <div class="col-6">
                <label for="TrinhDo" class="form-label">Trình độ</label>
                <input type="text" name="TrinhDo" class="form-control" id="">
            </div>
            <div class="col-12 mt-4 d-flex justify-content-around">
                <input type="submit" class="btn btn-success" value="Thêm">
                <input type="reset" class="btn btn-warning" value="Xóa">
            </div>
        </div>
    </form>

</body>

</html>