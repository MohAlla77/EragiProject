@extends('Master')
    @section('title', 'Pricing')
        @section('navbarTitle','Pricing')
            @section('content')
            <div class="contaner">
                {{-- <div class="cpl-12">
                    <button type="button" class="btn btn-primary col-3 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                        طلبات التسعير <i class="fa fa-bell" aria-hidden="true"></i>
                    </button>
                    @include('model.order_quotation_popup')
                </div> --}}
                <div class="card p-4">
                    <div class="card-body">
                        <p class="lead">You have order Pricing!</p>
                        <p>Please process the pricing request. So we can enter the products into the store.</p>
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-end">طلبات التسعير<i class="fas fa-table me-4"></i></div>
                    <div class="card-body">
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
                            @foreach ($Categorize as $Categorize)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>{{$Categorize->price_cost}}</tr>
                                    <tr>{{$Categorize->amount}}</tr>
                                    <tr>{{$Categorize->unit_type}}</tr>
                                    <tr>{{$Categorize->serial_number}}</tr>
                                    <tr>{{$Categorize->name}}</tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('Pricing.store') }}" method="post">
                                @csrf
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="row g-1">
                                            <div class="col-md-12">
                                                <input class="form-control text-center"placeholder="تسعير المنتج"readonly>
                                            </div>
                                            @if(isset($Categorize))
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control text-center"
                                                        value="{{$serial_number}}" placeholder="الرقم التسلسلي" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control text-center"
                                                    value="{{$Categorize_name}}" placeholder="اسم الصنف" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control text-center" 
                                                    value="{{$amount}}" placeholder="الكمية" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control text-center"
                                                    value="{{$unit_type}}" placeholder="نوع الوحدة" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control text-center"
                                                    value="{{$price_cost}}" placeholder="سعر التكلفة" required>
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
                                                        ارسال <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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