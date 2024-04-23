<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>اطارات</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <style>
        /* Adjust the layout for right-to-left direction */
        #layoutSidenav {
            display: flex;
            flex-direction: row-reverse;
            /* Reverse the direction to move the sidebar to the right */
        }

        #layoutSidenav_nav {
            width: 250px;
            /* Adjust the width as needed */
            transition: width 0.3s ease;
            /* Add transition effect */
        }

        #layoutSidenav_content {
            flex-grow: 1;
            overflow: auto;
        }

        #sidebarToggle {
            margin-left: auto;
            /* Push the toggle button to the far right */
        }

        .navbar-toggler {
            display: none;
            /* Hide the navbar toggler in this layout */
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
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img"
                    alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <button id="toggleCardViewButton" class="btn btn-primary col-1 pe-2 float-end" onclick="toggleCardView()">جديد <i class="fa-solid fa-file"></i></button>
        <button id="invoiceButton" class="btn btn-primary col-1 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة <i
                class="fas fa-file-invoice"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="#"><span>اطارات</span></a>
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
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @include('Layout.sidebar')
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" class="sidebar-collapsed" style="height: 25vh; overflow-y: auto;">
            <main>
                <div class="card">
                    <form id="invoiceForm" style="height: 100%; display: none;">
                        <div class="card-body">
                            <div class="row g-1">
                                <div class="col-md-12 mb-1">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success col-3"><i
                                                        class="fa fa-bookmark" aria-hidden="true"></i></button>
                                                <button type="submit" id="printButton"
                                                    class="btn btn-primary col-3" onclick="window.print()"><i
                                                        class="fas fa-print"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <!-- Form Billing information Calculator -->
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row g-1">
                                                <div class="col-md-6">
                                                    <select class="form-select text-center" id="paymentMethod"
                                                        name="paymentMethod" aria-label="Default select example">
                                                        <option selected>طريقة الدفع</option>
                                                        <option value="cash">كاش</option>
                                                        <option value="network">شبكة</option>
                                                        <option value="Late payment">اجل</option>
                                                        <option value="Prepaid">مقدم</option>
                                                    </select>
                                                </div>
                                                <div
                                                    class="col-md-6 d-flex justify-content-end align-items-center">
                                                    <input type="text" class="form-control text-center"
                                                        id="reference number" value=""
                                                        placeholder="رقم المرجع">
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-select text-center" id="customerType"
                                                        aria-label="Default select example"
                                                        onchange="showCompanyField()">
                                                        <option selected> نوع العميل </option>
                                                        <option value="1">نقدي</option>
                                                        <option value="2">شركة</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control text-center"
                                                        id="Customer data" value=""
                                                        placeholder="بيانات العميل" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control text-center"
                                                        id="invoice number" value="" placeholder="رقم الفاتورة"
                                                        readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-select text-center" id="invoiceType"
                                                        name="invoiceType" aria-label="Default select example"
                                                        onchange="generateInvoiceNumber()">
                                                        <option selected>نوع الفاتورة</option>
                                                        <option value="فاتوره مبيسطة">فاتوره مبيسطة</option>
                                                        <option value="فاتورة ضريبية">فاتورة ضريبية</option>
                                                        <option value="مرتجع ">مرتجع </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 text-end">
                                                    <input type="text" class="form-control text-center"
                                                        id="Seller name" value="" placeholder="اسم المستخدم"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form Add in table Calculator -->
                                <div class="col-md-6 mb-1">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div id="addNewItemForm">
                                                <div class="row g-1">
                                                    <div class="col-md-6">
                                                        <input name="itemName" id="itemName" required
                                                            class="form-control text-center"
                                                            placeholder="اسم الماركة">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control text-center"
                                                            id="validationCustom02" placeholder="الرقم التسلسلي"
                                                            required readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="name" required
                                                            class="form-control text-center" id="quantity"
                                                            placeholder="الكمية" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="name" required
                                                            class="form-control text-center" id="price"
                                                            placeholder="السعر" readonly>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input name="Total" id="Total" required
                                                            class="form-control text-center" placeholder="المجموع" readonly>
                                                    </div>
                                                    <div class="footer text-center">
                                                        <button type="button" class="btn btn-danger col-3"
                                                            data-bs-dismiss="modal">الغاء <i
                                                                class="fa-solid fa-xmark"></i></button>
                                                        <button type="button" class="btn btn-success col-3"
                                                            id="addItemBtn">اضافة <i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Calculator -->
                            <div class="card mb-1 bg-light">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="table table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" class="text-center">المجموع</th>
                                                    <th scope="col" class="text-center">السعر</th>
                                                    <th scope="col" class="text-center">الكمية</th>
                                                    <th scope="col" class="text-center">الماركة</th>
                                                    <th scope="col" class="text-center">الرقم التسلسلي</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemTableBody">
                                                <!-- Table rows will be added dynamically here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Calculator -->
                            <div class="row g-1 justify-content-center">
                                <div class="col-md-6">
                                    <div class="card bg-light" style="height: 100%;">
                                        <div class="card-body">
                                            <div class="row g-1">
                                                <div class="col-md-6">
                                                    <input class="form-control text-center"
                                                        id="Total" value="" placeholder="الاجمالي"
                                                        required readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control text-center"
                                                        id="VAT%15" value=""
                                                        placeholder="ضريبة القيم المضافة%15" required readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-select text-center" id="discountType"
                                                        aria-label="Default select example"
                                                        onchange="handleDiscountType()">
                                                        <option selected>الخصم</option>
                                                        <option value="percentage">بالنسبة</option>
                                                        <option value="amount">بالمبلغ</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="percentageDiscountField"
                                                    style="display: none;">
                                                    <input class="form-control text-center"
                                                        id="percentageDiscountValue" placeholder="قيمة الخصم بالنسبة">
                                                </div>
                                                <div class="col-md-6" id="amountDiscountField"
                                                    style="display: none;">
                                                    <input class="form-control text-center"
                                                        id="amountDiscountValue" placeholder="قيمة الخصم بالمبلغ">
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control text-center"
                                                        id="totalAmountWithTax" value=""
                                                        placeholder="الاجمالي مع الضريبة" required readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control text-center"
                                                        id="netAmount" value="" placeholder="المبلغ الصافي"
                                                        required readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Textarea Calculator -->
                                <div class="col-md-6">
                                    <div class="card bg-light" style="height: 100%;">
                                        <div class="card-body">
                                            <div class="numbered-textarea" style="height: 100%;">
                                                <textarea class="form-control text-center" name="notes" id="notes" style="height: 100%;"
                                                    placeholder="ملاحظات"></textarea>
                                                <div class="line-numbers" id="lineNumbers"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
                <div id="cardContainer" class="card bg-light col-12" style="display: block;">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <form class="mb-1" action="{{ route('Tries.Add') }}" method="POST">
                                    @csrf
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <input class="form-control text-center"
                                                        placeholder="ادخال اطارات جديدة" readonly>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input name="Tire_serial" class="form-control text-center"
                                                        placeholder="الرقم التسلسلي">
                                                    @error('Tire_serial')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input name="TireSize"
                                                        class="form-control text-center" 
                                                        placeholder="المقاس" required>
                                                    @error('TireSize')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input name="TireAmount"
                                                        class="form-control text-center" 
                                                        placeholder="الكمية"
                                                        required>
                                                    @error('TireAmount')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input name="TirePrice"
                                                        class="form-control text-center"
                                                        placeholder="السعر"required>
                                                    @error('TirePrice')
                                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-md-3">
                                                        <select name="TireModel" id="brand"
                                                            class="form-select text-center"
                                                            aria-describedby="validationServer04Feedback" required>
                                                            <option value="ماركة"> ماركة</option>
                                                        </select>
                                                        @error('TireModel')
                                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 mb-4 text-end">
                                                        <label for="brand" class="form-label inline"> اختار
                                                            ماركة الاطار</label>
                                                    </div>
                                                    <div class="col-md-3 ms-3">
                                                        <select name="TireCountry" id="model"
                                                            class="form-select text-center"
                                                            aria-describedby="validationServer04Feedback" required>
                                                            <option value="بلد">بلد صنع</option>
                                                        </select>
                                                        @error('TireCountry')
                                                            <span
                                                                class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 mb-4 text-end">
                                                        <label for="model" class="form-label">اختار بلد
                                                            الاننشاء</label>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-9">
                                                        <input name="TireDate" type="date"
                                                            class="form-control text-center"required>
                                                        @error('TireDate')
                                                            <span
                                                                class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 text-end">
                                                        <label class="form-label inline">تاريخ الانتاج</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" footer col-12 text-center">
                                                <button type="submit" name="add"
                                                    class="btn btn-success col-6 float-right">اضافة <i
                                                        class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                </table>
                <div class="card">
                    <div class="card-header text-end">جدول الاطارات <i class="fas fa-table me-1"></i>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">الكمية المتوفرة</th>
                                    <th scope="col">الماركة</th>
                                    <th scope="col">بلد الانشاء</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">المقاس</th>
                                    <th scope="col">الرقم التسلسلي</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">الكمية المتوفرة</th>
                                    <th scope="col">الماركة</th>
                                    <th scope="col">بلد الانشاء</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">المقاس</th>
                                    <th scope="col">الرقم التسلسلي</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               @if (isset($Tires))

                                @foreach ($Tires as $tire )

                                <tr>

                                <td>{{ $tire->quantity_available }}</td>
                                <td>{{ $tire->model }}</td>
                                <td>{{ $tire->country_of_construction }}</td>
                                <td>{{ $tire->price }}</td>
                                <td>{{ $tire->amount}}</td>
                                <td>{{ $tire->size }}</td>
                                <td>{{ $tire->tire_serial }}</td>

                                </tr>


                                @endforeach
                              @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
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
            </footer>
        </div>
    </div>
    <script>
        function toggleCardView() {
            var card = document.getElementById('cardContainer');
            if (card.style.display === 'none') {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }

        function toggleInvoiceForm() {
            var invoiceForm = document.getElementById('invoiceForm');
            if (invoiceForm.style.display === 'none') {
                invoiceForm.style.display = 'block';
            } else {
                invoiceForm.style.display = 'none';
            }
        }
    </script>
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
