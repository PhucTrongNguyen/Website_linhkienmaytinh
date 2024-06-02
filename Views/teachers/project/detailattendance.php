<?php 
include 'include/connect.php';

if (!isset($_GET['MaLop'])) {
  // Redirect hoặc hiển thị thông báo lỗi
  // Ví dụ:
  header("Location: viewclass.php"); // Chuyển hướng về trang viewclass.php
  exit(); // Dừng việc thực thi mã PHP tiếp theo
}

$MaLop = $_GET['MaLop'];

$sql = "SELECT dssv.MaSV, dssv.MaLop, sv.HoTenSV, sv.MaLNC, mh.TenMH, dssv.TrangThaiDiemDanh, dssv.NgayDiemDanh
        FROM bangdiemdanh dssv
        JOIN sinhvien sv ON dssv.MaSV = sv.MaSV
        JOIN lophocphan lhp ON dssv.MaLop = lhp.MaLop
        JOIN monhoc mh ON lhp.MaMH = mh.MaMH
        WHERE dssv.MaLop = :MaLop";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':MaLop', $MaLop);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() == 0) {
  // Redirect hoặc hiển thị thông báo lỗi
  // Ví dụ:
  header("Location: viewclass.php"); // Chuyển hướng về trang viewclass.php
  exit(); // Dừng việc thực thi mã PHP tiếp theo
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Detail</title>
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
                <!-- edit -->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">Chi tiết điểm danh</h1>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="viewclass.php">Xem lớp</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết điểm danh</li>
                      </ol>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="card mb-4">
                              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Lớp điểm danh <?php echo"$MaLop" ?> </h6>
                              </div>
                            <div class="table-responsive p-3">
                              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                <tr>
                                  <th>STT</th>
                                  <th>MaSV</th>
                                  <th>Tên SV</th>
                                  <th>Lớp niên chế</th>
                                  <th>Lớp học phần</th>
                                  <th>Môn học</th>
                                  <th>Trạng thái</th>
                                  <th>Thời gian</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                            $sn = 1;
                                            if ($stmt->rowCount() > 0) {
                                                foreach ($result as $row) {
                                                    echo "<tr>";
                                                    echo "<td>" . $sn . "</td>";
                                                    echo "<td>" . $row['MaSV'] . "</td>";
                                                    echo "<td>" . $row['HoTenSV'] . "</td>";
                                                    echo "<td>" . $row['MaLNC'] . "</td>";
                                                    echo "<td>" . $row['MaLop'] . "</td>";
                                                    echo "<td>" . $row['TenMH'] . "</td>";
                                                    echo "<td>" . ($row['TrangThaiDiemDanh'] == 0 ? "Vắng" : "Có mặt") . "</td>";

                                                    echo "<td>" . $row['NgayDiemDanh'] . "</td>";
                                                    $sn++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6'>Không có sinh viên nào trong lớp học phần này.</td></tr>";
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