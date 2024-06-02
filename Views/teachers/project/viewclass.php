<?php 
include 'include/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Class</title>
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" >
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/93c0950cc1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <!-- Sidebar -->
            <?php include "include/sidebar.php";?>
            <!-- Sidebar -->
        </aside>
        <div class="main">
            <div class="navbar">
                <!-- Navbar -->
                <?php include "include/navbar.php";?>
                <!-- Navbar -->
            </div>
            <div class="text-center p-3">
              <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Xem lớp</h1>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Xem lớp</li>
                  </ol>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tìm kiếm lớp học</h6>
                      </div>
                      <div class="card-body">
                        <form method="post">
                          <div class="form-group row mb-3">
                            <label class="form-control-label" id="pos" >Chọn ngày<span class="text-danger ml-2">*</span></label>
                              <div class="ml-3 col-xl-3" id="poslabel" >
                                  <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName" placeholder="Class Arm Name">
                              </div>
                              <button type="submit" name="view" class="btn btn-primary ml-1" id="posbut" >Tìm lớp</button>
                          </div>
                        </form>
                        <form method="get">
                          <div class="form-group row mb-3">
                            <label class="form-control-label" id="pos">Tìm kiếm</label>
                              <div class="ml-5 col-xl-3">
                                  <input type="text" class="form-control" name="t" id="" placeholder="Tìm kiếm">
                              </div>
                              <button type="submit" class="btn btn-primary" value="Tim kiem">Tìm</button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <?php
                    // Flag to check if data is available
                    $tableVisible = false;

                    // Initialize result and data arrays
                    $result = [];
                    $data = [];

                    // Processing the date search
                    if (isset($_POST['view'])) {
$dateTaken = $_POST['dateTaken'] ?? '';
                        $query = "SELECT 
                                    mh.TenMH,
                                    lhp.MaLop,
                                    lhp.SiSo,
                                    nh.Ngay,
                                    ph.MaPH
                                  FROM 
                                    lophocphan lhp
                                  JOIN 
                                    monhoc mh ON lhp.MaMH = mh.MaMH
                                  JOIN 
                                    chitietngayhoc ctnh ON lhp.MaLop = ctnh.MaLop
                                  JOIN 
                                    ngayhoc nh ON ctnh.MaNH = nh.MaNH
                                  JOIN 
                                    phonghoc ph ON lhp.MaPH = ph.MaPH
WHERE nh.Ngay = :dateTaken";
                        $stmt = $conn->prepare($query);
$stmt->bindParam(':dateTaken', $dateTaken);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $tableVisible = !empty($result);
                    }

                    // Processing the keyword search
                    if (isset($_GET['t'])) {
                        $ten = $_GET['t'] ?? '';

                        $sql = "
                          SELECT 
                            mh.TenMH,
                            lhp.MaLop,
                            lhp.SiSo,
                            nh.Ngay,
                            ph.MaPH
                          FROM 
                            lophocphan lhp
                          JOIN 
                            monhoc mh ON lhp.MaMH = mh.MaMH
                          JOIN 
                            chitietngayhoc ctnh ON lhp.MaLop = ctnh.MaLop
                          JOIN 
                            ngayhoc nh ON ctnh.MaNH = nh.MaNH
                          JOIN 
                            phonghoc ph ON lhp.MaPH = ph.MaPH
                          WHERE 
                            mh.TenMH LIKE ?";
                        $arr = ["%$ten%"];
                        $stm = $conn->prepare($sql);
                        $stm->execute($arr);
                        $data = $stm->fetchAll(PDO::FETCH_OBJ);
                        $tableVisible = !empty($data);
                    }
                    ?>

                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card mb-4">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Lớp</h6>
                          </div>
                          <div class="table-responsive p-3">
                              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Môn học</th>
                                        <th>Mã Lớp Học phần</th>
                                        <th>Tổng sinh viên</th>
                                        <th>Mã Phòng</th>
                                        <th>Ngày học</th>
                                        <th>----</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    $sn = 1; // Khởi tạo số thứ tự là 1
                                    if (isset($_POST['view']) && !empty($result)) {
                                        foreach ($result as $row) {
                                            echo "
                                                <tr>
                                                    <td>" . htmlspecialchars($sn) . "</td>
                                                    <td>" . htmlspecialchars($row['TenMH']) . "</td>
                                                    <td>" . htmlspecialchars($row['MaLop']) . "</td>
                                                    <td>" . htmlspecialchars($row['SiSo']) . "</td>
                                                    <td>" . htmlspecialchars($row['MaPH']) . "</td>
                                                    <td>" . htmlspecialchars($row['Ngay']) . "</td>
                                                    <td><a href='takeattendance.php?MaLop=" . urlencode($row['MaLop']) . "&Ngay=" . urlencode($row['Ngay']) . "'>Điểm danh</a>/
                                                    <span><a href='detailattendance.php?MaLop=" . urlencode($row['MaLop']) . "'>Chi tiết</a></span></td>
                                                </tr>";
                                            $sn++;
                                        }
                                    } elseif (isset($_GET['t']) && !empty($data)) {
                                        foreach ($data as $item) {
                                            echo "
                                                <tr>
                                                    <td>" . htmlspecialchars($sn) . "</td>
                                                    <td>" . htmlspecialchars($item->TenMH) . "</td>
                                                    <td>" . htmlspecialchars($item->MaLop) . "</td>
                                                    <td>" . htmlspecialchars($item->SiSo) . "</td>
                                                    <td>" . htmlspecialchars($item->MaPH) . "</td>
                                                    <td>" . htmlspecialchars($item->Ngay) . "</td>
                                                    <td><a href='takeattendance.php?MaLop=" . urlencode($item->MaLop) . "&Ngay=" . urlencode($item->Ngay) . "'>Điểm danh</a>/
                                                    <span><a href='detailattendance.php?MaLop=" . urlencode($item->MaLop) . "'>Chi tiết</a></span></td>
                                                </tr>";
                                            $sn++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
    
    <!-- Link -->
    <?php include "include/link.php";?>
    <!-- Link -->

</body>

</html>

