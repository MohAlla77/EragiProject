@extends('Master')
@section('title', 'Categorize')
{{-- @section('navbarTitle', 'Categorize') --}}
@section('content')
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
                                                <input type="number" class="form-control text-center"
                                                    required placeholder="رقم المجموعة">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="CategorizeName" type="text" class="form-control text-center"
                                                    required placeholder="اسم الصنف">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="CategorizeSerial" class="form-control text-center"
                                                    required placeholder="الرقم التسلسلي للصنف">
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <select name="SupplierName" class="form-select text-center">
                                                    <option disabled selected> إسم المورد </option>
                                                    @foreach ($suppler as $suppler )
                                                        <option value="{{$suppler->name}}">{{$suppler->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierTaxNumber" class="form-control text-center"
                                                    required placeholder="الرقم الضريبي للمورد"readonly>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <select name="SupplierName" class="form-select text-center">
                                                    <option disabled selected> إسم المورد </option>
                                                    @foreach ($suppler as $supplier)
                                                        <option value="{{ $supplier->name }}" data-tax_number="{{ $supplier->tax_number }}">
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierTaxNumber" class="form-control text-center"
                                                    required placeholder="الرقم الضريبي للمورد" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="StorgePlace" class="form-select text-center"
                                                    aria-label="Default select example">
                                                    <option disabled selected>مكان المخزن</option>
                                                    @foreach ($storeplace as $option)
                                                        <option value="{{$option}}">{{$option}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="UnitType" class="form-select text-center"
                                                    aria-label="Default select example">
                                                    <option disabled selected> عدد الوحدات</option>
                                                    @foreach ($units as $option)
                                                        <option value="{{$option}}">{{$option}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="CategorizeAmount" class="form-control text-center"
                                                    name="item_quantity" required
                                                    placeholder="الكمية">
                                            </div>
                                            <div class="col-md-6">
                                                <input  name="price_cost" class="form-control text-center"
                                                     required placeholder="سعر التكلفة ">
                                            </div>
                                            <div class="col-md-9">
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
@stop
<script>
    // Get select and input elements
    const supplierSelect = document.querySelector('select[name="SupplierName"]');
    const SupplierTaxNumberInput = document.querySelector('input[name="SupplierTaxNumber"]');
    // Function to update tax number when a supplier is selected
    function updateTaxNumber() 
    {
        const selectedOption = supplierSelect.options[supplierSelect.selectedIndex];
        const tax_Number = selectedOption.getAttribute('data-tax_number');
        SupplierTax_NumberInput.value = tax_Number;
    }
    // Initial call to set initial tax number based on the default selected supplier
    updateTax_Number();
    // Event listener for supplier selection change
    supplierSelect.addEventListener('change', updateTax_Number);
</script>