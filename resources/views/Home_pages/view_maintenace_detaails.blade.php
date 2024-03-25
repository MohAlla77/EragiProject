<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>الرئسية</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
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
            width: 60px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-right: 20px;
            /* Adjust the margin as needed */
        }
    </style>
</head>

<body class="sb-nav-fixed">
    @include('Layout.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @include('Layout.sidebar')
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header text-end">السيارات <i class="fas fa-table me-4"></i></div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>القرار</th>
                                    <th>التاريخ</th>
                                    <th>تعليق</th>
                                    <th>الماركة</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    <th>العداد</th>
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>القرار</th>
                                    <th>التاريخ</th>
                                    <th>تعليق</th>
                                    <th>الماركو</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    <th>العداد</th>
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($Cars as $car)
                                    <tr><td>
                                            <form action="{{route('car.ToDone', $car->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    تم
                                                </button>
                                        </td>
                                        </form>
                                        <td>{{ $car->created_at->format('d/m/y h:i A') }}</td>
                                        <td>{{ $car->comment }}</td>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->counter }}</td>
                                        <td>{{ $car->car_name }}</td>
                                        <td>{{ $car->counter }}</td>
                                        <td>{{ $car->structure_no }}</td>
                                        <td>{{ $car->plate }}</td>
                                        <td>{{ $car->phone }}</td>
                                        <td>{{ $car->name }}</td>

                                        <!-- Add more table cells as needed -->
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            @include('Layout.footer')
        </div>
    </div>


    <canvas id="myChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
