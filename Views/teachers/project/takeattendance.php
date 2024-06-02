<script>
        // Hiển thị thông báo và chuyển hướng sau khi nhấn nút "Okay"
        function redirectBack() {
            window.location.href = 'viewclass.php'; // Đường dẫn của trang viewclass.php
        }
</script>
<?php
include 'include/connect.php';

// Kiểm tra nếu không có tham số MaLop trên URL
if (!isset($_GET['MaLop']) || !isset($_GET['Ngay'])) {
    // Redirect hoặc hiển thị thông báo lỗi
    // Ví dụ:
    header("Location: viewclass.php"); // Chuyển hướng về trang viewclass.php
    exit(); // Dừng việc thực thi mã PHP tiếp theo
}

$MaLop = $_GET['MaLop'];
$Ngay = $_GET['Ngay'];

// Truy vấn cơ sở dữ liệu để lấy danh sách sinh viên
$sql = "SELECT dssv.MaSV, dssv.MaLop, sv.HoTenSV, sv.MaLNC, lhp.MaMH
        FROM danhsachsinhvien_lophocphan dssv
        JOIN sinhvien sv ON dssv.MaSV = sv.MaSV
        JOIN lophocphan lhp ON dssv.MaLop = lhp.MaLop
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
function kiemTraDiemDanh($conn, $MaLop, $Ngay) {
    // Truy vấn SQL để kiểm tra xem đã có dữ liệu điểm danh cho lớp và ngày đó chưa
    $sql = "SELECT COUNT(*) AS count FROM bangdiemdanh WHERE MaLop = :MaLop AND NgayDiemDanh = :Ngay";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':Ngay', $Ngay);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Nếu có ít nhất một bản ghi tức là đã điểm danh, trả về true
    if ($result['count'] > 0) {
        return true;
    } else {
        return false;
    }
}

// Xử lý khi nút Take Attendance được nhấn
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Kiểm tra xem ngày điểm danh đã được gửi lên từ form chưa
    if (!empty($_POST['Ngay'])) {
        $Ngay = $_POST['Ngay'];

        if (kiemTraDiemDanh($conn, $MaLop, $Ngay)) {
            echo "<script>alert('Lớp học phần này đã được điểm danh'); redirectBack();</script>";
        } else {
        // Lặp qua mảng status để xử lý trạng thái điểm danh của từng sinh viên
        foreach ($_POST['status'] as $MaSV => $trangThai) {
            // Lưu trạng thái điểm danh vào bảng bangdiemdanh
            $sql_diemdanh = "INSERT INTO bangdiemdanh (MaSV, MaLop, NgayDiemDanh, TrangThaiDiemDanh) VALUES (:MaSV, :MaLop, :Ngay, :TrangThai)";
            $stmt_diemdanh = $conn->prepare($sql_diemdanh);
            $stmt_diemdanh->bindParam(':MaSV', $MaSV);
            $stmt_diemdanh->bindParam(':MaLop', $MaLop);
            $stmt_diemdanh->bindParam(':Ngay', $Ngay);
            $stmt_diemdanh->bindParam(':TrangThai', $trangThai);
            $stmt_diemdanh->execute();
            
            
        }
    }
        // Hiển thị thông báo hoặc thực hiện các hành động tiếp theo sau khi điểm danh thành công
        echo "<script>alert('Điểm danh thành công!'); redirectBack();</script>";// Chuyển hướng về trang viewclass.php
        exit(); 
    } else {
        echo "<script>alert('Vui lòng chọn ngày điểm danh!');</script>";
    }
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
  <title>Attendance</title>
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
        <h1 class="h3 mb-0 text-gray-800">Điểm danh (Ngày: <?php echo"$Ngay" ?>)</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="viewclass.php">Xem lớp</a></li>
            <li class="breadcrumb-item active" aria-current="page">Điểm danh</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <form method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Sinh viên trong lớp học phần: <?php echo"$MaLop" ?></h6>
                                <h6 class="m-0 font-weight-bold text-danger">Lưu ý: <i>Chọn vào ô ở phần tỉnh trạng để điểm danh</i></h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>STT</th>
                                            <th>MaSV</th>
                                            <th>Tên SV</th>
                                            <th>Lớp niên chế</th>
                                            <th>Lớp học phần</th>
                                            <th>Môn học</th>
                                            <th>Trạng thái</th>
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
                                                    echo "<td>" . $row['MaMH'] . "</td>";
                                                    // Thêm input hidden để lưu giá trị 0 khi checkbox không được chọn
                                                    echo "<input type='hidden' name='status[" . $row['MaSV'] . "]' value='0'>";
                                                    // Checkbox
                                                    echo "<td><input name='status[" . $row['MaSV'] . "]' type='checkbox' value='1' class='form-control'></td>";
                                                    echo "</tr>";
                                                    $sn++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6'>Không có sinh viên nào trong lớp học phần này.</td></tr>";
                                            }
                                        ?>
                                </tbody>
                            </table>
                            <br>
                            <input type="hidden" name="Ngay" value="<?= $Ngay ?>">
                            <button type="submit" name="save" class="btn btn-primary">Take Attendance</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
