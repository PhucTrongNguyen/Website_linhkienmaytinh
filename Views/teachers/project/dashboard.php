<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard</title>
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
                <div id="wrapper">
                    <div id="content-wrapper" class="d-flex flex-column">
                      <div id="content">
                        <div class="container-fluid" id="container-wrapper">
                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Bảng chính giáo viên</h1>
                          </div>
                          <div class="row mb-3">
                            <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card h-100">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sinh viên</div>
                                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">8</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-users fa-2x text-info"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card h-100">
                                <div class="card-body">
                                  <div class="row align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Lớp chủ nhiệm</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">9</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-chalkboard fa-2x text-primary"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card h-100">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Lớp học phần</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-code-branch fa-2x text-success"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card h-100">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng sinh viên điểm danh</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-calendar fa-2x text-warning"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                
                  <!-- Scroll to top -->
                  <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                  </a>
            </div>
        </div>
    </div>
    <!-- Link -->
        <?php include "include/link.php";?>
    <!-- Link -->
</body>

</html>