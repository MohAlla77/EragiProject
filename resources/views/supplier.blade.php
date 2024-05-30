{{-- <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>الموردين</title>
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
</head> --}}

{{-- <body class="sb-nav-fixed">
        @include('Layout.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main> --}}
                @extends('Master')
                @section('title', ('Supplier'))
                @section('navbarTitle', ('Supplier'))
                @section('content')
                    <div class="card border-dark">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <form action="{{route('Supplier.Add')}}" method="POST" class="row">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control text-center"
                                                        id="#" required placeholder="الموردين" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="SupplierID" type="text" class="form-control text-center"
                                                        id="#" required placeholder="رقم التعريفي للمورد" readonly>
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
                                                    <input name="SupplierNationalNumber"  class="form-control text-center"
                                                        id="#"  required
                                                        placeholder="العنوان الوطني">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="PostCode" class="form-control text-center"
                                                        id="#"  required
                                                        placeholder="الرمز البريدي">
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="AccountNumber" class="form-control text-center"
                                                        id="#"  required
                                                        placeholder="رقم الحساب المورد">
                                                </div>
                                                {{-- <div class="row g-1">
                                                    <div class="col-md-10">
                                                        <input class="form-control text-center" placeholder="مستحقات" readonly>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <label class="form-label inline" @readonly(true)> مستحقات المورد</label>
                                                    </div>
                                                </div> --}}
                                                <div class="col-12 text-center">
                                                    <button type="Save" class="col-6 btn btn-success">
                                                        اضافة
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @stop
            {{-- </main>
        </div>
    </div> --}}
    {{-- <script>
        function toggleCards() {
            var inputCard = document.getElementById('inputCard');
            var displayCard = document.getElementById('displayCard');

            if (inputCard.style.display === 'none') {
                inputCard.style.display = 'block';
                displayCard.style.display = 'none';
            } else {
                inputCard.style.display = 'none';
                displayCard.style.display = 'block';
            }
        }
    </script> --}}
    {{-- <canvas id="myChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body> --}}
