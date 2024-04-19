{{--
// Establish database connection
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'db-inch';

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die('Connection failed: ' . $conn->connect_error);
// }

// Retrieve data from database
// $sql = 'SELECT * FROM order_main';
// $result = $conn->query($sql);

// // Display data in a table
// if ($result->num_rows > 0) {
//     echo "<table>
//     <tr>
//     <th>name</th>
//     <th>phone</th>
//     <th>plate</th>
//     <th>HS</th>
//     <th>car_name/th>
//     <th>service</th>
//     <th>model</th>
//     <th>brand</th>
//     <th>comment</th>
//     <th>time</th>
//     <th>id</th>
//     </tr>";

//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo '<tr>';
//         foreach ($row as $field) {
//             echo '<td>' . $field . '</td>';
//         }
//         echo '</tr>';
//     }
//     echo '</table>';
// } else {
//     echo '0 results';
// }
// $conn->close(); --}}



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
                    <div class="card-header text-end">السيارات <i class="fas fa-table me-4"></i></div>
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