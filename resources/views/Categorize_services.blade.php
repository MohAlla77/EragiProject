<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Categorize_services</title>
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
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="card">
                    <div class="row g-1">
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
                                                        <input name="CategorizeSerial" class="form-control text-center" id="#"
                                                            required placeholder="الرقم التسلسلي">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="SupplierTaxNumber" class="form-control text-center" id="#"
                                                            required placeholder="الرقم الضريبي للمورد">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="InvoiceDatePurchase" class="form-control text-center" id="#"
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
                                                        <input name="CategorizeAmount" class="form-control text-center"
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
                                                        <input  name="price_cost" class="form-control text-center"
                                                            id="validationServer04" name="item_price" required placeholder=" سعر التكلفة علي حسب فاتوره المشتريات ">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input  name="CategorizeSealCost" class="form-control text-center"
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
                                                    <button type="button" class="btn btn-success col-12"  data-bs-toggle="modal" data-bs-target="#exampleModal2">
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
                                                            <input name="ServiceId" name="number"
                                                                class="form-control text-center" id="الرمز" required
                                                                placeholder="رمز الخدمة" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="ServiceCost" name="number"
                                                                class="form-control text-center" id="سعر التكلفة" required
                                                                placeholder="سعر التكلفة">
                                                        </div>
                                                        <div class="col-6">
                                                            <input name="ServiceCost" name="number"
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
    </body>
</html>