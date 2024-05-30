<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>الاصناف</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
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
            <a class="navbar-brand" href="#"><!--<i class="fa-solid fa-cart-shopping"></i>--><span class="ms-1">الاصناف</span></a>
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="card-body">
                        <div class="row g-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-1">
                                        <div class="col-md-12">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="col-md-12 mb-1">
                                                        <button type="button" class="btn btn-success col-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            اضافة مجموعة الاصناف
                                                        </button>
                                                        <div>
                                                            @include('model.item_group_purchase_popup')    
                                                        </div>
                                                    </div>
                                                    <form action="{{route('Categorize.store')}}" method="post">
                                                        @csrf
                                                        <div class="col-md-12 mb-1">
                                                            <input type="text" class="form-control text-center"
                                                             required placeholder="اضافة صنف" readonly>
                                                        </div>
                                                        <div class="row g-1">
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
                                                            <div class="col-md-6">
                                                                <input name="CategorizeSerial" class="form-control text-center" id="#"
                                                                    required placeholder="الرقم التسلسلي للصنف">
                                                            </div>
                                                            {{-- <div class="col-md-6">
                                                                <input type="number" class="form-control text-center" id="#"
                                                                    required placeholder="رقم المجموعة" disabled>
                                                            </div> --}}
                                                            <div class="col-md-6">
                                                                <select name="SupplierName" class="form-select text-center"
                                                                    aria-label="Default select example">
                                                                    <option selected> إسم المورد </option>

                                                                    @foreach ($Supplers as $suppler )

                                                                    <option value="{{$suppler->name}}"> {{$suppler->name}}  </option>

                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="SupplierTaxNumber" class="form-control text-center" id="#"
                                                                    required placeholder="الرقم الضريبي للمورد" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select name="StorgePlace" class="form-select text-center" name="#"
                                                                    aria-label="Default select example">
                                                                    <option selected>مكان المخزن</option>
                                                                    <option value="invoice">حي الياقوت</option>
                                                                    <option value="return">ينبع الصناعية</option>
                                                                    <option value="purchase">المدينة المنورة</option>
                                                                </select>
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
                                                            <div class="col-md-6">
                                                                <input  name="price_cost" class="form-control text-center"
                                                                    id="validationServer04" required placeholder="سعر التكلفة ">
                                                            </div>
                                                            {{-- 
                                                            <div class="col-md-6">
                                                                <input  name="CategorizeSealCost" class="form-control text-center"
                                                                    id="validationServer04"  required placeholder=" سعر البيع">
                                                            </div><div class="col-md-6">
                                                                <input name="InvoiceDatePurchase" type="date" class="form-control text-center" id="#"
                                                                    required placeholder="تاريخ الفاتورة المشتريات">
                                                            </div> --}}
                                                            <div class="col-md-3">
                                                                <input name="InvoiceDatePurchase" type="date"
                                                                    class="form-control text-center"required>
                                                                {{-- @error('InvoiceDatePurchase')
                                                                    <span
                                                                        class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                                @enderror --}}
                                                            </div>
                                                            <div class="col-md-3 text-center">
                                                                <label class="form-label inline">تاريخ فاتورة الشراء </label>
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
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
