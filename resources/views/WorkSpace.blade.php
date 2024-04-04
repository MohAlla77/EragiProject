<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ساحة العمل</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 15px;
            /* Adjust height as needed */
            border-radius: 5px;
            /* Adjust border radius as needed */
            outline: none;
            margin: 10px 0;
            /* Adjust margin as needed */
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            /* Adjust thumb width as needed */
            height: 20px;
            /* Adjust thumb height as needed */
            border-radius: 50%;
            /* Round thumb */
            background: white;
            /* Thumb color */
            cursor: pointer;
        }

        .logo-img {
            width: 55px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-right: 20px;
            /* Adjust the margin as needed */
        }

        .inner-card {
            padding: 15px;
            /* Adjust padding as needed */
            margin-bottom: 15px;
            /* Adjust margin as needed */
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
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
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
            <a class="navbar-brand"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="#"><span>ساحة العمل</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </form>
        <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content" style="height: 25vh; overflow-y: auto;">
            <main>
                <div class="container-fluid mt-4 bg-gradient text-black justify-content-center">
                    @include('shared.error_massege')
                    @include('shared.success_message')
                    @if (isset($car))
                        <div class="alert alert-primary" role="alert">
                            Your Car Status Know is {{ $car->status }}
                        </div>
                    @endif
                    <div class="card bg-light mb-2">
                        <div class="card-body">
                            {{-- <form action="#" method="post" id="carForm"><br> --}}
                            <form action="{{ route('car.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" name="plateNumber"
                                        placeholder="بحث">
                                    <button class="btn btn-outline-success" type="search">بحث</button>
                                </div>
                            </form>
                            <div class="row">
                                @if (isset($car))
                                    <div class="col-md-4 mb-2">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $car->car_name }}" name="carName" required
                                            placeholder="اسم السيارة" readonly>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $car->structure_no }}" name="chassisNumber" required
                                            placeholder="رقم الهيكل" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $car->brand }}" name="carBrand" placeholder="ماركة السيارة" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $car->name }}" name="carBrand" placeholder="مالك السيارة" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input  class="form-control text-center"
                                            value="{{ $car->model }}" name="carModel" placeholder="موديل السيارة" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $car->service }}" name="serviceType" placeholder="نوع الخدمة" readonly>
                                    </div>
                                @endif
                            </div>
                            @if (isset($car) && isset($data) && $car->status === 'WAITING')
                                @include('WorkSpace_Status.waiting')
                            @elseif(isset($car) && isset($data) && ($car->status === 'MAINTENACE' || $car->status === 'DONE'))
                                @include('WorkSpace_Status.main$done')
                            @else
                                {{-- @include('WorkSpace_Status.new') --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        @if (isset($CarHistory))
                                            @php
                                                $user_name = App\Models\User::find($CarHistory->user_name);
                                                $Eng_name = App\Models\User::find($CarHistory->Eng_name);
                                            @endphp
                                            {{-- <div class="row">
                                                <label for="notes"
                                                    class="form-label d-flex justify-content-end">
                                                    الزيارة السابقة
                                                </label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        value="{{ $user_name->first_name }} : الموظف"
                                                        name="carName" required placeholder="اسم الاستقبال">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        name="carName"
                                                        value="{{ $Eng_name->first_name }} : المهندس" required
                                                        placeholder="اسم المهندس">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        name="carName" value=" الشكوى: {{ $CarHistory->fix }}"
                                                        required placeholder="شكوي السابفة">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        name="carName"
                                                        value="الإجراء: {{ $CarHistory->fix_doc }} " required
                                                        placeholder="الاجراءات السابفة">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        name="carName"
                                                        value="   اسم الفنى :  {{ $CarHistory->Worker_name }}  "
                                                        required placeholder="اسم الفني">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        name="carName" value="عدد الزيارات : {{ $countByCarId  }} " required
                                                        placeholder="عدد الزيارات">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        name="carName"
                                                        value="{{ $CarHistory->created_at->format('d/m/y') }}"
                                                        required placeholder="التاريخ">
                                                </div>
                                            </div> --}}
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if (isset($car))
                                            <form action="{{ route('AddCar.check', $car->id) }}" method="POST">
                                                @csrf
                                                <label for="notes" class="form-label d-flex justify-content-end">
                                                    شكاوى العميل
                                                </label>
                                                <div class="numbered-textarea">
                                                    <textarea class="form-control" name="notes" id="notes" style="height: 200px;">
                                                </textarea>
                                                    <div class="line-numbers"></div>
                                                </div>
                                                <div class="d-grid gap-2 col-3 mx-auto py-4">
                                                    <button class="btn btn-primary" type="submit"> أمر فحص <i
                                                            class="fa fa-search" aria-hidden="true"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header text-end">الزيارة السابقة <i class="fas fa-table me-4"></i></div>
                                    <div class="card-body">
                                        @if(isset( $CarHistory))
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>التاريخ</th>
                                                    <th>ساعت العمل</th>
                                                    <th>اسم السيارة</th>
                                                    <th>اسم العميل</th>
                                                    <th>اسم الفني</th>
                                                    <th>الاجراءات السابقة</th>
                                                    <th>الشكاوي السابقه</th>
                                                    <th>اسم المهندس</th>
                                                    <th>اسم الاستقبال</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $CarHistory->created_at->format('d/m/y') }}</td>
                                                    <td>{{$CarHistory->Work_time}} Hours</td>
                                                    <td>{{$car->car_name}}</td>
                                                    <td>{{ $user_name->first_name }}</td>
                                                    <td>{{ $CarHistory->Worker_name }}</td>
                                                    <td>{{ $CarHistory->fix_doc }}</td>
                                                    <td>{{ $CarHistory->fix }}</td>
                                                    <td>{{ $Eng_name->first_name }} </td>
                                                    <td>{{ $user_name->first_name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            @endif{{--
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="tree">
                                                <li>
                                                    <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db1">Database 1</a>
                                                    <ul id="db1" class="collapse mb-0">
                                                        <li class="text-center"><a href="#">Table 2</a></li>
                                                        <li class="text-center"><a href="#">Table 1</a></li>
                                                        <li class="text-center"><a href="#">Table 3</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db2">Database 2</a>
                                                    <ul id="db2" class="collapse mb-0">
                                                        <li class="text-center"><a href="#">Table 4</a></li>
                                                        <li class="text-center"><a href="#">Table 5</a></li>
                                                        <li class="text-center"><a href="#">Table 6</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db3">Database 3</a>
                                                    <ul id="db3" class="collapse mb-0">
                                                        <li class="text-center"><a href="#">Table 7</a></li>
                                                        <li class="text-center"><a href="#">Table 8</a></li>
                                                        <li class="text-center"><a href="#">Table 9</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="tree">
                                                <li>
                                                    <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db1">Database 1</a>
                                                    <ul id="db1" class="collapse mb-0">
                                                        <li class="text-center"><a href="#">Table 2</a></li>
                                                        <li class="text-center"><a href="#">Table 1</a></li>
                                                        <li class="text-center"><a href="#">Table 3</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db2">Database 2</a>
                                                    <ul id="db2" class="collapse mb-0">
                                                        <li class="text-center"><a href="#">Table 4</a></li>
                                                        <li class="text-center"><a href="#">Table 5</a></li>
                                                        <li class="text-center"><a href="#">Table 6</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db3">Database 3</a>
                                                    <ul id="db3" class="collapse mb-0">
                                                        <li class="text-center"><a href="#">Table 7</a></li>
                                                        <li class="text-center"><a href="#">Table 8</a></li>
                                                        <li class="text-center"><a href="#">Table 9</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <canvas id="myChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>



</body>



</html>
