{{-- <style>

    /* Custom styles for navbar */
    .nav-link {
        color: #fff;
        /* Change color to red */
        font-size: 18px;
        /* Increase font size to 18 pixels */
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
</style> --}}
{{-- <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li> --}}
                    {{-- <li><a class="dropdown-item" href="#!">Language</a></li> --}}
                    {{-- <li>
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
            <a class="navbar-brand" href="#"><img src="./assets/img/logo-inch.jpg" class="img-fluid logo-img"
                    alt="Logo"></a>
        </div> --}}
        {{-- <button id="toggleButton" class="btn btn-primary col-2 ms-1 float-end" onclick="toggleCards()">ادخال البيانات</button> --}}
        {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="#"><span>طلبات الموظفين</span></a>
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
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content" class="sidebar-collapsed">
            <main> --}}
                @extends('Master')
                @section('title',('Employee_requests'))
                @section('navbarTitle', ('Employee_requests'))
                @section('content')
                    {{-- <form class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row py-2">
                                    <div class="card bg-light col-4">
                                        <img src="./assets/img/logo-inch.jpg" class="img-fluid">
                                    </div>
                                    <div class="card bg-light col-4 text-end">
                                        <div id="dateCard">
                                            <label for="#" class="form-label text-center">من تاريخ</label>
                                            <input type="date" class="form-control text-center mb-1" id="formdate" placeholder="التاريخ">
                                            <label for="#" class="form-label text-center">الي تاريخ</label>
                                            <input type="date" class="form-control text-center mb-1" id="todate" placeholder="التاريخ">
                                        </div>
                                        <div class="form-group text-end" id="amountCard" style="display: none;">
                                            <label for="amount" class="form-label">المبلغ</label>
                                            <input type="text" class="form-control text-center" id="amountInput" placeholder="المبلغ">
                                        </div>
                                        <div class="form-group text-end" id="timeCard" style="display: none;">
                                            <input for="time" type="text" class="form-control text-center" id="timeInput" placeholder="الوقت">
                                        </div>
                                    </div>
                                    <div class="card bg-light col-4">
                                        <div class="form-check text-end">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" onchange="toggleCard('flexCheckDisabled')">
                                            <label class="form-check-label" for="flexCheckDisabled">طلب سلفة</label>
                                        </div>
                                        <div class="form-check text-end">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" onchange="toggleCard('flexCheckCheckedDisabled')">
                                            <label class="form-check-label" for="flexCheckCheckedDisabled">طلب طلب عهدة</label>
                                        </div>
                                        <div class="form-check text-end">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckTimeDisabled" onchange="toggleTimeForm()">
                                            <label class="form-check-label" for="flexCheckTimeDisabled">طلب اذن خروج</label>
                                        </div>
                                        <div class="col-md-12">
                                            <hr class="separator-line">
                                        </div>
                                        <div class="form-check text-end">
                                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                طلب اجازة مرضية
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" >
                                        </div>
                                        <div class="form-check text-end">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled">
                                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                طلب اجازة
                                            </label>
                                        </div>
                                        <div class="form-check text-end">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled">
                                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                طلب بدل اجازة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <label for="sparePartsRequest" class="form-label d-flex justify-content-end">تعليق</label>
                                    <div class="numbered-textarea">
                                        <textarea class="form-control" name="sparePartsRequest" id="sparePartsRequest" style="height: 200px;"></textarea>
                                        <div class="line-numbers"></div>
                                    </div>
                                    <div class="d-grid gap-2 col-3 mx-auto py-4">
                                        <button class="btn btn-primary" type="submit">طلب</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>--}}
                    <div class="card mb-4">
                        <div class="card-header text-end"><i
                                class="fas fa-table me-4"></i></div>
                        <div class="card-body">
                            {{-- <select class="form-select text-center" aria-label="Default select example">
                                <option selected>حدد المنتج</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select> --}}
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>اختيار</th>
                                        <th>نوع الطلب</th>
                                        <th>الرقم الوظيفي</th>
                                        <th>اسم الموظف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @stop
            {{-- </main> --}}
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
        {{-- </div>
    </div> --}}
    {{-- <script>
                        function toggleCard(checkboxId) {
                var dateCard = document.getElementById('dateCard');
                var amountCard = document.getElementById('amountCard');
                var timeCard = document.getElementById('timeCard');
                var checkbox = document.getElementById(checkboxId);

                if (checkbox.checked) {
                    // If the checkbox is checked, hide the date card and show the appropriate card
                    dateCard.style.display = 'none';
                    if (checkboxId === 'flexCheckDisabled') {
                        amountCard.style.display = 'block';
                    } else if (checkboxId === 'flexCheckCheckedDisabled') {
                        amountCard.style.display = 'block'; // Assuming you meant amount card here
                    }
                } else {
                    // If the checkbox is unchecked, show the date card and hide all other cards
                    dateCard.style.display = 'block';
                    amountCard.style.display = 'none';
                    timeCard.style.display = 'none';
                }
            }

            function toggleTimeForm() {
                var timeCard = document.getElementById('timeCard');
                var timeCheckbox = document.getElementById('flexCheckTimeDisabled');

                // Toggle the visibility of the time card based on the checkbox state
                if (timeCheckbox.checked) {
                    timeCard.style.display = 'block';
                } else {
                    timeCard.style.display = 'none';
                }
            }
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</body> --}}