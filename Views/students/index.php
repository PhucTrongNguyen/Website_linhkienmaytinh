<!-- <?php
        $n = isset($_GET['n']) ?? 0;
        if ($n != 0) {
        ?>
    <script type="text/javascript">
        alert("Đã thêm thành công");
    </script>
<?php
        } else {
?>
    <script type="text/javascript">
        alert("Thêm thất bại");
    </script>
<?php
        }

?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/93c0950cc1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div id="formInsert">
        <button id="buttonClose" type="button" onclick="closeForm()" class="btn btn-danger">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <?php include "./Views/subview/insertSV.php"; ?>
    </div>
    <div class="formUpdate" id="formUpdate">
        <button id="buttonClose" type="button" onclick="closeForm()" class="btn btn-danger">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <?php include "./Views/subview/updateSV.php"; ?>
    </div>
    <div class="wrapper">
        <?php

        include "./Core/menu.php";
        ?>
        <div class="main">
        <?php 
            include "./Core/navbar.php";
            ?>
            <div class="text-center p-3">
                <div class="title d-flex justify-content-between align-items-center">
                    <h1><?php echo $pageTitle ?></h1>
                    <form action="index.php?controller=StudentController&action=searchByName" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="hotensv" class="form-control" placeholder="<?php echo postIndex('hotensv') ?? "Search" ?>">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                    <button id="buttonInsert" type="button" class="btn btn-primary" onclick="showInsert()">
                        <i class="fa-solid fa-plus text-light"></i>
                    </button>

                </div>

                <div class="table-data">
                    <table class="table table-striped">
                        <tr>
                            <th>Mã SV</th>
                            <th>Họ tên SV</th>
                            <th>Giới tính</th>
                            <th>Ngày Sinh</th>
                            <th>Lớp niên chế</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Khoa</th>
                            <th>Ngành</th>
                            <th>Chức năng</th>
                        </tr>
                        <?php
                        foreach ($students as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['MaSV'] ?></td>
                                <td><?php echo $value['HoTenSV'] ?></td>
                                <td><?php echo $value['GioiTinh'] ?></td>
                                <td><?php echo $value['NgaySinh'] ?></td>
                                <td><?php echo $value['LopNienChe'] ?></td>
                                <td><?php echo $value['Sdt'] ?></td>
                                <td><?php echo $value['Email'] ?></td>
                                <td><?php echo $value['DiaChi'] ?></td>
                                <td><?php echo $value['Khoa'] ?></td>
                                <td><?php echo $value['Nganh'] ?></td>
                                <td>
                                    <div class="table-data-future">
                                        <a href="index.php?controller=StudentController&action=delete&MaSV=<?php echo $value['MaSV'] ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <div class="buttonUpdate">
                                            <i class="fa-solid fa-pen-clip" data-id="<?php echo $value['MaSV'] ?>"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ba-bbq/1.2.1/jquery.ba-bbq.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./scripts.js"></script>
</body>

</html>