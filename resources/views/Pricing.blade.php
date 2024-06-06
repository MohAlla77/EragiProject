@extends('Master')
    @section('title', 'Pricing')
        @section('navbarTitle','Pricing')
            @section('content')
            <div class="cpl-12">
                <button type="button" class="btn btn-primary col-3 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                    طلبات التسعير <i class="fa fa-bell" aria-hidden="true"></i>
                </button>
                @include('model.order_quotation_popup')
            </div>
            <div class="card p-4">
                <p class="lead">Thank you for your order!</p>
                <p>Your pricing request is being processed. Please wait while we prepare the pricing information for your products.</p>
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <form action="{{ route('Pricing.store') }}" method="post">
                @csrf <!-- CSRF protection -->
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="row g-1">
                            <div class="col-md-12">
                                <input class="form-control text-center"placeholder="تسعير المنتج"readonly>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom01" name="serial_number" value=""
                                    placeholder="الرقم التسلسلي" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom02" name="item_name" value=""
                                    placeholder="اسم الصنف" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom03" name="quantity" value=""
                                    placeholder="الكمية" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom04" name="unit_type" value=""
                                    placeholder="نوع الوحدة" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control text-center"
                                    id="validationCustom05" name="cost_price" value=""
                                    placeholder="سعر التكلفة" required>
                            </div>
                            <div class="col-md-6 mb-1">
                                <input name="#"
                                    class="form-control text-center"
                                    placeholder="سعر البيع"required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">
                                    الغاء <i class="fa-solid fa-xmark"></i>
                                </button>
                                <button type="submit" class="btn btn-success col-3">
                                    موافق <i class="fa fa-bookmark" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @stop
            <script type="text/javascript">
                $(document).ready(function(){
                    // Check if the alert should be shown (e.g., passed a parameter from the previous page)
                    var showAlert = true; // Change this based on your logic

                    if (showAlert) {
                        $('#myAlert').show('fade');

                        setTimeout(function (){
                            $('#myAlert').hide('fade');
                        }, 4000);
                    }

                    $('#linkClose').click(function(){
                        $('#myAlert').hide('fade');
                    });
                });
            </script>