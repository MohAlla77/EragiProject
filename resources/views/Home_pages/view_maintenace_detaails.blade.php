@extends('Master')
    @section('title','View_Maintenace_Details')
        {{-- @section('navbarTitle' 'View_Maintenace_Details') --}}
            @section('content')
                <div class="card border-dark">
                    <div class="card-header text-end">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal44">
                            طلب اسبير
                        </button>
                            @include('model.Order_Esper_popup') --}}
                        السيارات <i class="fas fa-table me-4"></i>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>موقت</th>
                                    <th>الانتظار/ النهاية</th>
                                    {{-- <th>التاريخ</th>
                                    <th>تعليق</th> --}}
                                    <th> الإجراء المقترح</th>
                                    <th>شكوى العميل</th>
                                    <th>الماركة</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    {{-- <th>العداد</th> --}}
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>موقت</th>
                                    <th>الانتظار/ النهاية</th>
                                    {{-- <th>التاريخ</th>
                                    <th>تعليق</th> --}}
                                    <th> الإجراء المقترح</th>
                                    <th>شكوى العميل</th>
                                    <th>الماركو</th>
                                    <th>الموديل</th>
                                    <th>الخدمة</th>
                                    <th>اسم السيارة</th>
                                    {{-- <th>العداد</th> --}}
                                    <th>الهيكل</th>
                                    <th>اللوحة</th>
                                    <th>الهاتف</th>
                                    <th>الاسم</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($Cars as $car)
                                 @foreach ($Data as $data)


                                    <tr>
                                        <td>
                                            <div class="timer-container">
                                                <div class="timer" data-hours="0" data-minutes="0" data-seconds="0">
                                                    00:00:00</div>
                                            </div>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $car->id }}">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                            @include('model.ToDone_popup')

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal2{{ $car->id }}">
                                                <i class="fa fa-undo" aria-hidden="true" ></i>
                                            </button>
                                            @include('model.Back_to_Wait_popup')
                                        </td>
                                        <td>{{ $data->fix_requirement }}</td>
                                        <td>{{ $data->customer_comment }}</td>
                                        {{-- <td>{{ $car->created_at->format('d/m/y h:i A') }}</td>
                                        <td>{{ $car->comment }}</td> --}}
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->car_name }}</td>
                                        {{-- <td>{{ $car->counter }}</td> --}}
                                         <td>{{ $car->structure_no }}</td>
                                        <td>{{ $car->plate }}</td>
                                        <td>{{ $car->phone }}</td>
                                        <td>{{ $car->name }}</td>
                                    </tr>
                                  @endforeach
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @stop
    <script>
        // Function to start or resume the timer
        function startTimer() {
            var timers = document.querySelectorAll('.timer');
            timers.forEach(timer => {
                var hours = parseInt(timer.dataset.hours);
                var minutes = parseInt(timer.dataset.minutes);
                var seconds = parseInt(timer.dataset.seconds);

                setInterval(() => {
                    seconds++;
                    if (seconds >= 60) {
                        seconds = 0;
                        minutes++;
                        if (minutes >= 60) {
                            minutes = 0;
                            hours++;
                        }
                    }

                    timer.textContent = ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + (
                        '0' + seconds).slice(-2);
                    timer.dataset.hours = hours; // Update data attributes
                    timer.dataset.minutes = minutes;
                    timer.dataset.seconds = seconds;
                }, 1000);
            });
        }

        // Function to pause the timer
        function pauseTimer() {
            clearInterval(timer);
        }

        // Start the timer when the page loads
        window.onload = startTimer;
    </script>