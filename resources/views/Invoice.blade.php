<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Invoice</title>

    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <style>
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
            <a class="navbar-brand" href="#"><span>الفواتير</span></a>
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
            <main>
                <div class="contaner">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-1">
                                <!-- Form Billing information Calculator -->
                                @include('Invoice.Billing_info')
                                <!-- Form Add in table Calculator -->
                                @include('Invoice.Add_Item')
                            </div>
                            <!-- Table Calculator -->
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr class="text-center">
                                                <th>المجموع</th>
                                                <th>السعر</th>
                                                <th>الكمية</th>
                                                <th>الوحدة</th>
                                                <th>رمز الصنف</th>
                                                <th>اسم الصنف</th>
                                                <th>رقم</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody id="itemTableBody">
                                            @if (isset($items) && $items->count() > 0)
                                                @foreach ($items as $item)
                                                    <tr class="text-center">
                                                        <td>{{ $item->price * $item->quantity }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->unit }}</td>
                                                        <td>{{ $item->code }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->id }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                </tr>
                                            @endif
                                        </tbody> --}}

                                        @if (isset($items) && $items->count() > 0)
                                            <tfoot>
                                                <tr>
                                                    {{-- <td colspan="6">{{ $items->links() }}</td> --}}
                                                </tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <!-- Card Calculator -->
                            {{-- @if (isset($items))  --}}
                                <div class="row g-1 justify-content-center">
                                    <div class="col-md-6">
                                        <div class="card bg-light" style="height: 100%;">
                                            <div class="card-body">
                                                {{-- <div class="row g-1">
                                                    <div class="col-md-6">
                                                        <input class="form-control text-center"
                                                            id="Total"
                                                            value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) }}"
                                                            placeholder="الاجمالي" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control text-center"
                                                            id="VAT%15"
                                                            value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) * 0.15 }}"
                                                            placeholder="ضريبة القيم المضافة%15" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control text-center"
                                                            id="totalAmountWithTax"
                                                            value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) +$items->sum(function ($item) {return $item->price * $item->quantity;}) *0.15 }}"
                                                            placeholder="الاجمالي مع الضريبة" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select" id="discountType"
                                                            onchange="handleDiscountType()">
                                                            <option value="NoDiscount">لا يوجد خصم</option>
                                                            <option value="amount">بالمبغ</option>
                                                            <option value="percentage">بالنسبة</option>
                                                            <option value="Month's Offers">عروض</option>
                                                        </select>
                                                    </div>
                                                    <!-- Amount discount input -->
                                                    <div class="col-md-6 text-center" id="amountDiscountField">
                                                        <input name="AmountOfDiscount" type="number" class="form-control"
                                                            id="amountDiscountValue" placeholder="أدخل مبلغ الخصم">
                                                    </div>
                                                    <!-- Percentage discount input -->
                                                    <div class="col-md-6 text-center"  id="percentageDiscountField"
                                                        style="display: none;">
                                                        <input  class="form-control"
                                                            id="percentageDiscountValue" placeholder="أدخل نسبةالخصم">
                                                    </div>
                                                    <!-- Total price after discount -->
                                                    <div class="col-md-6">
                                                        <input class="form-control"
                                                            placeholder="المبلغ الصافى" id="totalPriceAfterDiscount" readonly>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Textarea Calculator -->
                                    <div class="col-md-6">
                                        <div class="card bg-light" style="height: 100%;">
                                            <div class="card-body">
                                                <div class="numbered-textarea" style="height: 100%;">
                                                    <textarea class="form-control text-center" name="notes" id="notes" style="height: 100%;"
                                                        placeholder="ملاحظات">
                                                    </textarea>
                                                    <div class="line-numbers" id="lineNumbers"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function handleDiscountType() {
            var discountType = document.getElementById('discountType').value;
            if (discountType === 'amount') {
                document.getElementById('amountDiscountField').style.display = 'block';
                document.getElementById('percentageDiscountField').style.display = 'none';
            } else if (discountType === 'percentage') {
                document.getElementById('amountDiscountField').style.display = 'none';
                document.getElementById('percentageDiscountField').style.display = 'block';
            } else if (discountType === 'NoDiscount') {
                // If 'No Discount' is selected, disable discount fields and calculate total directly
                document.getElementById('amountDiscountField').style.display = 'none';
                document.getElementById('percentageDiscountField').style.display = 'none';
                calculateTotalDirectly();
            } else {
                document.getElementById('amountDiscountField').style.display = 'block';
                document.getElementById('percentageDiscountField').style.display = 'block';
            }
        }

        function calculateTotalDirectly() {
            var totalPrice = parseFloat(document.getElementById('totalAmountWithTax').value);
            document.getElementById('totalPriceAfterDiscount').value = totalPrice.toFixed(2);
        }


        function calculateTotalPriceAfterDiscount() {
            var totalPrice = parseFloat(document.getElementById('totalAmountWithTax').value);
            var discountType = document.getElementById('discountType').value;
            var discountValue = 0;

            if (discountType === 'amount') {
                discountValue = parseFloat(document.getElementById('amountDiscountValue').value);
            } else if (discountType === 'percentage') {
                var percentageDiscountValue = parseFloat(document.getElementById('percentageDiscountValue').value);
                discountValue = totalPrice * (percentageDiscountValue / 100);
            }

            // Check if the discount type is 'NoDiscount'
            if (discountType === 'NoDiscount') {
                // If 'NoDiscount' is selected, the total price remains unchanged
                document.getElementById('totalPriceAfterDiscount').value = totalPrice.toFixed(2);
            } else {
                // Calculate the total price after discount
                var totalPriceAfterDiscount = totalPrice - discountValue;
                document.getElementById('totalPriceAfterDiscount').value = totalPriceAfterDiscount.toFixed(2);
            }
        }

        // Add event listeners
        // document.getElementById('discountType').addEventListener('change', handleDiscountType);
        // document.getElementById('amountDiscountValue').addEventListener('input', calculateTotalPriceAfterDiscount);
        // document.getElementById('percentageDiscountValue').addEventListener('input', calculateTotalPriceAfterDiscount);

        //         var input = document.getElementById("validationCustom02");

        // // Execute a function when the user releases a key on the keyboard
        // input.addEventListener("keyup", function(event) {
        //     // Number 13 is the "Enter" key on the keyboard
        //     if (event.keyCode === 13) {
        //         // Cancel the default action, if needed
        //         event.preventDefault();
        //         // Submit the form
        //         document.getElementById("searchForm").submit();
        //     }
        // });
    </script>
</body>