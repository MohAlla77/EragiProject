@extends('Layout.head')

<body class="sb-nav-fixed">
    @include('Layout.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @include('Layout.sidebar')
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                        <div class="card-header text-end">مبيعات الخدمات <i class="fas fa-table me-4"></i></div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>القرار</th>
                                        <th scope="col">حالة الخدمة</th>
                                        <th scope="col">مجموعة الخدمة</th>
                                        <th scope="col">نوع الخدمة</th>
                                        <th scope="col">سعر التكلفة</th>
                                        <th scope="col">رقم الخدمة</th>
                                        <th scope="col">اسم الخدمة</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>القرار</th>
                                        <th scope="col">حالة الخدمة</th>
                                        <th scope="col">مجموعة الخدمة</th>
                                        <th scope="col">نوع الخدمة</th>
                                        <th scope="col">سعر التكلفة</th>
                                        <th scope="col">رقم الخدمة</th>
                                        <th scope="col">اسم الخدمة</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($Services as $service)
                                        <tr>

                                            <td>
                                                <form action="{{ route('ApproveService', $service->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submite" class="btn btn-primary">
                                                        موافق
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $service->status }}</td>
                                            <td>{{ $service->serviceGroup->name }}</td>
                                            <td>{{ $service->service_type }}</td>
                                            <td>{{ $service->cost_price }}</td>
                                            <td>{{ $service->service_id }}</td>
                                            <td>{{ $service->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            @include('Layout.footer')
        </div>
    </div>
</body>



<div class="card mb-4">
    <div class="card-header text-end">الخدمات<i class="fas fa-table me-4"></i></div>
    <div class="card-body">
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

                        <td>{{ $service->status }}</td>
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
</main>
  @include('Layout.footer')
</div>
</div>
</body>
