@extends('Layout.head')
<body class="sb-nav-fixed">
   @include('Layout.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content" style="height: 25vh; overflow-y: auto;">
            <main>
                <div class="card mb-4">
                    <div class="card-header text-end">عرض <i class="fas fa-table me-4"></i></div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <select id="invoiceTypeFilter" class="form-select text-center ms-auto">
                            <option value="{{Route('purchases')}}">المشتريات</option>
                            <option value="{{Route('invoice')}}">الفواتير</option>
                            <option value="{{Route('retern_invoice')}}">مرتجع الفواتير</option>
                            <option value="{{Route('purchase_orders')}}">طلبات الشراء</option>
                            <option value="{{Route('Categorize')}}">الاصناف</option>
                            <option value="{{Route('services')}}">الخدمات</option>
                            <option value="{{Route('Tires')}}">الاطارات</option>
                            <option value="{{Route('suppliers')}}">الموردين</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <table id="webpageTable">
                            <thead>
                                <tr>
                                    {{-- <th>التاريخ</th>
                                    <th>تعليق</th>
                                    <th>الماركة</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    <th>العداد</th>
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th> --}}
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    {{-- <th>التاريخ</th>
                                    <th>الحالة</th>
                                    <th>الماركو</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    <th>العداد</th>
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th> --}}
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($Cars as $car)
                                <tr>
                                    {{-- <td>{{ $car->created_at->format('d/m/y h:i A')}}</td>
                                    <td>{{ $car->status }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->counter }}</td>
                                    <td>{{ $car->car_name }}</td>
                                    <td>{{ $car->counter }}</td>
                                    <td>{{ $car->structure_no }}</td>
                                    <td>{{ $car->plate }}</td>
                                    <td>{{ $car->phone }}</td>
                                    <td>{{ $car->name }}</td> --}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Function to fetch webpage content and display in table
        function displayWebpageContent(url) {
            $.get(url, function(data) {
                // Extract content from fetched HTML
                var content = $(data).find('body').html();
                
                // Update table with content
                $('#webpageTable tbody').html('<tr><td>' + content + '</td></tr>');
            });
        }

        // Event listener for dropdown change
        $('#pageSelect').change(function() {
            var selectedPage = $(this).val();
            displayWebpageContent(selectedPage);
        });

        // Display initial content on page load
        displayWebpageContent($('#pageSelect').val());
    </script>
</body>