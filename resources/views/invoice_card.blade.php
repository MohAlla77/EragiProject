<?php
// Start PHP session to store form data
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store form data in session variables
    $_SESSION['paymentMethod'] = $_POST['paymentMethod'];
    $_SESSION['invoiceType'] = $_POST['invoiceType'];
    $_SESSION['invoiceNumber'] = $_POST['invoiceNumber'];
    $_SESSION['buyerName'] = $_POST['buyerName'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 15px 15px 0px 0px;
        }
        .inner-card {
            padding: 20px;
        }
        .separator-line {
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card bg-light">
        <form class="card inner-card" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row g-1"><?php
                // Include necessary files or declare any PHP variables if needed
                ?>
                
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="row g-1">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">
                              <button type="submit" class="btn btn-success col-3"><i class="fa-regular fa-floppy-disk"></i></button>
                              <a href="{{ route('invoice.print') }}">
                                <button id="printButton"class="btn btn-primary col-3"><i class="fas fa-print"></i></button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row g-1">
                        <div class="col-md-6">
                          <select class="form-select text-center" id="paymentMethod" name="paymentMethod" aria-label="Default select example">
                            <option selected>طريقة الدفع</option>
                            <option value="cash">كاش</option>
                            <option value="network">شبكة</option>
                            <option value="Late payment">اجل</option>
                            <option value="Prepaid">مقدم</option>
                          </select>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                          <form action="{{ route('carPlate.search') }}" method="GET">
                            <div class="input-group">
                              <input name="PlateRef" type="text" class="form-control text-center" id="reference number" value="" placeholder="رقم المرجع"
                                  placeholder="بحث">
                              <button class="btn btn-outline-success" type="search">بحث</button>
                            </div>
                          </form>
                        </div>
                        <?php if(isset($car) && isset($invoiceNum)): ?>
                          <div class="col-md-6">
                            <select class="form-select text-center" id="customerType" aria-label="Default select example" onchange="showCompanyField()">
                              <option selected> نوع العميل </option>
                              <option value="1">نقدي</option>
                              <option value="2">شركة</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control text-center" id="Customer data" value="<?=$car->name?>" placeholder="بيانات العميل" readonly>
                          </div>
                          <div class="col-md-6">
                            <input  name="invoiceNum" type="text" class="form-control text-center" id="invoice number" value="<?=$invoiceNum?>" placeholder="رقم الفاتورة" readonly>
                          </div>
                          <div class="col-md-6">
                            <select class="form-select text-center" id="invoiceType" name="invoiceType" aria-label="Default select example" onchange="generateInvoiceNumber()">
                              <option selected>نوع الفاتورة</option>
                              <option value="فاتوره مبيسطة">فاتوره مبيسطة</option>
                              <option value="فاتورة ضريبية">فاتورة ضريبية</option>
                              <option value="مرتجع ">مرتجع </option>
                            </select>
                          </div>
                          <div class="col-md-12 text-end">
                            <input type="text" class="form-control text-center" id="Seller name" value="<?=Auth::user()->first_name?> <?=Auth::user()->last_name?>" placeholder="اسم البائع" readonly>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="addNewItemForm">
                                <div class="row">
                                    <form id="searchForm" action="{{ route('spare.search') }}" method="GET">
                                        <div class="input-group">
                                            <input name="PartId" type="text" class="form-control text-center" id="validationCustom02" placeholder=" ابحث عن رمز الصنف" required>
                                        </div>
                                    </form>
                                    <?php if (isset($spear)): ?>
                                        <form action="{{ route('spear.store', $spear->id) }}" method="POST">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-md-6">
                                                    <input name="ItemCode" value="{{ $spear->part_id }}" type="number" class="form-control text-center" id="validationCustom02" placeholder="رمز الصنف" readonly required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemName" value="{{ $spear->name }}" type="text" name="itemName" id="itemName" required class="form-control text-center" placeholder="اسم الصنف" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemPrice" value="{{ $spear->price }}" type="number" name="name" required class="form-control text-center" id="price" placeholder="السعر" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemUnit" class="form-control text-center" id="unitServiceSelect" value="وحدة" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemQuantity" type="number" name="name" required class="form-control text-center" id="quantity" placeholder="الكمية">
                                                </div>
                                            </div>
                                            <div class="footer text-center">
                                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">الغاء</button>
                                                <button type="submit" class="btn btn-success col-3" id="addItemBtn">اضافة</button>
                                            </div>
                                        </form>
                                    <?php elseif (isset($service)): ?>
                                        <form action="{{ route('service.store', $service->id) }}" method="POST">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-md-6">
                                                    <input name="ItemCode" value="{{ $service->service_id}}" type="text" class="form-control text-center" id="validationCustom02" placeholder="رمز الصنف" readonly required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemName" value="{{ $service->name }}" type="text" name="itemName" id="itemName" required class="form-control text-center" placeholder="اسم الصنف" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemPrice" value="{{ $service->cost_price }}" type="number" name="name" required class="form-control text-center" id="price" placeholder="السعر" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="ItemUnit" class="form-control text-center" id="price" placeholder="السعر" value="خدمة" readonly>
                                                </div>
                                            </div>
                                            <div class="footer text-center">
                                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">الغاء</button>
                                                <button type="submit" class="btn btn-success col-3" id="addItemBtn">اضافة</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <input class="form-control text-center" 
                                                id="Total"
                                                value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) }}"
                                                placeholder="الاجمالي" readonly>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input class="form-control text-center"
                                                id="VAT%15"
                                                value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) * 0.15 }}"
                                                placeholder="ضريبة القيم المضافة%15" readonly>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input class="form-control text-center"
                                                id="totalAmountWithTax"
                                                value="{{ $items->sum(function ($item) {return $item->price * $item->quantity;}) + $items->sum(function ($item) {return $item->price * $item->quantity;}) * 0.15 }}"
                                                placeholder="الاجمالي مع الضريبة" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" id="discountType" onchange="handleDiscountType()">
                                                <option value="NoDiscount">لا يوجد خصم</option>
                                                <option value="amount">بالمبغ</option>
                                                <option value="percentage">بالنسبة</option>
                                            </select>
                                        </div>
                                        <!-- Amount discount input -->
                                        <div class="col-md-6 text-center" id="amountDiscountField">
                                            <input name="AmountOfDiscount" type="number" class="form-control" id="amountDiscountValue" placeholder="أدخل مبلغ الخصم">
                                        </div>
                                        <!-- Percentage discount input -->
                                        <div class="col-md-6 text-center" id="percentageDiscountField" style="display: none;">
                                            <input class="form-control" id="percentageDiscountValue" placeholder="أدخل نسبةالخصم">
                                        </div>
                                        <!-- Total price after discount -->
                                        <div class="col-md-6">
                                            <input class="form-control" placeholder="المبلغ الصافى" id="totalPriceAfterDiscount" readonly>
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
                                        <textarea class="form-control text-center" name="notes" id="notes" style="height: 100%;" placeholder="ملاحظات"></textarea>
                                        <div class="line-numbers" id="lineNumbers"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                    <!-- Submit Button -->
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
