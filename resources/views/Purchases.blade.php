<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>المشتريات</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .logo-img {
            width: 60px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-right: 20px;
            /* Adjust the margin as needed */
        }

        /* Custom styles for navbar */
        .nav-link {
            color: #fff;
            /* Change color to red */
            font-size: 18px;
            /* Increase font size to 18 pixels */
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
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="logo.jpg" class="img-fluid logo-img" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-md-6 texr-end">
            <button id="invoiceButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة
                <i class="fas fa-file-invoice"></i></button>
            <button id="AddacategoryButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleAddItemCard()">
                صنف والخدمات <i class="fa fa-plus" aria-hidden="true"></i></button>
            <button id="toggleTableViewButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleTableView()">
                عرض الجدول <i class="fa-solid fa-eye"></i></button>
        </div>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                </a>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">ادارة المشتريات</a></li>
                </ul>
            </li>
        </ul>
        <a class="navbar-brand" href="#"><i class="fa-solid fa-cart-shopping"></i><span
                class="ms-1">المشتريات</span></a>
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
                    <div class="nav">
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">الرئيسية</span><i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">سيارة جديدة</span> <i class="fa fa-car"
                                aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">ساحة العمل</span><i class="fa fa-briefcase"
                                aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">المخزن</span><i class="fas fa-database"></i>
                        </a>
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">المشتريات</span><i class="fa fa-shopping-cart"
                                aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-white text-end" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">المبيعات</span><i class="fa-brands fa-salesforce"></i>
                        </a>
                        <a class="nav-link text-white text-end" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">اطارات</span><i class="fa-brands fa-salesforce"></i>
                        </a>
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"></div>
                            <span class="ms-auto pe-2">ادارة</span><i class="fas fa-cogs"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" style="height: 25vh; overflow-y: auto;">
            <main>
                <table id="example" class="table table-striped" style="width:100%">
                </table>
                <div class="card mb-4">
                    <div class="card-header text-end">جدول المشتريات <i class="fas fa-table me-1"></i>
                        <div class="col-md-12 d-flex justify-content-end">
                            <select id="invoiceTypeFilter" class="form-select text-center ms-auto">
                                <option value="all">كل المشتريات </option>
                                <option value="invoices">الفواتير</option>
                                <option value="Invoicereturns">مرتجع الفواتير</option>
                                <option value="purchaseorder">طلب شراء</option>
                                <option value="Item">الاصناف</option>
                                <option value="Itemgroup">مجموعة الاصناف</option>
                                <option value="Servicesgroup">مجموعة الخدمات</option>
                                <option value="Services">الخدمات</option>
                                <option value="Suppliers">الموردين</option>
                            </select>
                        </div>
                        <table id="datatablesSimple">

                            <thead>
                                <tr>

                                    {{-- <th scope="col"></th>
                                    <th scope="col">صافي المبلغ </th>
                                    <th scope="col">اسم البائع</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">رقم الفاتورة</th> --}}

                                    <th scope="col">حالة الخدمة</th>
                                    <th scope="col">مجموعة الخدمة</th>
                                    <th scope="col">نوع الخدمة</th>
                                    <th scope="col">سعر التكلفة</th>
                                    <th scope="col">رقم الخدمة</th>
                                    <th scope="col">اسم الخدمة</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($Services as $service)
                                    <tr>

                                        <td>{{ $service->status }}</td>
                                        <td>{{ $service->serviceGroup->name }}</td>
                                        <td>{{ $service->service_type }}</td>
                                        <td>{{ $service->cost_price }}</td>
                                        <td>{{ $service->service_id }}</td>
                                        <td>{{ $service->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th scope="col">حالة الخدمة</th>
                                    <th scope="col">مجموعة الخدمة</th>
                                    <th scope="col">نوع الخدمة</th>
                                    <th scope="col">سعر التكلفة</th>
                                    <th scope="col">رقم الخدمة</th>
                                    <th scope="col">اسم الخدمة</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div id="invoiceForm" style="display: none;">
                    <div class="card bg-light">
                        <div class="card-body">
                            <form class="card bg-light inner-card">
                                <div class="row">
                                    <!-- Form Billing information Calculator -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card mb-2">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center">
                                                                        <button type="submit"
                                                                            class="btn btn-success"> حفظ <i
                                                                                class="fa fa-bookmark"
                                                                                aria-hidden="true"></i></button>
                                                                        <button id="printButton"
                                                                            class="btn btn-primary"
                                                                            onclick="window.print()">اطبع <i
                                                                                class="fas fa-print"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <select class="form-select text-center" id="paymentMethod"
                                                            name="paymentMethod" aria-label="Default select example">
                                                            <option selected>طريقة الدفع</option>
                                                            <option value="cash">كاش</option>
                                                            <option value="network">شبكة</option>
                                                            <option value="Late payment">اجل</option>
                                                            <option value="Prepaid">مقدم</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <select class="form-select text-center" id="invoiceType"
                                                            name="invoiceType" aria-label="Default select example"
                                                            onchange="generateInvoiceNumber()">
                                                            <option selected>نوع الفاتورة</option>
                                                            <option value="فاتوره مشتريات">فاتوره مشتريات</option>
                                                            <option value="مرتجع ">مرتجع </option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <input type="number" class="form-control text-center"
                                                            id="invoice number" value=""
                                                            placeholder="رقم الفاتورة" readonly>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <input type="text" class="form-control text-end"
                                                            id="Buyername" value="" placeholder="اسم المشتري"
                                                            readonly>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Add in table Calculator -->
                                    <div class="col-md-6 mb-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="addNewItemForm">
                                                    <div class="row g-1">
                                                        <div class="col-md-6">
                                                            <input type="text" name="itemName" id="itemName"
                                                                required class="form-control text-center"
                                                                placeholder="اسم الصنف">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" class="form-control text-center"
                                                                id="validationCustom02" placeholder="رمز الصنف"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number " class="form-control text-center"
                                                                id="unit" placeholder="الوحدة" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="name" required
                                                                class="form-control text-center" id="quantity"
                                                                placeholder="الكمية">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="name" required
                                                                class="form-control text-center" id="price"
                                                                placeholder="السعر">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="Total" id="Total"
                                                                required class="form-control text-center"
                                                                placeholder="المجموع">
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
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="table table-striped">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">المجموع</th>
                                                        <th scope="col">السعر</th>
                                                        <th scope="col">الكمية</th>
                                                        <th scope="col">الوحدة</th>
                                                        <th scope="col">رمز الصنف</th>
                                                        <th scope="col">اسم الصنف</th>
                                                        <th scope="col">رقم</th>
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
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="card" style="height: 100%;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <input type="number" class="form-control text-center"
                                                            id="Total" value="" placeholder="الاجمالي"
                                                            readonly>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="number" class="form-control text-center"
                                                            id="VAT%15" value=""
                                                            placeholder="ضريبة القيم المضافة%15" readonly>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <select class="form-select text-center" id="Discountearned"
                                                            aria-label="Default select example"
                                                            onchange="handleDiscountType()">
                                                            <option selected>الخصم</option>
                                                            <option value="percentage">بالنسبة</option>
                                                            <option value="amount">بالمبلغ</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2" id="percentageDiscountField"
                                                        style="display: none;">
                                                        <input type="number" class="form-control text-center"
                                                            id="percentageDiscountValue"
                                                            placeholder="قيمة الخصم بالنسبة">
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="col-md-6 mb-2" id="amountDiscountField"
                                                        style="display: none;">
                                                        <input type="number" class="form-control text-center"
                                                            id="amountDiscountValue" placeholder="قيمة الخصم بالمبلغ">
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="number" class="form-control text-center"
                                                            id="totalAmountWithTax" value=""
                                                            placeholder="الاجمالي مع الضريبة" readonly>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <input type="number" class="form-control text-center"
                                                            id="netAmount" value="" placeholder="المبلغ الصافي"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Textarea Calculator -->
                                    <div class="col-md-6">
                                        <div class="card" style="height: 100%;">
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
                            </form>
                        </div>
                    </div>
                </div>
                <div id="otherForm">
                    <div class="card mb-2">
                        <div class="card-body">
                            <!-- Your other form content goes here -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="card mb-2 bg-light">
                                        <div class="card-body">
                                            <div class="select col-12 mb-2" aria-label="Forms toggle">
                                                <select class="form-select text-center" onchange="toggleForm(this)">
                                                    <option value="purchase">طلب شراء</option>
                                                    <option value="quotation">طلب تسعيرة</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form id="purchaseForm" action="" method="post">
                                                        <div class="row mb-1">
                                                            <div class="col-md-6 mb-1">
                                                                <input type="text" name="name" required
                                                                    class="form-control  text-center"
                                                                    id="validationDefault01" required
                                                                    placeholder="اسم المورد">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" name="name" required
                                                                    class="form-control  text-center"
                                                                    id="validationDefault01" required
                                                                    placeholder="رقم اللوحة">
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="number" name="name" required
                                                                    class="form-control text-center"
                                                                    id="validationDefault01" required
                                                                    placeholder="رقم الفاتورة">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="name" required
                                                                    class="form-control text-center"
                                                                    id="validationDefault01" required
                                                                    placeholder="كود الصنف">
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="text" name="name" required
                                                                    class="form-control text-center"
                                                                    id="validationDefault01" required
                                                                    placeholder="الصنف">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" name="name" required
                                                                    class="form-control text-center" id="quantity"
                                                                    required placeholder="الكمية">
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="number" name="name" required
                                                                    class="form-control text-center" id="price"
                                                                    required placeholder="السعر">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="taxableTotal"
                                                                    required
                                                                    placeholder="الاجمالي الخاضع للضريبة"readonly>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="tax"
                                                                    required placeholder=" الضريبة %15"readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="finalTotal"
                                                                    required placeholder=" الاجمالي النهائي"readonly>
                                                            </div>
                                                        </div>
                                                        <div class="footer text-center">
                                                            <button type="button" class="btn btn-danger col-3"
                                                                data-bs-dismiss="modal">الغاء <i
                                                                    class="fa-solid fa-xmark"></i></button>
                                                            <button type="submit" class="btn btn-success col-3">حفظ
                                                                <i class="fa fa-bookmark"
                                                                    aria-hidden="true"></i></button>
                                                        </div>
                                                    </form>
                                                    <form id="quotationForm" style="display: none;">
                                                        <div class="row mb-1">
                                                            <div class="col-md-6 mb-1">
                                                                <input type="text" class="form-control text-center"
                                                                    id="validationCustom02" value=""
                                                                    placeholder="رقم اللوحة" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control text-center"
                                                                    id="validationCustom02" value=""
                                                                    placeholder="اسم العميل" required>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="text" class="form-control text-center"
                                                                    id="validationCustom02" value=""
                                                                    placeholder="رقم العميل" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control text-center"
                                                                    id="validationCustom01" value=""
                                                                    placeholder="القطعة" required>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="text" class="form-control text-center"
                                                                    id="validationCustom02" value=""
                                                                    placeholder="كود القطعة" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control text-center"
                                                                    id="validationCustom02" value=""
                                                                    placeholder="كود المخزون" required>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="quantity"
                                                                    required placeholder="الكمية">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="price"
                                                                    required placeholder="السعر">
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="taxableTotal"
                                                                    required
                                                                    placeholder="الاجمالي الخاضع للضريبة"readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="tax"
                                                                    required placeholder=" الضريبة %15"readonly>
                                                            </div>
                                                            <div class="col-md-12 mb-1">
                                                                <input type="number" name="name"
                                                                    class="form-control text-center" id="finalTotal"
                                                                    required placeholder=" الاجمالي النهائي"readonly>
                                                            </div>
                                                            <div class="footer text-center">
                                                                <button type="button" class="btn btn-danger col-3"
                                                                    data-bs-dismiss="modal">الغاء <i
                                                                        class="fa-solid fa-xmark"></i></button>
                                                                <button type="submit"
                                                                    class="btn btn-success col-3">حفظ <i
                                                                        class="fa fa-bookmark"
                                                                        aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card mt-5 bg-light">
                                        <div class="card-body">
                                            <form class="row">
                                                <div class="col-md-12 mb-2">
                                                    <input type="text" class="form-control text-center"
                                                        id="#" required placeholder="الموردين" readonly>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <input type="text" class="form-control text-center"
                                                        id="#" required placeholder="اسم المورد">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control text-center"
                                                        id="#" required placeholder="رقم الهاتف ">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <input type="text" class="form-control text-center"
                                                        id="#" required placeholder="رقم السجل التجاري">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control text-center"
                                                        id="#" name="#" required
                                                        placeholder="مكان المورد">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button type="Save" class="col-6 btn btn-success">اضافة <i
                                                            class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="addItemCard">
                    <div class="card body">
                        <!--<div class="card bg-light">
                  <div class="card body">
                    <form action="process_product.php" method="post">
                      <div class="row">
                        <div class="col-md-4 mb-1">
                            <input type="text" class="form-control text-center" id="barcode" required placeholder="Scan Barcode">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control text-center" id="name" required placeholder="Price">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <input type="text" class="form-control text-center" id="price" required placeholder="Product Name">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="Save" class="col-6 mb-2 btn btn-success">اضافة منتج</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>-->
                        <div class="card bg-light">
                            <div class="card-body">
                                <form class="row" id="addItemForm" novalidate action="" method="post">
                                    <div class="col-md-12 mb-1">
                                        <input type="text" class="form-control text-center"
                                            id="AddacategoryFields" required placeholder="اضافة صنف" readonly>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <input type="text" class="form-control text-center" id="#"
                                            required placeholder="اسم المجموعة">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control text-center" id="#"
                                            required placeholder="الرقم التسلسلي">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <input type="text" class="form-control text-center" id="#"
                                            required placeholder="اسم الصنف">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control text-center"
                                            id="validationServer04" name="item_quantity" required
                                            placeholder="الكمية">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <input type="number" class="form-control text-center" id="#"
                                            required placeholder="الوحدة">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control text-center"
                                            id="validationServer04" name="item_price" required placeholder="السعر">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <input type="number" class="form-control text-center" id="#"
                                            required placeholder="سعر الكاش">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control text-center" id="#"
                                            required placeholder="سعر الاجل">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <input type="number" class="form-control text-center" id="#"
                                            required placeholder="متوسط سعر التكلفة">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <input type="number" class="form-control text-center" id="#"
                                            required placeholder="التكلفة">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="Save" class="col-6 btn btn-success">اضافة <i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row" id="addItemForm" novalidate action=""
                                                    method="post">
                                                    <div class="col-md-12 mb-1">
                                                        <input type="text" class="form-control text-center"
                                                            id="AddagroupFields" required
                                                            placeholder="اضافة المجموعة الاصناف" readonly>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control text-center"
                                                            id="#" required placeholder="اسم المجموعة">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control text-center"
                                                            id="#" required placeholder="رقم المجوعة">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <input type="text" class="form-control text-center"
                                                            id="#" required placeholder="عدد الافروع">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="Save" class="col-12 btn btn-success">اضافة <i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row" id="addItemForm" novalidate
                                                    action="{{ route('ServiceGroup.store') }}" method="post">
                                                    @csrf
                                                    <div class="col-md-12  mb-1">
                                                        <input type="text" class="form-control text-center"
                                                            id="AddagroupFields" required
                                                            placeholder="اضافة المجموعة الخدمات" readonly>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  mb-1">
                                                        <input name="GroupName" type="text"
                                                            class="form-control text-center" id="#" required
                                                            placeholder="اسم المجموعة">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  mb-1">
                                                        <input name="GroupNumber" type="text"
                                                            class="form-control text-center" id="#" required
                                                            placeholder="رقم المجوعة">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="submite" class="col-12 btn btn-success">اضافة <i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row" id="addItemForm" novalidate
                                                    action="{{ route('Service.store') }}" method="post">
                                                    @csrf
                                                    <div class="col-12 mb-1">
                                                        <input type="text" class="form-control text-center"
                                                            id="AddaserviceFields" required placeholder="اضافة خدمة"
                                                            readonly>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <select name="service_group_id"
                                                            class="form-select text-center"
                                                            onchange="toggleForm(this)">
                                                            @foreach ($ServiceGruop as $group)
                                                                <option value="{{ $group->id }}">{{ $group->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <input type="text" class="form-control text-center"
                                                            id="اسم المجموعة" required placeholder="اسم المجموعة"> --}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="ServiceName" type="text"
                                                            class="form-control text-center" id="اسم خدمة" required
                                                            placeholder="اسم خدمة">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <input name="ServiceId"type="number" name="number"
                                                            class="form-control text-center" id="الرمز" required
                                                            placeholder="رمزالخدمة" disabled>
                                                    </div>
                                                    <div class="col-6">
                                                        <input name="ServiceCost" type="number" name="number"
                                                            class="form-control text-center" id="سعر التكلفة" required
                                                            placeholder="السعر التكلفة">
                                                    </div>
                                                    <div class="select row mb-2" aria-label="Forms toggle">
                                                        <select name="ServiceType" class="form-select text-center"
                                                            onchange="toggleForm(this)">
                                                            <option value="داخلية">خدمة داخلية </option>
                                                            <option value="خارجية">خدمة خارجية</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="submit" class="col-12 btn btn-success">اضافة <i
                                                                class="fa-solid fa-plus"></i></button>
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
        var invoiceFormVisible = false;

        function toggleInvoiceForm() {
            var invoiceForm = document.getElementById('invoiceForm');
            var otherForm = document.getElementById('otherForm');

            if (!invoiceFormVisible) {
                invoiceForm.style.display = 'block';
                otherForm.style.display = 'none';
            } else {
                invoiceForm.style.display = 'none';
                otherForm.style.display = 'block';
            }

            invoiceFormVisible = !invoiceFormVisible;
        }

        function toggleAddItemCard() {
            var addItemCard = document.getElementById('addItemCard');
            if (addItemCard.style.display === 'none') {
                addItemCard.style.display = 'block';
            } else {
                addItemCard.style.display = 'none';
            }
        }

        function toggleTableView() {
            var table = document.getElementById('example');
            var card = document.querySelector('.card');
            var addItemCard = document.getElementById('addItemCard');
            var invoiceForm = document.getElementById('invoiceForm');
            var otherForm = document.getElementById('otherForm');

            if (table.style.display === 'none') {
                table.style.display = 'table';
                card.style.display = 'block';
                addItemCard.style.display = 'none';
                invoiceForm.style.display = 'none';
                otherForm.style.display = 'none';
            } else {
                table.style.display = 'none';
                card.style.display = 'none';
                addItemCard.style.display = 'none';
                invoiceForm.style.display = 'none';
                otherForm.style.display = 'none';
            }
        }


        // Function to calculate values based on price and quantity
        function calculateValues() {
            var price = parseFloat(document.getElementById('price').value);
            var quantity = parseFloat(document.getElementById('quantity').value);

            var taxableTotal = price * quantity;
            var tax = taxableTotal * 0.15;
            var finalTotal = taxableTotal + tax;

            document.getElementById('taxableTotal').value = taxableTotal.toFixed(2);
            document.getElementById('tax').value = tax.toFixed(2);
            document.getElementById('finalTotal').value = finalTotal.toFixed(2);
        }

        // Event listener for changes in price and quantity inputs
        document.getElementById('price').addEventListener('input', calculateValues);
        document.getElementById('quantity').addEventListener('input', calculateValues);


        // Get references to the input elements
        const pricePerUnitInput = document.getElementById('pricePerUnit');
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('totalPrice');

        // Add event listeners to the input elements to calculate total price
        pricePerUnitInput.addEventListener('input', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);

        // Function to calculate the total price
        function calculateTotal() {
            const pricePerUnit = parseFloat(pricePerUnitInput.value);
            const quantity = parseFloat(quantityInput.value);
            const totalPrice = pricePerUnit * quantity;
            totalPriceInput.value = totalPrice.toFixed(2); // Round to 2 decimal places
        }

        // Optional: You can also add form validation using JavaScript if needed
        // In this case, we're just going to check that the fields aren't empty and have valid numbers in them
        function toggleForm(selectElement) {
            var selectedOption = selectElement.value;

            if (selectedOption === 'purchase') {
                document.getElementById('purchaseForm').style.display = 'block';
                document.getElementById('quotationForm').style.display = 'none';
            } else if (selectedOption === 'quotation') {
                document.getElementById('purchaseForm').style.display = 'none';
                document.getElementById('quotationForm').style.display = 'block';
            }
        }


        function printPage() {
            window.print();
        }

        // Get all elements in the document
        var allElements = document.querySelectorAll('*');

        // Loop through each element
        allElements.forEach(function(element) {
            // Get all attributes of the current element
            var attributes = element.attributes;

            // Loop through each attribute of the current element
            for (var i = 0; i < attributes.length; i++) {
                var attribute = attributes[i];
                var attributeName = attribute.name;
                var attributeValue = attribute.value;

                // Check if the attribute name or value contains "databaec"
                if (attributeName.includes('databaec') || attributeValue.includes('databaec')) {
                    // Do something with the element, for example, log it to the console
                    console.log('Element: ' + element.tagName + ', Attribute: ' + attributeName + ', Value: ' +
                        attributeValue);
                }
            }
        });

        function toggleForm() {
            var actionSelect = document.getElementById('actionSelect');
            var purchaseForm = document.getElementById('purchaseForm');
            var quotationForm = document.getElementById('quotationForm');

            if (actionSelect.value === 'purchase') {
                purchaseForm.style.display = 'block';
                quotationForm.style.display = 'none';
            } else if (actionSelect.value === 'quotation') {
                purchaseForm.style.display = 'none';
                quotationForm.style.display = 'block';
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
