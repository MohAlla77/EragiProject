@extends('Layout.head')
        <style>
            .logo-img {
                width: 60px; /* Adjust the width as needed */
                height: auto; /* Maintain aspect ratio */
                margin-right: 20px; /* Adjust the margin as needed */
            }
            /* Adjust the layout for right-to-left direction */
            #layoutSidenav {
                display: flex;
                flex-direction: row-reverse; /* Reverse the direction to move the sidebar to the right */
            }

            #layoutSidenav_nav {
                width: 250px; /* Adjust the width as needed */
                transition: width 0.3s ease; /* Add transition effect */
            }

            #layoutSidenav_content {
                flex-grow: 1;
                overflow: auto;
            }

            #sidebarToggle {
                margin-left: auto; /* Push the toggle button to the far right */
            }

            .navbar-toggler {
                display: none; /* Hide the navbar toggler in this layout */
            }
                .logo-img {
                width: 55px; /* Adjust the width as needed */
                height: auto; /* Maintain aspect ratio */
                margin-right: 20px; /* Adjust the margin as needed */
            }
                .inner-card {
                padding: 15px; /* Adjust padding as needed */
                margin-bottom: 15px; /* Adjust margin as needed */
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
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
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <button id="toggleButton" class="btn btn-primary col-2 ms-1 float-end" onclick="toggleCards()">عرض</button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <a class="navbar-brand" href="#"><span>الموظفين</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </form>
            <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        @include('Layout.sidebar')
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" class="sidebar-collapsed" style="height: 25vh; overflow-y: auto;">
                <main>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div id="displayCard" style="display: none;">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="col-md-12 mb-2">
                                                        <input type="text" class="form-control text-center bg-info" placeholder="عرض بيانات الموظفين" readonly>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="submit" name="add" class="btn btn-danger col-12"><i class="fa-solid fa-trash"></i></button>
                                                        </div>
                                                        <div class="col-md-10 mb-2">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-center" name="plateNumber" placeholder="">
                                                                <button class="btn btn-outline-success" type="button" onclick="searchPlate()">بحث</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="row g-2">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="الاسم">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="number" class="form-control text-center" placeholder="الرقم الوظيفي"required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="البريد الالكتروني">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="number" class="form-control text-center" placeholder="رقم الهاتف"required>
                                                                </div>
                                                                <div  class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="يوم المباشرة"required>
                                                                </div>
                                                                <div  class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="الوظيفه"required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="number" class="form-control text-center" placeholder="الراتب"required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="العنوان"required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="مكان العمل"required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" placeholder="الحالة الاجتماعية"required>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control text-center" placeholder="الجنسية"required>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr class="separator-line">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <input type="number" class="form-control text-center" placeholder="مستحقات"required>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label class="form-label inline"> مستحقات</label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="number" class="form-control text-center" placeholder="عهد"required>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label class="form-label inline"> عهد</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="card-img-top" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12" id="inputCard">
                                    <form class="mb-1" action="" method="post">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input type="text" class="form-control text-center bg-info" placeholder="ادخال بيانات الموظفين" readonly>
                                                    </div>                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" placeholder="البريد الالكتروني">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" placeholder="الاسم" required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="number" class="form-control text-center" placeholder="رقم الهاتف"required>
                                                    </div>
                                                    <div  class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" placeholder="الوظيفه"required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="number" class="form-control text-center" placeholder="الراتب"required>
                                                    </div>
                                                    <div class="row col-6 mb-2">
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control text-center"required>
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                            <label class="form-label inline">يوم المباشرة</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" placeholder="العنوان"required>
                                                    </div>
                                                    <div class="row col-6 mb-2">
                                                        <div class="col-md-9 select" aria-label="form-toggle">
                                                        <select class="form-select text-center">
                                                            <option>ينبع الصناعية</option>
                                                            <option>ينبع حي الياقوت</option>
                                                            <option>المدينةالمنورة</option>
                                                        </select>
                                                    </div>
                                                        <div class="col-md-3 text-end">
                                                            <label class="form-label inline"> مكان الفرع</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" placeholder="الحالة الاجتماعية"required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" placeholder="الجنسية"required>
                                                    </div>
                                                    <div class="mb-3  text-end">
                                                        <label for="formFile" class="form-label">ارفاق صورة</label>
                                                        <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                </div>
                                                <div class=" footer col-12 text-center">
                                                    <button type="submit" name="add" class="btn btn-success col-6 float-right">اضافة <i class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
        <script>
            function toggleCards() {
                var inputCard = document.getElementById('inputCard');
                var displayCard = document.getElementById('displayCard');

                if (inputCard.style.display === 'none') {
                    inputCard.style.display = 'block';
                    displayCard.style.display = 'none';
                } else {
                    inputCard.style.display = 'none';
                    displayCard.style.display = 'block';
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

    </body>

