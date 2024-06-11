@extends('Master')
    @section('title',('Purchases'))
        @section('navbarTitle', ('puchases'))
            @section('content')
                <div class="card">
                    <div class="card_body">
                        <button id="invoiceButton" class="btn btn-primary col-3 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة/جدول</button>
                    </div>
                </div>
                <div id="otherForm">
                    <table id="example" class="table table-striped" style="width:100%">
                    </table>
                    <div class="card">
                        <div class="card-header text-end">جدول المشتريات <i class="fas fa-table me-1"></i>
                            {{-- <div class="col-md-12 d-flex justify-content-end">
                                <select id="invoiceTypeFilter" class="form-select text-center ms-auto">
                                    <option value="all">كل المشتريات </option>
                                    <option value="invoices">الفواتير</option>
                                    <option value="Invoicereturns">مرتجع الفواتير</option>
                                    <option value="purchaseorder">طلب شراء</option>
                                    <option value="Item">الاصناف</option>
                                    <option value="Itemgroup">مجموعة الاصناف</option>
                                </select>
                            </div> --}}
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
                                                <a  data-toggle="modal" data-target="#exampleModal3{{$service->id}}">
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
                </div>
                <div id="invoiceForm" style="display: none;">
                    <div class="card bg-light mt-4">
                        <div class="card-body">
                            <form class="card inner-card">
                                <div class="row g-1">
                                    <!-- Form Billing information Calculator -->
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row g-1">
                                                <div class="col-md-6 mb-1 text-center">
                                                    <button id="printButton" class="btn btn-primary col-4"onclick="window.print()"><i class="fas fa-print"></i></button>
                                                    <button type="submit" class="btn btn-success col-4"><i class="fa fa-bookmark" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#exampleModal88">
                                                        اختيار المنتجات التسعير                                                            </button>                   
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal88" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="col-12">
                                                                <h5 class="modal-title text-center" id="exampleModalLabel">طلب تسعير المنتج</h5>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card mb-4">
                                                                    <div class="card-header text-end">اختيار المنتجات<i class="fas fa-table me-4"></i></div>
                                                                    <div class="card-body">
                                                                        <select class="form-select text-center" aria-label="Default select example">
                                                                            <option disabled selected>حدد المنتج</option>
                                                                            {{-- @foreach ($select_Categorize as $option)
                                                                            @endforeach --}}
                                                                        </select>
                                                                        <table class="table table-bordered table-striped">
                                                                            <thead class="thead-dark">
                                                                                <tr class="text-center">
                                                                                    <th>اختيار</th>
                                                                                    <th>سعر التكلفة</th>
                                                                                    <th>الكمية</th>
                                                                                    <th>نوع الوحدة</th>
                                                                                    <th>الرقم التسلسي</th>
                                                                                    <th>اسم الصنف</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                                                
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr></tr>
                                                                                <tr></tr>
                                                                                <tr></tr>
                                                                                <tr></tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                                                                <button type="button" class="btn btn-primary">ارسال</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-12 mb-1">
                                                    <hr class="separator-line">
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <select class="form-select text-center" id="paymentMethod"
                                                        name="paymentMethod" aria-label="Default select example">
                                                        <option disabled selected>طريقة الدفع</option>
                                                        @foreach ($paymentMethod as $option)
                                                            <option value="{{$option}}">{{$option}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-select text-center" id="invoiceType"
                                                        name="invoiceType" aria-label="Default select example"
                                                        onchange="generateInvoiceNumber()">
                                                        <option disabled selected>نوع الفاتورة</option>
                                                        @foreach ($invoiceType as $option)
                                                            <option value="{{$option}}">{{$option}}</option>
                                                        @endforeach
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
                                                <div class="col-md-6">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-secondary col-12" data-bs-toggle="modal" data-bs-target="#exampleModal9">
                                                        طلب شراء
                                                        </button>
                                                        <div>
                                                        @include('model.order_sales_popup')
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-secondary col-12" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                                        طلب تسعيرة
                                                    </button>
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
                                                                    <option disabled selected>الخصم</option>
                                                                    @foreach ($discount as $option)
                                                                        <option value="{{$option}}">{{$option}}</option>
                                                                    @endforeach
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
            @stop
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
                // function toggleForm(selectElement) {
                //     var selectedOption = selectElement.value;

                //     if (selectedOption === 'purchase') {
                //         document.getElementById('purchaseForm').style.display = 'block';
                //         document.getElementById('quotationForm').style.display = 'none';
                //     } else if (selectedOption === 'quotation') {
                //         document.getElementById('purchaseForm').style.display = 'none';
                //         document.getElementById('quotationForm').style.display = 'block';
                //     }
                // }


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