@extends('Layout.head')

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
                    {{-- <div class="sb-sidenav-menu">
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
                            <a class="nav-link text-white" href="{{route('purchases')}}">
                                <div class="sb-nav-link-icon text-white"></div>
                                <span class="ms-auto pe-2">المشتريات</span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>
                            <a class="nav-link text-white" href="{{route('invoice.index')}}">
                                <div class="sb-nav-link-icon text-white"></div>
                                <span class="ms-auto pe-2">المبيعات</span><i class="fa-brands fa-salesforce"></i>
                            </a>
                            <a class="nav-link text-white text-end" href="{{route('Tries')}}">
                                <div class="sb-nav-link-icon text-white"></div>
                                <span class="ms-auto pe-2">اطارات</span><i class="fa-brands fa-salesforce"></i>
                            </a>
                            <a class="nav-link text-white" href="{{route('store')}}">
                                <div class="sb-nav-link-icon text-white"></div>
                                <span class="ms-auto pe-2">المخزن</span><i class="fas fa-database"></i>
                            </a>
                            <a class="nav-link text-white" href="{{route('Manage')}}">
                                <div class="sb-nav-link-icon text-white"></div>
                                <span class="ms-auto pe-2">ادارة</span><i class="fas fa-cogs"></i>
                            </a>
                        </div>                
                    </div>                 --}}
                </nav>
            </div>
            <div id="layoutSidenav_content" class="sidebar-collapsed">
                <main>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div id="displayCard" style="display: none;">
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control text-center bg-info" placeholder="عرض بيانات الموظفين" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="submit" name="add" class="btn btn-danger col-12"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                        <div class="col-md-10">
                                            {{-- <form action="{{route('employees.search')}}" method="GET">
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-center" name="plateNumber"
                                                        placeholder="بحث">
                                                    <button class="btn btn-outline-success" type="search">بحث</button>
                                                </div>
                                            </form> --}}
                                        </div>
                                    </div>
                                    <form action="{{Route('employees')}}" method="post">
                                        <div class="row">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    @if(isset($emloyees))
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                             <div class="row g-1">
                                                           
                                                                <div class="col-md-6"> 
                                                                    <input class="form-control text-center" 
                                                                    value="{{$employees->employees_name}}"
                                                                     placeholder="الاسم" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_Job_number}}"
                                                                    placeholder="الرقم الوظيفي" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    
                                                                    value="{{$employees->employees_Email}}"
                                                                    placeholder="البريد الالكتروني" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-group position-relative">
                                                                        <span class="input-group-text">+966</span>
                                                                        <input class="form-control text-center" 
                                                                        value="{{$employees->employees_phone_number}}"
                                                                        placeholder="رقم الهاتف" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_direct_day}}"
                                                                    placeholder="يوم المباشرة" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_department}}"
                                                                    placeholder="الوظيفه" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_salary}}"
                                                                    placeholder="الراتب" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_address}}"
                                                                     placeholder="العنوان" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_Workplace}}"
                                                                    placeholder="مكان العمل" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_marital_status}}"
                                                                    placeholder="الحالة الاجتماعية" readonly>
                                                                </div>
                                                                <div class="col-md-12 bm-2">
                                                                    <input class="form-control text-center"
                                                                    value="{{$employees->employees_Nationality}}"
                                                                    placeholder="الجنسية" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr class="separator-line">
                                                                </div>
                                                                <div class="row mt-4 mb-2">
                                                                    <div class="col-md-4">
                                                                        <input class="form-control text-center" placeholder="مستحقات" readonly>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label class="form-label inline"> مستحقات</label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input class="form-control text-center" placeholder="عُهد" readonly>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label class="form-label inline"> عُهد</label>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" 
                                                                class="card-img-top" 
                                                                value="{{$employees->employees_image}}" alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12" id="inputCard">
                                    <form class="mb-1" action="{{ route('employee.store') }}" method="post">
                                        @csrf
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input type="text" class="form-control text-center bg-info" placeholder="ادخال بيانات الموظفين" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input name="e-Email" type="text" class="form-control text-center" placeholder="البريد الالكتروني">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input name="name" type="text" class="form-control text-center" placeholder="الاسم" required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <div class="input-group position-relative">
                                                            <span class="input-group-text">+966</span>
                                                            <input name="phone_number" class="form-control text-center" placeholder="رقم الهاتف"required>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-6 mb-2">
                                                        <input name="department" type="text" class="form-control text-center" placeholder="الوظيفه"required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <div class="input-group position-relative">
                                                            <span class="input-group-text"> ريال .</span>
                                                        <input name="salary" class="form-control text-center" placeholder="الراتب"required>
                                                    </div>
                                                    </div>
                                                    <div class="row col-6 mb-2">
                                                        <div class="col-md-9">
                                                            <input name="department" type="date" class="form-control text-center"required>
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                            <label name="direct_day" class="form-label inline">يوم المباشرة</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input name="address" type="text" class="form-control text-center" placeholder="العنوان"required>
                                                    </div>
                                                    <div class="row col-6 mb-2">
                                                        <div class="col-md-9 select" aria-label="form-toggle">
                                                        <select name="workplace" class="form-select text-center">
                                                            @foreach ($workplaces as $workplace)

                                                            <option value="{{$workplace}}">{{$workplace}}</option>
                                                                
                                                            @endforeach
                                                            
                                                            
                                                        </select>
                                                    </div>
                                                        <div class="col-md-3 text-end">
                                                            <label class="form-label inline"> مكان الفرع</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input name="marital_status" type="text" class="form-control text-center" placeholder="الحالة الاجتماعية"required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input name="nationality" type="text" class="form-control text-center" placeholder="الجنسية"required>
                                                    </div>
                                                    <div class="row mb-3"> 
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="file" id="formFile">
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <label for="formFile" class="form-label inline">ارفاق صورة</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" footer col-12 text-center">
                                                    <button type="submit" class="btn btn-success col-6 float-right">اضافة <i class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

    </body>

