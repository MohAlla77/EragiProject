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
    </style>
</head>

<body class="sb-nav-fixed">
        @include('Layout.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mx-auto">
                    <h1 class="mt-4">Car condition</h1>
                     <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body text-center">All</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('page.view', 'all')}}">View
                                        Details</a>
                                    <div class="small text-white"><i class="fa-regular fa-comment"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body text-center">In Maintenace</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('page.view' , 'Maintenace')}}">View
                                        Details</a>
                                    <div class="small text-white"><i class="fa-regular fa-comment"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body text-center">Waiting For a Reason</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('page.view', 'Waiting')}}">View
                                        Details</a>
                                    <div class="small text-white"><i class="fa-regular fa-comment"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body text-center">Done</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('page.view', 'done')}}">View
                                        Details</a>
                                    <div class="small text-white"><i class="fa-regular fa-comment"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-black text-white mb-4">
                                <div class="card-body text-center">Need To check</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('page.check')}}">View
                                        Details</a>
                                    <div class="small text-white"><i class="fa-regular fa-comment"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            @extends('Layout.footer')
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

</html>
