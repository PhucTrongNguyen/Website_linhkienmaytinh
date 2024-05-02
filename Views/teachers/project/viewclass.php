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
                <!-- edit -->
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
                        <form method="post">
                          <div class="form-group row mb-3">
                            <label class="form-control-label" id="pos">Tìm kiếm</label>
                              <div class="ml-5 col-xl-3">
                                  <input type="text" class="form-control" name="findTaken" id="exampleInputFirstName" placeholder="Tìm kiếm">
                              </div>
                              <button type="submit" name="view" class="btn btn-primary">Tìm</button>
                          </div>
                        </form>
                      </div>
                    </div>
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
                                <th>Tên Lớp</th>
                                <th>Mã Lớp</th>
                                <th>Tổng sinh viên</th>
                                <th>Thời gian</th>
                                <th>----</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>DD</td>
                                <td>A</td>
                                <td>AD</td>
                                <td>V</td>
                                <td><a href="takeattendance.php">Điểm danh</a>/<span><a href="detailattendance.php">Chi tiết</a></span></td>
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