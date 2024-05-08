@extends('Layout.head')
<style>
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

<body class="sb-nav-fixed">
    {{-- <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img"
                    alt="Logo"></a>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="{{ route('invoice.index') }}"> المبيعات</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </form>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav> --}}
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header text-end">مبيعات الخدمات <i class="fas fa-table me-4"></i></div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>القرار</th>
                                    <th>حالة الخدمة</th>
                                    <th>مجموعة الخدمة</th>
                                    <th>نوع الخدمة</th>
                                    <th>سعر التكلفة</th>
                                    <th>رقم الخدمة</th>
                                    <th>اسم الخدمة</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>القرار</th>
                                    <th>حالة الخدمة</th>
                                    <th>مجموعة الخدمة</th>
                                    <th>نوع الخدمة</th>
                                    <th>سعر التكلفة</th>
                                    <th>رقم الخدمة</th>
                                    <th>اسم الخدمة</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if (isset($Services))


                                @foreach ($Services as $service)
                                    <tr>
                                        <td>
                                            <form action="{{ route('ApproveService', $service->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <button type="submite" class="btn btn-primary">
                                                    موافق
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $service->status }}</td>
                                        <td>{{ $service->serviceGroup->name }}</td>
                                        <td>{{ $service->service_type }}</td>
                                        <td>{{ $service->cost_price }}</td>
                                        <td>{{ $service->service_id }}</td>
                                        <td>{{ $service->name }}</td>
                                    </tr>
                                @endforeach

                                @endif
                            </tbody>
                        </table>
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
