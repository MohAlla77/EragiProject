@extends('Layout.head')


<body class="sb-nav-fixed">
    <!-- Start Navbar-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span class="text-warning">INCH CAR MAINTENANCE</span></a>
        </div>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="ادارة _الفواتير.php"><span class="text-">ادارة الفواتير</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 95vh;">
                    <div class="card inner-card" style="height: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-2 bg-light">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success col-3">حفظ</button>
                                                    <a href="{{ route('invoice.print') }}"> <button id="printButton"
                                                            class="btn btn-primary col-3">
                                                            <i class="fas fa-print"></i></button></a>
                                                </div>
                                            </div>
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
</body>

</html>
