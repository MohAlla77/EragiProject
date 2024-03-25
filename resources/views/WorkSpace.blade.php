<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ساحة العمل</title>
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
    </style>
</head>

<body class="sb-nav-fixed">

    <!-- Start Navbar-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- Sidebar Toggle-->
        <!-- Navbar Brand-->
        <!-- Sidebar Toggle-->
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
            <a class="navbar-brand"><img src="public/logoeragi.jpg" class="img-fluid logo-img" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-5 bg-gradient text-black justify-content-center">

                    @include('shared.error_massege')
                    @include('shared.success_message')

                    @if (isset($car))
                        <div class="alert alert-primary" role="alert">
                            Your Car Status Know is {{ $car->status }}
                        </div>
                    @endif


                    <div class="card bg-light">


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
                                    <input type="text" class="form-control text-center" value="{{ $car->car_name }}"
                                        name="carName" required placeholder="اسم السيارة">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control text-center"
                                        value="{{ $car->structure_no }}" name="chassisNumber" required
                                        placeholder="رقم الهيكل">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control text-center"
                                        value="{{ $car->brand }}" name="carBrand" placeholder="ماركة السيارة">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control text-center"
                                        value="{{ $car->name }}" name="carBrand" placeholder="مالك السيارة">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control text-center"
                                        value="{{ $car->model }}" name="carModel" placeholder="موديل السيارة">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control text-center"
                                        value="{{ $car->service }}" name="serviceType" placeholder="نوع الخدمة">
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
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            @if (isset($CarHistory))
                                                @php
                                                    $user_name = App\Models\User::find($CarHistory->user_name);
                                                    $Eng_name = App\Models\User::find($CarHistory->Eng_name);
                                                @endphp
                                                <div class="row">
                                                    <label for="notes" class="form-label d-flex justify-content-end">
                                                        الزيارة السابقة

                                                    </label>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center"
                                                            value="{{  $user_name->first_name }} : الموظف" name="carName" required
                                                            placeholder="اسم الاستقبال">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" name="carName"
                                                        value=" {{$Eng_name->first_name}} : المهندس"
                                                            required placeholder="اسم المهندس">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" name="carName"
                                                        value=" الشكوى: {{$CarHistory->fix}}"
                                                            required placeholder="شكوي السابفة">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" name="carName"
                                                        value="الإجراء: {{$CarHistory->fix_doc}} "
                                                            required placeholder="الاجراءات السابفة">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" name="carName"
                                                        value="الإجراء: {{$CarHistory->fix_doc}} "
                                                            required placeholder="اسم الفني">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center" name="carName"
                                                        value="الإجراء: {{$CarHistory->fix_doc}} "
                                                            required placeholder="عدد الزيارات">
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <input type="text" class="form-control text-center" name="carName"
                                                        value="{{$CarHistory->created_at->format('d/m/y')}}"
                                                            required placeholder="التاريخ">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
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
                                                <button class="btn btn-primary" type="submit"> أمر فحص <i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- <script>
        function searchPlate() {
            var plateNumber = document.getElementById('plateNumber').value;

            // Make an AJAX request to your server
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search.php?plateNumber=' + plateNumber, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Parse the JSON response
                        var data = JSON.parse(xhr.responseText);

                        // Populate the form fields with the retrieved data
                        document.getElementById('carName').value = data.carName;
                        document.getElementById('chassisNumber').value = data.chassisNumber;
                        document.getElementById('carBrand').value = data.carBrand;
                        document.getElementById('carModel').value = data.carModel;
                        document.getElementById('serviceType').value = data.serviceType;
                        document.getElementById('notes').value = data.notes;
                        document.getElementById('sparePartsRequest').value = data.sparePartsRequest;
                    } else {
                        // Handle errors
                        console.error('Error retrieving data');
                    }
                }
            };
            xhr.send();
        }
        document.addEventListener('DOMContentLoaded', function() {
            var textareas = document.querySelectorAll('.numbered-textarea textarea');

            textareas.forEach(function(textarea) {
                var lineNumbersWrapper = textarea.nextElementSibling;

                textarea.addEventListener('input', function() {
                    var lines = textarea.value.split('\n').length;
                    lineNumbersWrapper.innerHTML = '';
                    for (var i = 1; i <= lines; i++) {
                        lineNumbersWrapper.innerHTML += '<span>' + i + '</span>';
                    }
                });

                // Trigger input event to initialize line numbers
                textarea.dispatchEvent(new Event('input'));
            });
        });
    </script> --}}


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
