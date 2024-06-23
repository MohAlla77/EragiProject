<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link href="css/styles.css" rel="stylesheet" />
        {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        {{--data table--}}
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <script src="js/scripts.js"></script>

        <style>
            .logo-img {
                width: 55px; /* Adjust the width as needed */
                height: auto; /* Maintain aspect ratio */
                margin-right: 20px; /* Adjust the margin as needed */
            }
            .inner-card {
                padding: 15px; /* Adjust padding as needed */
                margin-bottom: 15px; /* Adjust margin as needed */
            }
            .navbar-nav .nav-item {
                width: 100%;
                height: auto;
                margin-right: 10px;
            }
            #invoiceButton {
                padding: 0.350rem 0.55rem;
            }
        </style>
    </head>
    <body>
        <header>
            @section('navbar')
                <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    @auth
                    @php
                        $navbarLinks = $navbarLinks ?? [];
                    @endphp

                    <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                        <div class="container-fluid">
                            <a class="navbar-brand"><img src="./assets/img/logo-inch.jpg" class="img-fluid logo-img" alt="Logo"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        {{-- @foreach ($navbarLinks as $link)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route($link['route']) }}">{{ $link['name'] }}</a>
                            </li>
                        @endforeach --}}
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                @if (isset($page) && $page === 'purchases')
                                    <li class="nav-item">
                                        <button id="invoiceButton" class="btn btn-primary me-2" onclick="toggleInvoiceForm()">جدول المشتريات والفاتورة</button>
                                    </li>
                                @endif
                                @if (isset($page) && $page === 'Tires')
                                    <li class="nav-item">
                                        <button id="combinedButton" class="btn btn-primary me-2" onclick="toggleCardView(); toggleInvoiceForm();">ادخال\فاتورة الاطارات</button>
                                    </li>
                                @endif
                                {{-- @if (isset($page) && $page === 'inventory')
                                    <li class="nav-item">
                                        <button id="toggleButton" class="btn btn-primary me-2" onclick="toggleVisibility()">الجدول المخزن</button>
                                    </li>
                                @endif --}}
                                @if (isset($page) && $page === 'Employees')
                                    <li class="nav-item">
                                        <button id="toggleButton" class="btn btn-primary" onclick="toggleCards()">ادخال البيانات الموظفين</button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                                                {{-- <a class="navbar-brand" href="#"><i class="fa-regular fa-bell"></i></a> --}}
                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            {{-- <a class="navbar-brand" href="{{ route('home') }}"></a> --}}
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </form>
                        {{-- <div>
                            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
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
                        </div> --}}
                    @endauth
                    @guest
                        <div>
                            <a class="" href="{{ route('register') }}">Register</a>
                            <a class="" href="{{ route('login') }}">Login</a>
                        </div>
                        {{-- <div>
                            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                                <a class="navbar-brand" href="{{ route('login') }}"><span>الرئيسية</span></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </form>
                        </div>
                            <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> --}}
                    @endguest
                </nav>
            @show
        </header>
        <div id="layoutSidenav">
            @section('sidebar')
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <a class="nav-link text-white" href="{{route('home')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">الرئيسية</span><i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                                <a class="nav-link text-white" href="{{route('new.car')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">سيارة جديدة</span> <i class="fa fa-car" aria-hidden="true"></i>
                                </a>
                                <a class="nav-link text-white" href="{{route('Workspace')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">ساحة العمل</span><i class="fa fa-briefcase" aria-hidden="true"></i>
                                </a>
                                <a class="nav-link dropdown-toggle text-white" href="{{route('purchases')}}" id="purchasesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">المشتريات</span>
                                </a>
                                <ul class="dropdown-menu text-center" aria-labelledby="#">
                                    <li><a class="dropdown-item text-center" href="{{route('purchases')}}">الفواتير</a></li>
                                    <li><a class="dropdown-item text-center" href="{{route('Categorize')}}">الأصناف</a></li>
                                    <li><a class="dropdown-item text-center" href="{{route('Supplier')}}">الموردين</a></li>
                                </ul>
                                <a class="nav-link dropdown-toggle text-white" href="{{route('invoice.index')}}" id="invoice.indexDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">المبيعات</span>
                                </a>
                                <ul class="dropdown-menu text-center" aria-labelledby="#">
                                    <li><a class="dropdown-item text-center" href="{{route('invoice.index')}}">الفواتير</a></li>
                                    <li><a class="dropdown-item text-center" href="{{route('Service.index')}}">الخدمات</a></li>
                                    <li><a class="dropdown-item text-center" href="{{route('Pricing.index')}}">التسعير</a></li>
                                </ul>

                                <a class="nav-link text-white text-end" href="{{route('Tries')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">اطارات</span><i class="fa-brands fa-salesforce"></i>
                                </a>
                                <a class="nav-link text-white" href="{{route('Store')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">المخزن</span><i class="fas fa-database"></i>
                                </a>
                                <a class="nav-link text-white" href="{{route('Reports')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">تقارير</span><i class="fa-solid fa-display"></i>
                                </a>
                                <a class="nav-link dropdown-toggle text-white" href="{{route('Employees')}}" id="invoice.indexDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">HR</span>
                                </a>
                                <ul class="dropdown-menu text-center" aria-labelledby="#">
                                    <li><a class="dropdown-item text-center" href="{{route('Employees')}}">الموظفين</a></li>
                                    <li><a class="dropdown-item text-center" href="#">طلبات الموظفين</a></li>
                                </ul>
                                <a class="nav-link text-white" href="{{route('Data_Entry')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">ادخال البيانات</span><i class="fa fa-pencil-square" aria-hidden="true"></i>
                                </a>
                                {{-- <a class="nav-link text-white" href="{{route('Manage')}}">
                                    <div class="sb-nav-link-icon text-white"></div>
                                    <span class="ms-auto pe-2">ادارة</span><i class="fas fa-cogs"></i>
                                </a> --}}
                                {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                    <li class="nav-item dropdown"> --}}
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">الاعدادات<i class="fa fa-cog" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="{{route('profile')}}">Profile
                                                    <i class="fas fa-user fa-fw"></i>
                                                    <li><hr class="dropdown-divider"/></li>
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Logout
                                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                {{-- </ul>     --}}
                            </div>
                        </div>
                    </nav>
                </div>
            @show
            <div id="layoutSidenav_content" style="height: 100vh; overflow-y: auto;">
                <main>
                    @yield('content')
                </main>
                {{-- <footer class="py-4 bg-light mt-auto">
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
                </footer> --}}
            </div>
        </div>
        {{-- <script>
            function toggleInvoiceForm() {
                var form = document.getElementById("invoiceForm");
                if (form.style.display === "none" || form.style.display === "") {
                    form.style.display = "block";
                } else {
                    form.style.display = "none";
                }
            }
        </script> --}}
    </body>
</html>