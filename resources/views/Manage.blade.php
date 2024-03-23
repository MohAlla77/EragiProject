<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ادارة</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><span class="text-white">INCH CAR MAINTENANCE</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
          <!-- Navbar Search-->
          <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="#"><span>ادارة</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider"/></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link text-white" href="index.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa fa-home" aria-hidden="true"></i></i></div>
                                الرئيسية
                            </a>
                            <a class="nav-link text-white" href="مركبه_جديدة .php">
                                <div class="sb-nav-link-icon text-white"><i class="fa fa-car" aria-hidden="true"></i></i></div>
                                سيارة جديدة
                            </a>
                            <a class="nav-link text-white" href="قطع الغيار.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-cube"></i></div>
                                طلب قطع الغيار
                            </a>
                            <a class="nav-link text-white" href="المخزن.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-database"></i></div>
                                المخزن
                            </a>
                            <a class="nav-link text-white" href="المشتريات.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                                المشتريات
                            </a>
                            <!--<a class="nav-link text-white" href="المبيعات.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                                المبيعات
                            </a>-->
                            <a class="nav-link text-white" href="الفواتير.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-file-invoice"></i></div>
                                الفواتير
                            </a>
                            <a class="nav-link text-white" href="العملاء.php">
                                <div class="sb-nav-link-icon text-white me-2"><i class="fas fa-tachometer-alt"></i></div>
                                العملاء
                            </a>
                            <a class="nav-link text-white" href="التحصيل.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open"></i></div>
                                التقارير
                            </a>
                            <a class="nav-link text-white" href="ادارة.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-cogs"></i></div>
                                ادارة
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-sm mt-5 bg-gradient text-black justify-content-center">
                        <div class="row align-items-center justify-content-center">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">ادخال البيانات </h5>
                                    <p class="card-text">اضافة بيانات وتعديل والحذف السيارات </p>
                                    <a href="ادوات السيارات.php" class="btn btn-primary">ادوات السيارات</a>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> الخدمات</h5>
                                    <p class="card-text">اضافة الخدمات الجديدة وتعديل والحذف </p>
                                    <a href="اضافة الخدمات.php" class="btn btn-primary">اضافة الخدمات</a>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">ادارة المستخدمين</h5>
                                    <p class="card-text">اضافة مستخدم جديد / تغير الباسوير في حال تم نسيانة</p>
                                    <a href="الموظفين.php" class="btn btn-primary">الموظفين</a>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="التحصيل.php" class="btn btn-primary">التقارير</a>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="العملاء.php" class="btn btn-primary">العملاء</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
