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
                <div class="card mb-4">
                    <div class="card-header text-end">السيارات <i class="fas fa-table me-4"></i></div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>القرار</th>
                                    <th>التاريخ</th>
                                    <th>شكوى العميل</th>
                                    <th> الإجراء المقترح</th>
                                    <th>اسم السيارة</th>
                                    <th>اسم العميل</th>
                                    <th>اسم مقدم الخدمة</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>القرار</th>
                                    <th>التاريخ</th>
                                    <th>شكوى العميل</th>
                                    <th> الإجراء المقترح</th>
                                    <th>اسم السيارة</th>
                                    <th>اسم العميل</th>
                                    <th>اسم مقدم الخدمة</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($checkCarData as $data)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$data->CarId}}{{$data->UserId}}">
                                                <i class="fa-solid fa-file-import"></i>
                                            </button>
                                            @include('model.popup')
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->customer_comment }}</td>
                                        <td>{{ $data->fix_requirement }}</td>
                                        <td>{{ $data->CarName }}</td>
                                        <td>{{ $data->u_name }}</td>
                                        <td>{{ $data->user_name }}</td>
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
