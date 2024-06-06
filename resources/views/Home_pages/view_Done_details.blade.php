@extends('Master')
    @section('title','View_Done_details')
        {{-- @section('navbarTitle' 'View_Done_details') --}}
            @section('content')
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary text-left">
                                    <i class="fa-solid fa-cloud-arrow-down"></i>
                                </button>
                            </div>
                            <div class="col-6 text-end">
                                السيارات الصيانه
                                <i class="fas fa-table me-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>التاريخ</th>
                                    <th>تعليق</th>
                                    <th>الماركة</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    <th>العداد</th>
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>التاريخ</th>
                                    <th>تعليق</th>
                                    <th>الماركو</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    <th>العداد</th>
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($Cars as $car )

                                <tr>
                                    <td>{{ $car->created_at->format('d/m/y h:i A') }}</td>
                                    <td>{{ $car->comment }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->counter }}</td>
                                    <td>{{ $car->car_name }}</td>
                                    <td>{{ $car->counter }}</td>
                                    <td>{{ $car->structure_no }}</td>
                                    <td>{{ $car->plate }}</td>
                                    <td>{{ $car->phone }}</td>
                                    <td>{{ $car->name }}</td>

                                    <!-- Add more table cells as needed -->
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            @stop