<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?></title>
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
        <?php include "./Views/subview/insertBH.php"; ?>
    </div>
    <div class="formUpdate"  id="formUpdate">
        <button id="buttonClose" type="button" onclick="closeForm()" class="btn btn-danger">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <?php include "./Views/subview/updateBH.php"; ?>
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
                    <button id="buttonInsert" type="button" class="btn btn-primary" onclick="showInsert()">
                        <i class="fa-solid fa-plus text-light"></i>
                    </button>
                </div>

                <div class="table-data">
                    <table class="table table-striped">
                        <tr>
                            <th>Mã BH</th>
                            <th>Giờ BĐ</th>
                            <th>Giờ KT</th>
                            <th>Ngày BĐ</th>
                            <th>Ngày KT</th>
                            <th>Chức năng</th>
                        </tr>
                        <?php
                        foreach ($scheduls as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['MaBH'] ?></td>
                                <td><?php echo $value['GioBD'] ?></td>
                                <td><?php echo $value['GioKT'] ?></td>
                                <td><?php echo $value['NgayBD'] ?></td>
                                <td><?php echo $value['NgayKT'] ?></td>
                                <td>
                                    <div class="table-data-future">
                                        <a href="index.php?controller=SchedulController&action=delete&MaBH=<?php echo $value['MaBH'] ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <div class="buttonUpdate">
                                            <i class="fa-solid fa-pen-clip" data-id="<?php echo $value['MaBH'] ?>"></i>
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
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./scripts.js"></script>
</body>

</html>