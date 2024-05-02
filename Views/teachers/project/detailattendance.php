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
                                <h6 class="m-0 font-weight-bold text-primary">Lớp điểm danh</h6>
                              </div>
                            <div class="table-responsive p-3">
                              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                  <tr>
                                    <th>STT</th>
                                    <th>Họ</th>
                                    <th>Tên</th>
                                    <th>Lớp</th>
                                    <th>Mã lớp học phần</th>
                                    <th>Tình Trạng</th>
                                    <th>Thời gian</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>A</td>
                                      <td>B</td>
                                      <td>C</td>
                                      <td>D</td>
                                      <td style='background-color:".$colour."'>....</td>
                                      <td>E</td>
                                    </tr>
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