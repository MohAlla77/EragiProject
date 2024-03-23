<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ادارة الفواتير</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- Sidebar Toggle-->


        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider"/></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>


        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <a class="navbar-brand" href="الفواتير.php"><span> فاتورة جديدة </span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </form>
        <!-- Navbar Search-->

        <!-- Navbar-->



        <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                    <div class="container-fluid px-4 mx-auto">
                        <table id="example" class="table table-striped" style="width:100%">
                        </table>
                        <div class="card mb-4">
                            <div class="card-header text-end">جدول الفواتير <i class="fas fa-table me-1"></i>
                            <div class="col-md-12">
                                <select id="invoiceTypeFilter" class="form-select text-center">
                                    <option value="all">كل الفواتير</option>
                                    <option value="فاتوره مبيسطة">فاتورة مبسطة</option>
                                    <option value="فاتورة ضريبية">فاتورة ضريبية</option>
                                    <option value="مرتجع الفواتير">مرتجع الفواتير</option>
                                </select>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">صافي المبلغ </th>
                                    <th scope="col">اسم البائع</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">رقم الفاتورة</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">صافي المبلغ </th>
                                    <th scope="col">اسم البائع</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">رقم الفاتورة</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <th>
                                        <button class="btn btn-primary btn-sm" onclick="window.print()"><i class="fas fa-print"></i></button>
                                        <button class="btn btn-info btn-sm" onclick="displayData()"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-success btn-sm" onclick="sendEmail()"><i class="fas fa-envelope"></i>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tbody>
                            </table>
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
