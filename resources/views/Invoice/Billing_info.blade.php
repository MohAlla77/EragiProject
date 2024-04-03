<div class="col-md-6">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <button type="submit" class="btn btn-success col-3">حفظ</button>
                <a href="{{ route('invoice.print') }}">
                  <button id="printButton"class="btn btn-primary col-3"><i class="fas fa-print"></i></button>
                </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
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
        @if(isset($car) && isset($invoiceNum))
          <div class="col-md-6">
            <select class="form-select text-center" id="customerType" aria-label="Default select example" onchange="showCompanyField()">
              <option selected> نوع العميل </option>
              <option value="1">نقدي</option>
              <option value="2">شركة</option>
            </select>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control text-center" id="Customer data" value="{{$car->name}}" placeholder="بيانات العميل" readonly>
          </div>
          <div class="col-md-6">
            <input  name="invoiceNum" type="text" class="form-control text-center" id="invoice number" value="{{$invoiceNum}}" placeholder="رقم الفاتورة" readonly>
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
            <input type="text" class="form-control text-center" id="Seller name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" placeholder="اسم البائع" readonly>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
