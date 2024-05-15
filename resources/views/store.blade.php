<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Store</title>
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .container {
                width: 80%;
                max-width: 1200px;
            }
            .table-responsive {
                overflow-x: auto;
                min-width: 100%;
            }
            #layoutSidenav {
                width: 100%; /* Ensure the content area fills the entire width */
                float: none; /* Clear any floats */
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
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        {{-- <li><a class="dropdown-item" href="#!">laung</a></li> --}}
                        <li><hr class="dropdown-divider"/></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./logo.jpg" class="img-fluid logo-img" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-md-6 texr-end">
            <button id="toggleButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleVisibility()">عرض المخزن</button>
            </div>
                <a class="navbar-brand" href="#"><span>المخزن</span></a>
            <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('Layout.sidebar')
            </div> 
            <div id="layoutSidenav_content">
                <main>
                    <div id="dismissal_receiving" style="display: none;">
                        <table id="example" class="table table-striped" style="width:100%">
                        </table>
                        <div class="card">
                            <div class="card-header text-end">جدول المخزن <i class="fas fa-table mt-1"></i>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th scope="col">الكمية المتوفر</th>
                                    <th scope="col">التكلفة</th>
                                    <th scope="col">متوسط السعر </th>
                                    <th scope="col">سعر التجزي</th>
                                    <th scope="col">سعر الاجمالي</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الوحدة</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">اسم الصنف</th>
                                    <th scope="col">التسلسلي</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th scope="col">الكمية المتوفر</th>
                                    <th scope="col">التكلفة</th>
                                    <th scope="col">متوسط سعر البيع</th>
                                    <th scope="col">سعر البيع التجزي</th>
                                    <th scope="col">سعر البيع الاجمالي</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الوحدة</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">اسم الصنف</th>
                                    <th scope="col">الرقم التسلسلي</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div id="table">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-light shadow mt-2" id="cardContainer">
                                    <div class="card bg-light shadow-lg border-3">
                                        <div class="card-body">
                                            <div class="select row mb-2" aria-label="Forms toggle">
                                                <select class="form-select text-center" onchange="toggleForm(this)">
                                                    <option value="dismissal">اذن صرف</option>
                                                    <option value="receiving">اذن استلام</option>
                                                </select>
                                            </div>
                                            <div class="card shadow-lg border-0" id="dismissalForm">
                                                <div class="card-body">
                                                    <form class="mb-1" novalidate action="المخزن.php" method="post">
                                                        <div class="row g-1">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control text-center" placeholder="اذن صرف" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="اسم القطعة">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" class="form-control text-center" id="validationCustomAddress" required placeholder="الرقم التسلسلي">
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <input type="number" class="form-control text-center" id="Unit" required placeholder="الوحدة">
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <input type="number" class="form-control text-center" id="validationCustomAddress" required placeholder="الكمية">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select id="validationServer04" class="form-select text-center" aria-describedby="validationServer04Feedback" required>
                                                                    <option selected>نوع الصرف</option>
                                                                    <option>صرف تشغيلي</option>
                                                                    <option>صرف خدمي</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-floating col-md-12 mb-1">
                                                                <textarea class="form-control" placeholder="Description" id="floatingTextarea"></textarea>
                                                                <label class="text-center" for="floatingTextarea">ملاحظات</label>
                                                            </div>
                                                            <div class="col-12 text-center">
                                                                <button type="SUBMIT" class="col-6 btn btn-danger">موافق</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card shadow-lg border-0" id="receivingForm" style="display: none;">
                                                <div class="card-body">
                                                    <form class="mb-1" novalidate action="المخزن.php" method="post">
                                                        <div class="row g-1">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control text-center" id="AddacategoryFields" required placeholder="استلام" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="اسم القطعة">
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <input type="number" class="form-control text-center" id="Unit" required placeholder="الوحدة">
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="الكمية">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="الرقم التسلسلي">
                                                            </div>
                                                            <div class="form-floating col-md-12">
                                                                <textarea class="form-control" placeholder="Description" id="floatingTextarea"></textarea>
                                                                <label class="text-center" for="floatingTextarea">ملاحظات</label>
                                                            </div>
                                                            <div class="col-12 text-center">
                                                                <button type="SUBMIT" class="col-6 btn btn-success">موافق</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script>
            function toggleVisibility() {
                var dismissalReceiving = document.getElementById('dismissal_receiving');
                var tableContainer = document.getElementById('tableContainer');

                if (dismissalReceiving.style.display === 'none') {
                    dismissalReceiving.style.display = 'block';
                    tableContainer.style.display = 'none';
                } else {
                    dismissalReceiving.style.display = 'none';
                    tableContainer.style.display = 'block';
                }
            }

                        function toggleForm(selectElement) {
                var dismissalForm = document.getElementById('dismissalForm');
                var receivingForm = document.getElementById('receivingForm');

                if (selectElement.value === 'dismissal') {
                    dismissalForm.style.display = 'block';
                    receivingForm.style.display = 'none';
                } else if (selectElement.value === 'receiving') {
                    dismissalForm.style.display = 'none';
                    receivingForm.style.display = 'block';
                }
            }
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    </body>
</html>
