@extends('Master')
    @section('title', ('Tires'))
        @section('navbarTitle',('Tires'))
        @section('content')
        <div class="card">
            <div class="card-body">
                <button id="toggleCardViewButton" class="btn btn-primary col-1 pe-2 float-end" onclick="toggleCardView()">جديد <i class="fa-solid fa-file"></i></button>
                <button id="invoiceButton" class="btn btn-primary col-1 ms-1 float-end" onclick="toggleInvoiceForm()">فاتورة <i>
            </div>
        </div>
        <div class="card">
            <form id="invoiceForm" style="height: 100%; display: none;">
                <div class="card-body">
                    <div class="row g-1">
                        <div class="col-md-12 mb-1">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success col-3"><i
                                                class="fa fa-bookmark" aria-hidden="true"></i></button>
                                        <button type="submit" id="printButton"
                                            class="btn btn-primary col-3" onclick="window.print()"><i
                                                class="fas fa-print"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-1">
                        <!-- Form Billing information Calculator -->
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row g-1">
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
                                        <div
                                            class="col-md-6 d-flex justify-content-end align-items-center">
                                            <input type="text" class="form-control text-center"
                                                id="reference number" value=""
                                                placeholder="رقم المرجع">
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select text-center" id="customerType"
                                                aria-label="Default select example"
                                                onchange="showCompanyField()">
                                                <option selected> نوع العميل </option>
                                                <option value="1">نقدي</option>
                                                <option value="2">شركة</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control text-center"
                                                id="Customer data" value=""
                                                placeholder="بيانات العميل" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control text-center"
                                                id="invoice number" value="" placeholder="رقم الفاتورة"
                                                readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select text-center" id="invoiceType"
                                                name="invoiceType" aria-label="Default select example"
                                                onchange="generateInvoiceNumber()">
                                                <option selected>نوع الفاتورة</option>
                                                <option value="فاتوره مبيسطة">فاتوره مبيسطة</option>
                                                <option value="فاتورة ضريبية">فاتورة ضريبية</option>
                                                <option value="مرتجع ">مرتجع </option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 text-end">
                                            <input type="text" class="form-control text-center"
                                                id="Seller name" value="" placeholder="اسم المستخدم"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form Add in table Calculator -->
                        <div class="col-md-6 mb-1">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div id="addNewItemForm">
                                        <div class="row g-1">
                                            <div class="col-md-6">
                                                <input name="itemName" id="itemName" required
                                                    class="form-control text-center"
                                                    placeholder="اسم الماركة" readonly>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                                {{-- <form action="{{ route('#.search') }}" method="GET">
                                                <div class="input-group">
                                                    <input name="PlateRef" type="text" class="form-control text-center" id="reference number" value="" placeholder="الاطار"
                                                        placeholder="بحث">
                                                    <button class="btn btn-outline-success" type="search">بحث</button>
                                                </div>
                                                </form> --}}
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control text-center"
                                                    id="validationCustom02" placeholder="الرقم التسلسلي"
                                                    required readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control text-center"
                                                    id="validationCustom02" placeholder="المقاس"
                                                    required readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="name" required
                                                    class="form-control text-center" id="price"
                                                    placeholder="السعر" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="name" required type="number"
                                                    class="form-control text-center" id="quantity"
                                                    placeholder="الكمية">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="Total" id="Total" required
                                                    class="form-control text-center" placeholder="المجموع" readonly>
                                            </div>
                                            <div class="col-6 text-center">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">الغاء <i
                                                        class="fa-solid fa-xmark"></i></button>
                                                <button type="button" class="btn btn-success"
                                                    id="addItemBtn">اضافة <i
                                                        class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Calculator -->
                    <div class="card mb-1 bg-light">
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-center">المجموع</th>
                                            <th scope="col" class="text-center">السعر</th>
                                            <th scope="col" class="text-center">الكمية</th>
                                            <th scope="col" class="text-center">الماركة</th>
                                            <th scope="col" class="text-center">الرقم التسلسلي</th>
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
                    <div class="row g-1 justify-content-center">
                        <div class="col-md-6">
                            <div class="card bg-light" style="height: 100%;">
                                <div class="card-body">
                                    <div class="row g-1">
                                        <div class="col-md-6">
                                            <input class="form-control text-center"
                                                id="Total" value="" placeholder="الاجمالي"
                                                required readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control text-center"
                                                id="VAT%15" value=""
                                                placeholder="ضريبة القيم المضافة%15" required readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select text-center" id="discountType"
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
                                                id="percentageDiscountValue" placeholder="قيمة الخصم بالنسبة">
                                        </div>
                                        <div class="col-md-6" id="amountDiscountField"
                                            style="display: none;">
                                            <input class="form-control text-center"
                                                id="amountDiscountValue" placeholder="قيمة الخصم بالمبلغ">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control text-center"
                                                id="totalAmountWithTax" value=""
                                                placeholder="الاجمالي مع الضريبة" required readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-control text-center"
                                                id="netAmount" value="" placeholder="المبلغ الصافي"
                                                required readonly>
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
            </form>
        </div>    
        <div id="cardContainer" class="card bg-light col-12" style="display: block;">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <form class="mb-1" action="{{ route('Tries.Add') }}" method="POST">
                            @csrf
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="col-md-12 mb-2">
                                        <input class="form-control text-center"
                                            placeholder="ادخال اطارات جديدة" readonly>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-md-6 mb-1">
                                            <input name="Tire_serial" class="form-control text-center"
                                                placeholder="الرقم التسلسلي">
                                            @error('Tire_serial')
                                                <span
                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <input name="TireSize"
                                                class="form-control text-center" 
                                                placeholder="المقاس" required>
                                            @error('Size')
                                                <span
                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <input name="TireAmount"
                                                class="form-control text-center" 
                                                placeholder="الكمية"
                                                required>
                                            @error('TireAmount')
                                                <span
                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <input name="TirePrice"
                                                class="form-control text-center"
                                                placeholder="سعر الشراء"required>
                                            @error('TirePrice')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-1 text-center">
                                        <div class="col-md-3">
                                            <select name="TireModel" id="brand"
                                                class="form-select text-center"
                                                aria-describedby="validationServer04Feedback" required>
                                                <option value="ماركة"> ماركة</option>
                                                <option value="بلد">صنع في المانيا </option>
                                                <option value="بلد">صنع في الصين</option>
                                                <option value="بلد">صنع في اليابان</option>
                                            </select>
                                            @error('TireModel')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-1 text-center">
                                            <label for="brand" class="form-label inline"> اختار
                                                ماركة الاطار</label>
                                        </div>
                                        <div class="col-md-3 mb-1 text-center">
                                            <select name="TireCountry" id="model"
                                                class="form-select text-center"
                                                aria-describedby="validationServer04Feedback" required>
                                                <option value="بلد">صنع في المانيا </option>
                                                <option value="بلد">صنع في الصين</option>
                                                <option value="بلد">صنع في اليابان</option>
                                            </select>
                                            @error('TireCountry')
                                                <span
                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label for="model" class="form-label inline">اختار بلد
                                                الصنع</label>
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-md-3">
                                            <input name="TireDate" type="date"
                                                class="form-control text-center"required>
                                            @error('TireDate')
                                                <span
                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <label class="form-label inline">تاريخ الانتاج</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input name="TireDate" type="date"
                                                class="form-control text-center"required>
                                            @error('TireDate')
                                                <span
                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <label class="form-label inline">تاريخ فاتورة الشراء </label>
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <input name="SupplierTaxNumber" class="form-control text-center" id="#"
                                                required placeholder="الرقم الضريبي للمورد">
                                        </div>
                                        <div class="col-md-4">
                                            <select name="SupplierName" class="form-select text-center"
                                                aria-label="Default select example">
                                                <option selected> إسم المورد </option>
                                                <option value="#"> محمد </option>
                                                <option value="#"> احمد</option>
                                                <option value="#"> حمد</option>

                                            {{--@foreach ($Supplers as $suppler )
                                                <option value="{{$suppler->name}}"> {{$suppler->name}}  </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <select name="StorgePlace" class="form-select text-center" name="#"
                                                aria-label="Default select example">
                                                <option selected>مكان المخزن</option>
                                                <option value="#">حي الياقوت</option>
                                                <option value="#">ينبع الصناعية</option>
                                                <option value="#">المدينة المنورة</option>
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-6 mb-1">
                                            <input name="TirePrice"
                                                class="form-control text-center"
                                                placeholder="سعر البيع"required>
                                            @error('TirePrice')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                    <div class=" footer col-12 text-center">
                                        <button type="submit" name="add"
                                            class="btn btn-success col-6 float-right">اضافة <i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
        </table>
        <div class="card">
            <div class="card-header text-end">جدول الاطارات <i class="fas fa-table me-1"></i>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">الكمية المتوفرة</th>
                            <th scope="col">الماركة</th>
                            <th scope="col">بلد الانشاء</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">المقاس</th>
                            <th scope="col">الرقم التسلسلي</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">الكمية المتوفرة</th>
                            <th scope="col">الماركة</th>
                            <th scope="col">بلد الانشاء</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">المقاس</th>
                            <th scope="col">الرقم التسلسلي</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @if (isset($Tires))
                        @foreach ($Tires as $tire )
                        <tr>
                            <td>{{ $tire->quantity_available }}</td>
                            <td>{{ $tire->model }}</td>
                            <td>{{ $tire->country_of_construction }}</td>
                            <td>{{ $tire->price }}</td>
                            <td>{{ $tire->amount}}</td>
                            <td>{{ $tire->size }}</td>
                            <td>{{ $tire->tire_serial }}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        @stop
        <script>
            function toggleCardView() {
                var card = document.getElementById('cardContainer');
                if (card.style.display === 'none') {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            }

            function toggleInvoiceForm() {
                var invoiceForm = document.getElementById('invoiceForm');
                if (invoiceForm.style.display === 'none') {
                    invoiceForm.style.display = 'block';
                } else {
                    invoiceForm.style.display = 'none';
                }
            }
        </script>