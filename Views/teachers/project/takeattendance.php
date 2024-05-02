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
                      <h1 class="h3 mb-0 text-gray-800">Điểm danh (Ngày : )</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Sinh viên trong lớp ...</h6>
                            <h6 class="m-0 font-weight-bold text-danger">Lưu ý: <i>Chọn vào ô ở phần tỉnh trạng để điểm danh</i></h6>
                          </div>
                          <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover">
                              <thead class="thead-light">
                                <tr>
                                  <th>STT</th>
                                  <th>Họ</th>
                                  <th>Tên</th>
                                  <th>Mã Lớp</th>
                                  <th>Mã Lớp học phần</th>
                                  <th>Tình Trạng</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>B</td>
                                    <td>C</td>
                                    <td>D</td>
                                    <td>E</td>
                                    <td><input name='check[]' type='checkbox' value="" class='form-control'></td>
                                  </tr>
                                  <!--echo "<input name='admissionNo[]' value=".$rows['admissionNumber']." type='hidden' class='form-control'>";-->
                              </tbody>
                            </table>
                            <br>
                            <button type="submit" name="save" class="btn btn-primary">Điểm danh</button>
                            </form>
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