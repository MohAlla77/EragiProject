<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>المشتريات</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>

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
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li>
                    {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="container-fluid">
            <a class="navbar-brand"><img src="./assets/img/logo-inch.jpg" class="img-fluid logo-img" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-md-6 texr-end">
            <button id="invoiceButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة
                <i class="fas fa-file-invoice"></i></button>
            <button id="AddacategoryButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleAddItemCard()">
                الاصناف والخدمات <i class="fa fa-plus" aria-hidden="true"></i></button>
            <button id="toggleTableViewButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleTableView()">
             الجدول <i class="fa-solid fa-eye"></i></button>
        </div>
        <a class="navbar-brand" href="#"><!--<i class="fa-solid fa-cart-shopping"></i>--><span class="ms-1">المشتريات</span></a>
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
                <table id="example" class="table table-striped" style="width:100%">
                </table>
                <div class="card">
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
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a  data-toggle="modal" data-target="#exampleModal{{$service->id}}">
                                                <button class="btn btn-primary col-5 float-start">
                                                    <i class="fa-solid fa-trash"></i> <i class="fa-solid fa-pen-to-square"></i>
                                                 </button>
                                            </a>
                                           | {{$service->status}}<i class="fa-solid fa-check"></i> <i class="fa-solid fa-hourglass-half"></i>
                                            <!-- Modal -->
                                            @include('model.Edit_service_popup')
                                        </td>
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
                            <form class="card inner-card">
                                <div class="row g-1">
                                    <!-- Form Billing information Calculator -->
                                    <div class="col-md-6">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="row g-1">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-1 text-center">
                                                            <button type="submit" class="btn btn-success col-3"><i class="fa fa-bookmark" aria-hidden="true"></i></button>
                                                            <button id="printButton" class="btn btn-primary col-3"onclick="window.print()"><i class="fas fa-print"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-1">
                                                        <hr class="separator-line">
                                                    </div>
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
                                                    <div class="col-md-6">
                                                        <select class="form-select text-center" id="invoiceType"
                                                            name="invoiceType" aria-label="Default select example"
                                                            onchange="generateInvoiceNumber()">
                                                            <option selected>نوع الفاتورة</option>
                                                            <option value="invoice">فاتوره مشتريات</option>
                                                            <option value="return">مرتجع </option>
                                                            <option value="purchase">طلب شراء</option>
                                                            <option value="quotation">تسعيرة</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control text-center"
                                                            id="invoice number" value=""
                                                            placeholder="رقم الفاتورة" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control text-center"
                                                            id="Buyername" value="" placeholder="اسم المستخدم"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Add in table Calculator -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div id="transformation addNewItemForm">
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="row g-1">
                                                            <div class="col-md-6">
                                                                <input name="itemName" id="itemName"
                                                                    required class="form-control text-center"
                                                                    placeholder="اسم الصنف">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control text-center"
                                                                    id="validationCustom02" placeholder="رمز الصنف"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control text-center"
                                                                    id="unit" placeholder="الوحدة" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="name" required
                                                                    class="form-control text-center" id="quantity"
                                                                    placeholder="الكمية">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="name" required
                                                                    class="form-control text-center" id="price"
                                                                    placeholder="السعر">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="Total" id="Total"
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
                                            <!-- Form Purchase order and pricing -->
                                            <div class="col-md-6" id="purchaseOrderForm" style="display: none;">
                                                <div class="card bg-light mb-2">
                                                    <div class="card-body">
                                                        <div class="select row mb-2" aria-label="Forms toggle">
                                                            <select class="form-select text-center" onchange="toggleForm(this)">
                                                                <option value="purchase">طلب شراء</option>
                                                                <option value="quotation">طلب تسعيرة</option>
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form id="purchaseForm" action="#" method="post">
                                                                    <div  class="row g-1">
                                                                        <div class="col-md-6">
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
                                                                        <div class="col-md-6">
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
                                                                        <div class="col-md-6">
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
                                                                        <div class="col-md-12">
                                                                            <input type="number" name="name" required
                                                                                class="form-control text-center" id="price"
                                                                                required placeholder="السعر">
                                                                        </div>
                                                                        <div class="footer text-center">
                                                                            <button type="button" class="btn btn-danger col-3"
                                                                                data-bs-dismiss="modal">الغاء <i
                                                                                    class="fa-solid fa-xmark"></i></button>
                                                                            <button type="submit" class="btn btn-success col-3">حفظ
                                                                                <i class="fa fa-bookmark"
                                                                                    aria-hidden="true"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form id="quotationForm" action="#" style="display: none;">
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Table Calculator -->
                                <div class="card mb-1">
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-1 justify-content-center">
                                            <div class="col-md-6">
                                                <div class="card bg-light" style="height: 100%;">
                                                    <div class="card-body">
                                                        <div class="row g-1">
                                                            <div class="col-md-6">
                                                                <input class="form-control text-center"
                                                                    id="Total" value="" placeholder="الاجمالي"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control text-center"
                                                                    id="VAT%15" value=""
                                                                    placeholder="ضريبة القيم المضافة%15" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select class="form-select text-center" id="Discountearned"
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
                                                                    id="percentageDiscountValue"
                                                                    placeholder="قيمة الخصم بالنسبة">
                                                            </div>
                                                            <div class="col-md-6" id="amountDiscountField"
                                                                style="display: none;">
                                                                <input class="form-control text-center"
                                                                    id="amountDiscountValue" placeholder="قيمة الخصم بالمبلغ">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input class="form-control text-center"
                                                                    id="totalAmountWithTax" value=""
                                                                    placeholder="الاجمالي مع الضريبة" readonly>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input class="form-control text-center"
                                                                    id="netAmount" value="" placeholder="المبلغ الصافي"
                                                                    readonly>
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="otherForm">
                    <div class="card border-dark">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <form action="{{route('Supplier.store')}}" method="POST" class="row">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control text-center"
                                                        id="#" required placeholder="الموردين" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="SupplierID" type="text" class="form-control text-center"
                                                        id="#" required placeholder="رقم التعريفي للمورد">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="SupplierName" type="text" class="form-control text-center"
                                                        id="#" required placeholder="اسم المورد">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">+966</span>
                                                        <input class="form-control text-center" name="u_phone" id="customerPhone" placeholder="رقم الهاتف" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="SupplierRigesteNumber" type="text" class="form-control text-center"
                                                        id="#" required placeholder="رقم السجل التجاري">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="SupplierTaxNumber" type="text" class="form-control text-center"
                                                        id="#" required placeholder="الرقم الضريبي">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="SupplierNationalNumber" type="number" class="form-control text-center"
                                                        id="#" name="#" required
                                                        placeholder="العنوان الوطني">
                                                </div>
                                                <div class="col-md-12">
                                                    <input name="postcode" type="number" class="form-control text-center"
                                                        id="#" name="#" required
                                                        placeholder="الرمز البريدي">
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button type="Save" class="col-6 btn btn-success">اضافة <i
                                                            class="fa-solid fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
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
                        <div class="row g-1">
                            {{-- <div class="col-md-4">
                                <div class="card mt-5 bg-light">
                                    <div class="card-body">
                                        <form class="row g-1" id="addItemForm" novalidate action="{{route('CategorizeGroup.store')}}"
                                            method="post">
                                            @csrf
                                            <div class="col-md-12">
                                                <input type="text" class="form-control text-center"
                                                    id="AddagroupFields" required
                                                    placeholder="اضافة المجموعة الاصناف" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="CategorizeGroupName" type="text" class="form-control text-center"
                                                    id="#" required placeholder="اسم المجموعة">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="CategorizeGroupNumber" type="text" class="form-control text-center"
                                                    id="#" required placeholder="رقم المجوعة">
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="Save" class="col-6 btn btn-success">اضافة <i
                                                        class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-1">
                                    <div class="col-md-12">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-success col-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        اضافة مجموعة الاصناف
                                                    </button>
                                                </div>

                                                <form class="row g-1" id="addItemForm" novalidate action="{{route('Categorize.store')}}" method="post">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control text-center"
                                                            id="AddacategoryFields" required placeholder="اضافة صنف" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="categorize_group_id"
                                                            class="form-select text-center"
                                                            onchange="toggleForm(this)">
                                                            <option selected>نوع الصنف</option>
                                                            @foreach ($CategorizeGroup as $C_group)
                                                                <option value="{{ $C_group->id }}">
                                                                    {{ $C_group->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="CategorizeName" type="text" class="form-control text-center" id="#"
                                                            required placeholder="اسم الصنف">
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <input type="number" class="form-control text-center" id="#"
                                                            required placeholder="رقم المجموعة" disabled>
                                                    </div> --}}
                                                    <div class="col-md-6">
                                                        <select name="storeplace" class="form-select text-center" name="#"
                                                            aria-label="Default select example">
                                                            <option selected>مكان المخزن</option>
                                                            <option value="invoice">حي الياقوت</option>
                                                            <option value="return">ينبع الصناعية</option>
                                                            <option value="purchase">المدينة المنورة</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="SupplierName" type="text" class="form-control text-center" id="#"
                                                            required placeholder="اسم المورد">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="CategorizeSerial" type="number" class="form-control text-center" id="#"
                                                            required placeholder="الرقم التسلسلي">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="SupplierTaxNumber" type="number" class="form-control text-center" id="#"
                                                            required placeholder="الرقم الضريبي للمورد">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="InvoiceDatePurchase" type="number" class="form-control text-center" id="#"
                                                            required placeholder="تاريخ الفاتورة المشتريات">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="UnitType" class="form-select text-center" name="#"
                                                            aria-label="Default select example">
                                                            <option selected> عدد الوحدات</option>
                                                            <option value="invoice">كرتونة</option>
                                                            <option value="return">ليتر </option>
                                                            <option value="purchase">حبة</option>
                                                            {{-- <option value="quotation">ربطة</option> --}}
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="CategorizeAmount" type="number" class="form-control text-center"
                                                            id="validationServer04" name="item_quantity" required
                                                            placeholder="الكمية">
                                                    </div>
                                                    {{--  
                                                        <div class="col-md-6">
                                                            <input name="AmountPrice" type="number" class="form-control text-center"
                                                                id="validationServer04" name="item_quantity" required
                                                                placeholder="سعر الكمية">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select  name="UnitType" class="form-select text-center" name="#"
                                                                aria-label="Default select example">
                                                                <option selected>نوع الوحدة</option>
                                                                <option value="invoice">حبة</option>
                                                                <option value="return">؟؟؟ </option>
                                                                <option value="purchase">؟؟؟</option>
                                                                <option value="quotation">؟؟؟</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="UnitAmount" type="number" class="form-control text-center" id="#"
                                                                required placeholder="كمية">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="UnitPrice" type="number" class="form-control text-center" id="#"
                                                                required placeholder="السعر ">
                                                        </div>
                                                     --}}
                                                    <div class="col-md-6">
                                                        <input  name="price_cost" type="number" class="form-control text-center"
                                                            id="validationServer04" name="item_price" required placeholder=" سعر التكلفة علي حسب فاتوره المشتريات ">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input  name="CategorizeSealCost" type="number" class="form-control text-center"
                                                            id="validationServer04" name="item_price" required placeholder=" سعر البيع">
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="Save" class="col-6 btn btn-success">اضافة <i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                </form>
                                                @include('model.item_group_purchase_popup')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-1">
                                    <div class="col-md-12">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="col-md-12 mb-1">
                                                    <button type="button" class="btn btn-success col-12"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        اضافة المجموعة الخدمات
                                                    </button>
                                                    <div>
                                                    @include('model.service_group_purchase_popup')
                                                </div>
                                                </div>
                                                <form id="addItemForm" novalidate  action="{{ route('Service.store') }}" method="post">
                                                    @csrf
                                                    <div class="col-12 mb-1">
                                                        <input type="text" class="form-control text-center"
                                                            id="AddaserviceFields" required placeholder="اضافة خدمة"
                                                            readonly>
                                                    </div>
                                                    <div  class="row g-1">
                                                        <div class="col-md-6">
                                                            <select name="service_group_id"
                                                                class="form-select text-center"
                                                                onchange="toggleForm(this)">
                                                                <option selected>نوع الخدمة</option>
                                                                @foreach ($ServiceGroup as $S_group)
                                                                <option value="{{ $S_group->id }}">
                                                                        {{ $S_group->name }}
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
                                                        <div class="col-md-6">
                                                            <input name="ServiceId"type="number" name="number"
                                                                class="form-control text-center" id="الرمز" required
                                                                placeholder="رمز الخدمة" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="ServiceCost" type="number" name="number"
                                                                class="form-control text-center" id="سعر التكلفة" required
                                                                placeholder="سعر التكلفة">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="ServiceCost" type="number" name="number"
                                                                class="form-control text-center" id="سعر البيع" required
                                                                placeholder="سعر البيع">
                                                        </div>
                                                        <div class="select col-md-6" aria-label="Forms toggle">
                                                            <select name="ServiceType" class="form-select text-center"
                                                                onchange="toggleForm(this)">
                                                                <option selected>نوع الخدمة</option>
                                                                <option value="داخلية">خدمة داخلية </option>
                                                                <option value="خارجية">خدمة خارجية</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="submit" class="col-6 btn btn-success" >إضافة خدمة  <i
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
        function mysticalFormToggle() {
            var selectedOption = document.getElementById("invoiceType").value;
            if (selectedOption === "invoice" || selectedOption === "return") {
                document.getElementById("transformation").style.display = "block";
                document.getElementById("purchaseOrderForm").style.display = "none";
            } else if (selectedOption === "purchase" || selectedOption === "quotation") {
                document.getElementById("transformation").style.display = "none";
                document.getElementById("purchaseOrderForm").style.display = "block";
            }
        }
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
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
