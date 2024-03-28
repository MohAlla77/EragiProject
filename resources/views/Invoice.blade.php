<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
@extends('Layout.head')
<style>
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
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img" alt="Logo"></a>
        </div>
        <div class="col-md-6 texr-end pe-2">
          <button id="invoiceButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة <i class="fas fa-file-invoice"></i></button>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
          <a class="navbar-brand" href="#"><span class="text-">المبيعات</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        </form>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content" style="overflow-y: scroll; height: 400px;">
            <main>

                <div class="card mb-4">
                    <div class="card-header text-end">مبيعات الخدمات <i class="fas fa-table me-4"></i></div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>القرار</th>
                                    <th scope="col">حالة الخدمة</th>
                                    <th scope="col">مجموعة الخدمة</th>
                                    <th scope="col">نوع الخدمة</th>
                                    <th scope="col">سعر التكلفة</th>
                                    <th scope="col">رقم الخدمة</th>
                                    <th scope="col">اسم الخدمة</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>القرار</th>
                                    <th scope="col">حالة الخدمة</th>
                                    <th scope="col">مجموعة الخدمة</th>
                                    <th scope="col">نوع الخدمة</th>
                                    <th scope="col">سعر التكلفة</th>
                                    <th scope="col">رقم الخدمة</th>
                                    <th scope="col">اسم الخدمة</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($Services as $service)
                                    <tr>

                                        <td>
                                            <form action="{{ route('ApproveService', $service->id) }}"
                                                method="POST">
                                                @method('PUT')
                                                @csrf
                                                <button type="submite" class="btn btn-primary">
                                                    موافق
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $service->status }}</td>
                                        <td>{{ $service->serviceGroup->name }}</td>
                                        <td>{{ $service->service_type }}</td>
                                        <td>{{ $service->cost_price }}</td>
                                        <td>{{ $service->service_id }}</td>
                                        <td>{{ $service->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card inner-card" style="height: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-2 bg-light">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success col-3">حفظ</button>
                                        <a href="{{ route('invoice.print') }}"> <button id="printButton"class="btn btn-primary col-3">
                                            <i class="fas fa-print"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Form Billing information Calculator -->
                            @include('Invoice.Billing_info')
                            <!-- Form Add in table Calculator -->
                            @include('Invoice.Add_Item')
                        </div>
                        <!-- Table Calculator -->
                        <div class="card mb-2 bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">السعر</th>
                                                <th scope="col">الكمية</th>
                                                <th scope="col">الوحدة</th>
                                                <th scope="col">رمز الصنف</th>
                                                <th scope="col">اسم الصنف</th>
                                                <th scope="col">رقم</th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemTableBody">
                                            @if (isset($items) && $items->count() > 0)
                                                @foreach ($items as $item)
                                                    <tr>
                                                        <td>{{ $item->price * $item->quantity }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->unit }}</td>
                                                        <td>{{ $item->code }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->id }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">No items found.</td>
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
                        </div>
                        <!-- Card Calculator -->
                        @if (isset($items))
                            <div class="row justify-content-center">
                                <div class="col-md-6 mb-2">
                                    <div class="card mb-2 bg-light" style="height: 100%;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <input type="number" class="form-control text-center" disabled
                                                        id="Total"
                                                        value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) }}"
                                                        placeholder="الاجمالي" readonly>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="number" class="form-control text-center"
                                                        disabled id="VAT%15"
                                                        value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) * 0.15 }}"
                                                        placeholder="ضريبة القيم المضافة%15" readonly>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6 mb-2">
                                                <select class="form-select text-center" id="discountType"
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
                                                    id="percentageDiscountValue" placeholder="قيمة الخصم بالنسبة">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6 mb-2" id="amountDiscountField"
                                                style="display: none;">
                                                <input type="number" class="form-control text-center"
                                                    id="amountDiscountValue" placeholder="قيمة الخصم بالمبلغ">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div> --}}
                                                <div class="col-md-6 mb-2">
                                                    <input type="number" class="form-control text-center"
                                                        disabled id="totalAmountWithTax"
                                                        value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) +$items->sum(function ($item) {return $item->price * $item->quantity;}) *0.15 }}"
                                                        placeholder="الاجمالي مع الضريبة" readonly>
                                                </div>
                                                {{-- <div class="col-md-12 mb-2">
                                                <input type="number" class="form-control text-center"
                                                    id="netAmount" value="" placeholder="المبلغ الصافي"
                                                    readonly>
                                            </div> --}}

                                                <!-- Discount type dropdown -->
                                                <div class="col-md-6">
                                                    <select class="form-select" id="discountType"
                                                        onchange="handleDiscountType()">
                                                        <option value="amount">بالمبغ</option>
                                                        <option value="percentage">بالنسبة</option>
                                                    </select>
                                                </div>

                                                <!-- Amount discount input -->
                                                <div class="col-md-6" id="amountDiscountField">
                                                    <input name="AmountOfDiscount" type="number"
                                                        class="form-control" id="amountDiscountValue"
                                                        placeholder="أدخل مبلغ الخصم">
                                                </div>

                                                <!-- Percentage discount input -->
                                                <div class="col-md-6" id="percentageDiscountField"
                                                    style="display: none;">
                                                    <input type="number" class="form-control"
                                                        id="percentageDiscountValue" placeholder="أدخل نسبةالخصم">
                                                </div>

                                                <!-- Total price after discount -->
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control"
                                                        placeholder="المبلغ الصافى" id="totalPriceAfterDiscount"
                                                        readonly>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Textarea Calculator -->
                                <div class="col-md-6 mb-2">
                                    <div class="card mb-2 bg-light" style="height: 100%;">
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
            }
            calculateTotalPriceAfterDiscount();
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

            var totalPriceAfterDiscount = totalPrice - discountValue;
            document.getElementById('totalPriceAfterDiscount').value = totalPriceAfterDiscount.toFixed(2);
        }

        // Add event listeners
        document.getElementById('discountType').addEventListener('change', handleDiscountType);
        document.getElementById('amountDiscountValue').addEventListener('input', calculateTotalPriceAfterDiscount);
        document.getElementById('percentageDiscountValue').addEventListener('input', calculateTotalPriceAfterDiscount);
    </script>
    {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("customerType").addEventListener("change", showCompanyField);
        });

        function showCompanyField() {
            var customerType = document.getElementById("customerType").value;
            var customerDataField = document.getElementById("Customer data");

            if (customerType === "2") {
                customerDataField.placeholder = "بيانات الشركة";
            } else {
                customerDataField.placeholder = "نقدي";
            }
              }

    // Define the function before adding the event listener
    function generateInvoiceNumber() {
        var invoiceType = document.getElementById("invoiceType").value;
        var serialNumberField = document.getElementById("serialNumber");

        // Generate a sequential invoice number based on the selected invoice type
        var invoiceNumber = "";

        switch (invoiceType) {
            case "فاتوره مبيسطة":
                invoiceNumber = "MB-001"; // Example format for a simplified invoice
                break;
            case "فاتورة ضريبية":
                invoiceNumber = "TAX-001"; // Example format for a tax invoice
                break;
            case "فاتورة مشتريات":
                invoiceNumber = "PUR-001"; // Example format for a purchase invoice
                break;
            default:
                invoiceNumber = "N/A";
        }
        serialNumberField.value = invoiceNumber;
    }

    // Add event listener after the DOM has fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("invoiceType").addEventListener("change", generateInvoiceNumber);
    });

      // Function to add item to the table
      function addItemToTable() {
          // Get form values
          var itemName = document.getElementById('itemCounter').value;
          var itemName = document.getElementById('itemName').value;
          var itemCode = document.getElementById('validationCustom02').value;
          var itemQuantity = document.getElementById('quantity').value;
          var itemPrice = document.getElementById('price').value;
          var itemTotal = document.getElementById('Total').value;

          // Calculate total amount for the item
          var itemTotal = itemQuantity * itemPrice;

          // Create new table row
          var newRow = document.createElement('tr');
          newRow.innerHTML = `
              <td>${itemCounter}</td>
              <td>${itemTotal}</td>
              <td>${itemPrice}</td>
              <td>${itemQuantity}</td>
              <td>وحدة</td>
              <td>${itemCode}</td>
              <td>${itemName}</td>
          `;
                itemCounter++;

          // Append the new row to the table body
          document.getElementById('itemTableBody').appendChild(newRow);

          // Calculate and update total amount including tax
          calculateTotalAmount();
      }

      // Add event listener to the "Add Item" button
      document.getElementById('addItemBtn').addEventListener('click', function() {
          addItemToTable(); // Call the function to add item to table
      });

        // Calculate total amount including tax
        function calculateTotalAmount() {
            // Iterate through each row in the table
            var totalAmount = 0;
            $('#itemTableBody tr').each(function() {
                var price = parseFloat($(this).find('td:nth-child(2)').text());
                var quantity = parseFloat($(this).find('td:nth-child(3)').text());
                totalAmount += price * quantity;
            });

            // Calculate tax (assuming tax rate is 15%)
            var taxAmount = totalAmount * 0.15;

            // Add tax to total amount
            var totalAmountWithTax = totalAmount + taxAmount;

            // Display the total amount including tax
            $('#totalAmount').text(totalAmountWithTax.toFixed(2)); // Update total amount element
        }

          // Handle discount type change
          function handleDiscountType() {
              var discountType = $('#discountType').val();
              if (discountType === 'percentage') {
                  $('#percentageDiscountField').show();
                  $('#amountDiscountField').hide();
              } else if (discountType === 'amount') {
                  $('#percentageDiscountField').hide();
                  $('#amountDiscountField').show();
              }
          }

                    // JavaScript: Function to calculate net amount after discount
            function calculateNetAmount() {
                var totalAmountWithTax = parseFloat($('#totalAmountWithTax').val());
                var discountType = $('#discountType').val();
                var discountValue = parseFloat($('#discountValue').val());
                var discountAmount = 0;

                if (discountType === 'percentage') {
                    var percentageDiscountValue = parseFloat($('#percentageDiscountValue').val());
                    discountAmount = (percentageDiscountValue / 100) * totalAmountWithTax;
                } else if (discountType === 'amount') {
                    discountAmount = parseFloat($('#amountDiscountValue').val());
                }

                var netAmount = totalAmountWithTax - discountAmount;
                $('#netAmount').val(netAmount.toFixed(2)); // Update net amount element
            }

        // Function to update address based on user's location
        function updateAddress(location) {
            var addressElement = document.getElementById('address');

            // Update the address based on the user's location
            switch (location) {
                case 'Al-Yaqout District':
                    addressElement.innerHTML = 'Al-Yaqout District, King Abdul Aziz Road';
                    break;
                case 'Industrial Yanbu':
                    addressElement.innerHTML = 'Industrial Yanbu, Al-Naqadi District';
                    break;
                case 'Medina':
                    addressElement.innerHTML = 'Medina, Al-Aliyat Station, Tabuk Road';
                    break;
                // Add more cases as needed
                default:
                    addressElement.innerHTML = 'Default Address';
            }
        }
                // Assuming jQuery for AJAX simplicity
        $('#printButton').click(function() {
            // Extract data from printer button and associated form fields
            var paymentMethod = $('#paymentMethod').val();
            var customerType = $('#customerType').val();
            // Extract other necessary data...

            // Send data to PHP script via AJAX
            $.ajax({
                url: 'الفواتير.php',
                method: 'POST',
                data: {
                    paymentMethod: paymentMethod,
                    customerType: customerType,
                    referencenumber: referencenumber,
                    Customerdata: Customerdata,
                    invoicenumber: invoicenumber,
                    invoiceType: invoiceType,
                    qrCode: qrCode,

                    itemTableBody: itemTableBody,
                    Total: Total,
                    VAT: VAT,
                    discountType: discountType,
                    percentageDiscountValue:percentageDiscountValue,
                    amountDiscountValue:amountDiscountValue,
                    totalAmountWithTax: totalAmountWithTax,
                    netAmount: netAmount,
                    notes: notes,
                    Sellername: Sellername,
                    Sellername: Sellername,
                    // Add other data attributes...
                },
                success: function(response) {
                    // Handle success response, if needed
                },
                error: function(xhr, status, error) {
                    // Handle error response, if needed
                }
            });
        });
  </script> --}}
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
