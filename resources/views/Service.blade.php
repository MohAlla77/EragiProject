@extends('Master')
@section('title', ('Service'))
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-md-12 mb-1">
                {{-- <button type="button" class="btn btn-success col-12"  data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    اضافة المجموعة الخدمات
                </button> --}}
                <div>
                    @include('model.service_group_purchase_popup')
                </div>
                <button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#exampleModal99">
                    اضافة مجموعة الخدمات
                </button>                   
                <!-- Modal -->
                <div class="modal fade" id="exampleModal99" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-12">
                            <h5 class="modal-title text-center" id="exampleModalLabel">طلب تسعير المنتج</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-4">
                                <div class="card-header text-end">اختيار المنتجات<i
                                        class="fas fa-table me-4"></i></div>
                                <div class="card-body">
                                    <select class="form-select text-center" aria-label="Default select example">
                                        <option selected>حدد المنتج</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card bg-light">
                        <div class="card-body">
                            <form id="addItemForm" novalidate  action="{{ route('Service.store') }}" method="post">
                                @csrf
                                <div class="row g-1">
                                    <div class="col-12 mb-1">
                                        <input type="text" class="form-control text-center"
                                        id="AddaserviceFields" required placeholder="اضافة خدمة" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="service_group_id"
                                            class="form-select text-center"
                                            onchange="toggleForm(this)">
                                            <option selected>اختار المجموعة</option>
                                            @foreach ($ServiceGroup as $S_group)
                                            <option value="{{ $S_group->id }}">
                                                    {{ $S_group->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control text-center"
                                            id="اسم المجموعة" required placeholder="اسم المجموعة"> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <input name="ServiceName" type="text"
                                            class="form-control text-center" id="اسم خدمة" required
                                            placeholder="اسم خدمة">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="ServiceId" name="number"
                                            class="form-control text-center" id="الرمز" required
                                            placeholder="رمز الخدمة" readonly>
                                    </div>
                                    <div class="col-6">
                                        <input name="ServiceCost" name="number"
                                            class="form-control text-center" id="سعر التكلفة" required
                                            placeholder="سعر التكلفة">
                                    </div>
                                    <div class="col-6">
                                        <input name="ServiceCost" name="number"
                                            class="form-control text-center" id="سعر البيع" required
                                            placeholder="سعر البيع">
                                    </div>
                                    <div class="select col-md-6 mb-1" aria-label="Forms toggle">
                                        <select name="Service_type" class="form-select text-center"
                                            onchange="toggleForm(this)">
                                            <option disabled selected>نوع الخدمة</option>
                                                @foreach ($service_type as $option)
                                                    <option value="{{ $option }}">{{ $option }}</option>
                                                @endforeach
                                            {{-- <option value="داخلية">خدمة داخلية </option>
                                            <option value="خارجية">خدمة خارجية</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-12 text-center mb-1">
                                        <button type="submit" class="col-6 btn btn-success" >إضافة خدمة
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
    </div>
@stop