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
                                                <input class="form-control text-center" placeholder="الموردين" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierID" type="text" class="form-control text-center"
                                                    required placeholder="رقم التعريفي للمورد">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierName" type="text" class="form-control text-center"
                                                    required placeholder="اسم المورد">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">+966</span>
                                                    <input class="form-control text-center" name="u_phone" placeholder="رقم الهاتف" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierRigesteNumber" type="text" class="form-control text-center"
                                                  required placeholder="رقم السجل التجاري">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierTaxNumber" type="text" class="form-control text-center"
                                                  required placeholder="الرقم الضريبي">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="SupplierNationalNumber"  class="form-control text-center"
                                                  required placeholder="العنوان الوطني">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="PostCode" class="form-control text-center"
                                                    required placeholder="الرمز البريدي">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="AccountNumber" class="form-control text-center"
                                                    required placeholder="رقم الحساب المورد">
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