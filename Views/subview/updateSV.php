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
    <form action="index.php?controller=StudentController&action=update" method="post">
        <div class="row">
            <div class="col-6">
                <label for="MaSV" class="form-label">Mã SV</label>
                <input type="text" name="MaSV" class="form-control" id="paramet" readonly>
            </div>
            <div class="col-6">
                <label for="HoTenSV" class="form-label">Họ tên SV</label>
                <input type="text" name="HoTenSV" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="GioiTinh" class="form-label">Giới tính</label><br>
                <input type="radio" class="form-radio-input" name="GioiTinh" value="Nam" id="">Nam
                <input type="radio" class="form-radio-input" name="GioiTinh" value="Nữ" id="">Nữ
            </div>
            <div class="col-6">
                <label for="NgaySinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="NgaySinh" id="">
            </div>
            <div class="col-6">
                <label for="LopNienChe" class="form-label">Lớp niên chế</label>
                <input type="text" name="LopNienChe" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="LopHocPhan" class="form-label">Lớp học phần</label>
                <select name="LopHocPhan" id="" class="form-control">
                    <?php
                    foreach ($classes as $key => $value) {
                    ?>
                        <option value="<?php echo $value['MaLop'] ?>"><?php echo $value['TenLop'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="Sdt" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="Sdt" id="">
            </div>
            <div class="col-6">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" name="Email" id="">
            </div>
            <div class="col-6">
                <label for="DiaChi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="DiaChi" id="">
            </div>
            <div class="col-6">
                <label for="Khoa" class="form-label">Khoa</label>
                <input type="text" class="form-control" name="Khoa" id="">
            </div>
            <div class="col-6">
                <label for="Nganh" class="form-label">Ngành</label>
                <input type="text" class="form-control" name="Nganh" id="">
            </div>
            <div class="col-12 mt-4 d-flex justify-content-around">
                <input type="submit" class="btn btn-success" value="Sửa">
                <input type="reset" class="btn btn-warning" value="Xóa">
            </div>
        </div>
    </form>

</body>

</html>