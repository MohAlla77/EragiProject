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
        <style>
            .separator-line {
                border-top: 2px solid black;
                margin-top: 20px; /* Adjust the margin as needed */
                margin-bottom: 20px; /* Adjust the margin as needed */
            }
            body {
                background-image: url('img/logo-inch.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .card {
                background-color: rgba(255, 255, 255, 0.7); /* Adjust the last value (0.7) to change the transparency */
                /* Other existing styles for the card */
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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        {{-- <li class="dropdown">
                            <a class="dropdown-item dropdown-toggle" href="#" role="button" id="navbarDropdownLanguage"
                                data-bs-toggle="dropdown" aria-expanded="false"> Language <i class="fa-solid fa-language"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLanguage">
                                <li><a class="dropdown-item" href="#!">العربية</a></li>
                                <li><a class="dropdown-item" href="#!">English</a></li>
                            </ul>
                        </li> --}}
                        <li><hr class="dropdown-divider"/></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./assets/img/logo-inch.jpg" class="img-fluid logo-img" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
          <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="#"><span>ادارة</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          </form>
            <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('Layout.sidebar')
            </div>
            <div id="layoutSidenav_content" style="height: 25vh; overflow-y: auto;">
                <main>
                    <div class="row mt-5 py-2 mb-2 ms-5 col-12">
                        <div class="col-md-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">ادخال البيانات </h5>
                                    <div class="col-md-12">
                                        <hr class="separator-line">
                                    </div>
                                    <p class="card-text"> إضافة المعلومات المتعلقة بماركات السيارات والموديلات والخدمات</p>
                                    <a href="{{route('Data_Entry')}}" class="btn btn-primary">ادخال البيانات <i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">ادارة المستخدمين</h5>
                                    <div class="col-md-12">
                                        <hr class="separator-line">
                                    </div>
                                    <p class="card-text">إدارة المستخدمين أضف مستخدمين جدد وأعد تعيين كلمة المرور إذا نسيتها</p>
                                    <a href="{{route('User_management')}}" class="btn btn-primary">ادارة المستخدمين <i class="fa-solid fa-user"></i></a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">التقارير</h5>
                                    <div class="col-md-12">
                                        <hr class="separator-line">
                                    </div>
                                    <p class="card-text">توفر معلومات قيمة وتقدم التقرير. لمحة عامة عن البيانات التي تم جمعها</p>
                                    <a href="{{route('Reports')}}" class="btn btn-primary">التحصيل <i class="fas fa-book-open"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr class="separator-line">
                        </div>
                        <div class="col-md-6">
                            <div class="card text-center"{{-- style="width: 18rem;" --}}>
                                <div class="card-body">
                                    <h5 class="card-title">العملاء</h5>
                                    <div class="col-md-12">
                                        <hr class="separator-line">
                                    </div>
                                    <p class="card-text">معلومات العملاء{{-- <br> --}}(اسم,هاتف,اللوحة)</p>
                                    <a href="{{route('Customers')}}" class="btn btn-primary">العملاء <i class="fa-solid fa-person"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- 
                        <div class="col-md-6">
                            <div class="card text-center" {{-- style="width: 18rem;" >
                                <div class="card-body">
                                    <h5 class="card-title">طلبات الموظفين</h5>
                                    <div class="col-md-12">
                                        <hr class="separator-line">
                                    </div>
                                    <p class="card-text">(سلفة, عهدة,اذن خروج,اجازة مرضية,اجازة)</p>
                                    <a href="{{route('Employee_requests')}}" class="btn btn-primary">موافق</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">الموظفين</h5>
                                    <div class="col-md-12">
                                        <hr class="separator-line">
                                    </div>
                                    <p class="card-text"></p>
                                    <a href="{{route('employees')}}" class="btn btn-primary">بيانات الموظفين </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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
