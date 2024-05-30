@extends('Master')
@section('title',('WorkPlace'))
@section('content')
    <div class="container-fluid mt-4 bg-gradient text-black justify-content-center">
        @include('shared.error_massege')
        @include('shared.success_message')
        @if (isset($car))
            <div class="alert alert-primary" role="alert">
                حالة السيارة  {{ $car->status }}
            </div>
        @endif
        <div class="card bg-light">
            <div class="card-body">
                {{-- <form action="#" method="post" id="carForm"><br> --}}
                <form action="{{ route('car.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control text-center" name="plateNumber"
                            placeholder="بحث">
                        <button class="btn btn-outline-success" type="search">بحث</button>
                    </div>
                </form>
                <div class="row g-1">
                    @if (isset($car))
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center"
                                value="{{ $car->car_name }}" name="carName" required
                                placeholder="اسم السيارة" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center"
                                value="{{ $car->structure_no }}" name="chassisNumber" required
                                placeholder="رقم الهيكل" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center"
                                value="{{ $car->brand }}" name="carBrand" placeholder="ماركة السيارة"
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center"
                                value="{{ $car->name }}" name="carBrand" placeholder="مالك السيارة"
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control text-center" value="{{ $car->model }}"
                                name="carModel" placeholder="موديل السيارة" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control text-center"
                                value="{{ $car->service }}" name="serviceType" placeholder="نوع الخدمة"
                                readonly>
                        </div>
                    @endif
                </div>
                @if (isset($car) && isset($data) && $car->status === 'WAITING')
                    @include('WorkSpace_Status.waiting')
                @elseif(isset($car) && isset($data) && ($car->status === 'MAINTENACE' || $car->status === 'DONE'))
                    @include('WorkSpace_Status.main$done')
                @else
                    {{-- @include('WorkSpace_Status.new') --}}
                    <div class="row">
                        <div class="col-md-6">
                            @if (isset($Car_wait))
                                @php
                                    $user_name = App\Models\User::find($Car_wait->user_name);
                                    $Eng_name = App\Models\User::find($Car_wait->Eng_name);
                                @endphp
                                <div class="row">
                                    <label for="notes" class="form-label d-flex justify-content-end">
                                        اسباب الانتظار
                                    </label>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control text-center"
                                            value="{{ $user_name->first_name }} : الموظف" name="carName"
                                            required placeholder="اسم الاستقبال"readonly>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control text-center"
                                            name="carName" value="{{ $Eng_name->first_name }} : المهندس"
                                            required placeholder="اسم المهندس"readonly>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control text-center"
                                            name="carName" value=" الشكوى: {{ $Car_wait->fix }}" required
                                            placeholder="شكوي السابفة"readonly>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control text-center"
                                            name="carName" value="الإجراء: {{ $Car_wait->fix_doc }} "
                                            required placeholder="الاجراءات السابفة"readonly>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control text-center"
                                            name="carName"
                                            value="   اسم الفنى :  {{ $Car_wait->Worker_name }}  "
                                            required placeholder="اسم الفني"readonly>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control text-center"
                                            name="carName" value="{{ $Car_wait->wait_reason }}" required
                                            placeholder=" سبب الإنتظار"readonly>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <input type="text" class="form-control text-center"
                                            name="carName"
                                            value="{{ $Car_wait->created_at->format('d/m/y') }}" required
                                            placeholder="التاريخ" readonly>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-4 mx-auto py-4">
                                    <button class="btn btn-warning" type="submit">
                                            الي الصيانة <i class="fa-solid fa-arrow-rotate-left"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if (isset($car))
                                <form action="{{ route('AddCar.check', $car->id) }}" method="POST">
                                    @csrf
                                    <label for="notes" class="form-label d-flex justify-content-end">
                                        شكاوى العميل
                                    </label>
                                    <div class="numbered-textarea">
                                        <textarea class="form-control" name="notes" id="notes" style="height: 200px;">
                                    </textarea>
                                        <div class="line-numbers"></div>
                                    </div>
                                        <div class="d-grid gap-2 col-4 mx-auto py-4">
                                            <button class="btn btn-primary" type="submit">
                                                    أمر فحص 
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header text-end">الزيارة السابقة <i
                                class="fas fa-table me-4"></i></div>
                        <div class="card-body">
                            @if (isset($CarHistorys))
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>ساعت العمل</th>
                                            <th>اسم السيارة</th>
                                            <th>اسم العميل</th>
                                            <th>اسم الفني</th>
                                            <th>الاجراءات السابقة</th>
                                            <th>الشكاوي السابقه</th>
                                            <th>اسم المهندس</th>
                                            <th>اسم الاستقبال</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($CarHistorys as $CarHistory)
                                            <tr>
                                                @php
                                                    $user = App\Models\User::find($CarHistory->user_name);
                                                    $Eng = App\Models\User::find($CarHistory->Eng_name);
                                                @endphp
                                                <td>{{ $CarHistory->created_at->format('d/m/y') }}</td>
                                                <td>{{ $CarHistory->Work_time }}</td>
                                                <td>{{ $car->car_name }}</td>
                                                <td>{{ $car->name }}</td>
                                                <td>{{ $CarHistory->Worker_name }}</td>
                                                <td>{{ $CarHistory->fix_doc }}</td>
                                                <td>{{ $CarHistory->fix }}</td>
                                                <td>{{ $Eng->first_name }} </td>
                                                <td>{{ $user->first_name }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                @endif
                {{--
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <ul class="tree">
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db1">Database 1</a>
                                        <ul id="db1" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 2</a></li>
                                            <li class="text-center"><a href="#">Table 1</a></li>
                                            <li class="text-center"><a href="#">Table 3</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db2">Database 2</a>
                                        <ul id="db2" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 4</a></li>
                                            <li class="text-center"><a href="#">Table 5</a></li>
                                            <li class="text-center"><a href="#">Table 6</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db3">Database 3</a>
                                        <ul id="db3" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 7</a></li>
                                            <li class="text-center"><a href="#">Table 8</a></li>
                                            <li class="text-center"><a href="#">Table 9</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <ul class="tree">
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db1">Database 1</a>
                                        <ul id="db1" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 2</a></li>
                                            <li class="text-center"><a href="#">Table 1</a></li>
                                            <li class="text-center"><a href="#">Table 3</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db2">Database 2</a>
                                        <ul id="db2" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 4</a></li>
                                            <li class="text-center"><a href="#">Table 5</a></li>
                                            <li class="text-center"><a href="#">Table 6</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db3">Database 3</a>
                                        <ul id="db3" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 7</a></li>
                                            <li class="text-center"><a href="#">Table 8</a></li>
                                            <li class="text-center"><a href="#">Table 9</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@stop