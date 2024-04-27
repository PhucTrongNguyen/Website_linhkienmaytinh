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
    <form action="index.php?controller=ClassController&action=update" method="post">
        <div class="row">
            <div class="col-6">
                <label for="MaLop" class="form-label">Mã Lớp</label>
                <input type="text" name="MaLop" class="form-control" id="paramet">
            </div>
            <div class="col-6">
                <label for="TenLop" class="form-label">Tên lớp</label>
                <input type="text" name="TenLop" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="SiSo" class="form-label">Sĩ số</label><br>
                <input type="number" name="SiSo" class="form-control" id="">
            </div>
            <div class="col-6">
                <label for="MaGV" class="form-label">Giáo viên phụ trách</label>
                <select name="MaGV" id="" class="form-control">
                    <?php
                    foreach ($teachers as $key => $value) {
                    ?>
                        <option value="<?php echo $value['MaGV'] ?>"><?php echo $value['HoTenGV'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="MaMH" class="form-label">Môn học</label>
                <select name="MaMH" id="" class="form-control">
                    <?php
                    foreach ($subjects as $key => $value) {
                    ?>
                        <option value="<?php echo $value['MaMH'] ?>"><?php echo $value['TenMH'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="MaPH" class="form-label">Phòng học</label>
                <select name="MaPH" id="" class="form-control">
                    <?php
                    foreach ($departments as $key => $value) {
                    ?>
                        <option value="<?php echo $value['MaPH'] ?>"><?php echo $value['TenPH'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 mt-4 d-flex justify-content-around">
                <input type="submit" class="btn btn-success" value="Thêm">
                <input type="reset" class="btn btn-warning" value="Xóa">
            </div>
        </div>
    </form>

</body>

</html>