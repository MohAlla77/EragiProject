
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
        <div id="layoutSidenav_content" style="height: 25vh; overflow-y: auto;">
            <main>
                <div class="card mb-4">
                    <div class="card-header text-end">عرض <i class="fas fa-table me-4"></i></div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <select id="invoiceTypeFilter" class="form-select text-center ms-auto">
                            <option value="all">كل المشتريات </option>
                            <option value="invoices">الفواتير</option>
                            <option value="Invoicereturns">مرتجع الفواتير</option>
                            <option value="purchaseorder">طلب شراء</option>
                            <option value="Item">الاصناف</option>
                            <option value="Itemgroup">مجموعة الاصناف</option>
                            <option value="Servicesgroup">مجموعة الخدمات</option>
                            <option value="Services">الخدمات</option>
                            <option value="Suppliers">الموردين</option>
                        </select>
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
                                    <th>الحالة</th>
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
                                    <td>{{ $car->created_at->format('d/m/y h:i A')}}</td>
                                    <td>{{ $car->status }}</td>
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
            </main>
          @include('Layout.footer')
        </div>
    </div>
</body>