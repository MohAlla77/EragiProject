<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        {{-- <li><a class="dropdown-item" href="#!">Language</a></li> --}}
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
            <a class="navbar-brand" href="#"><img src="./assets/img/logo-inch.jpg" class="img-fluid logo-img"
                    alt="Logo"></a>
        </div>
        <div class="col-md-6 texr-end pe-2">
            <button id="invoiceButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة
                <i class="fas fa-file-invoice"></i></button>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="{{ route('Sales_accept') }}"><span class="text-">قبول الخدمات</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </form>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content" class="sidebar-collapsed" style="height: 25vh; overflow-y: auto;">
            <main>
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="row g-1">
                            <!-- Form Billing information Calculator -->
                            @include('Invoice.Billing_info')
                            <!-- Form Add in table Calculator -->
                            @include('Invoice.Add_Item')
                        </div>
                        <!-- Table Calculator -->
                        <div class="card">
                            <div class="card-header text-end">محتويات الفاتورة <i class="fas fa-table me-4"></i></div>
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
                                    <tbody id="itemTableBody">
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
                                    </tbody>

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
                        @if (isset($items))
                            <div class="row g-1 justify-content-center">
                                <div class="col-md-6">
                                    <div class="card" style="height: 100%;">
                                        <div class="card-body">
                                            <div class="row g-1">
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
                                                    placeholder="ملاحظات">
                                                </textarea>
                                                <div class="line-numbers" id="lineNumbers"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
        document.getElementById('discountType').addEventListener('change', handleDiscountType);
        document.getElementById('amountDiscountValue').addEventListener('input', calculateTotalPriceAfterDiscount);
        document.getElementById('percentageDiscountValue').addEventListener('input', calculateTotalPriceAfterDiscount);

                var input = document.getElementById("validationCustom02");

        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Submit the form
                document.getElementById("searchForm").submit();
            }
        });
    </script>



<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>


</body>

</html>
