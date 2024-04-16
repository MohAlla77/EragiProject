<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>سيارة جديدة</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 15px;
            /* Adjust height as needed */
            border-radius: 5px;
            /* Adjust border radius as needed */
            outline: none;
            margin: 10px 0;
            /* Adjust margin as needed */
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            /* Adjust thumb width as needed */
            height: 20px;
            /* Adjust thumb height as needed */
            border-radius: 50%;
            /* Round thumb */
            background: white;
            /* Thumb color */
            cursor: pointer;
        }
        .error-message {
            position: absolute;
            bottom: 45%;
            left: 0;
            width: 100%;
            text-align: center;
            margin-top: -5px;
                }

    </style>
</head>

<body class="sb-nav-fixed sb-sidenav-toggled">
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
                <div class="container-fluid mt-2">
                    <div class="card bg-light">
                        <div class="card-body">
                            <form class="justify-content-center" action="{{ route('car.store') }}" method="POST"
                                id="carForm">
                                @csrf
                                {{-- onsubmit="sendAlert(event); scrollToTop();"> --}}
                                <div class="card">
                                    <div class="row g-1">
                                        <div class="col-md-12"><br>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="datetime-local" class="form-control text-center"
                                                        id="validationCustomDate" placeholder="التاريخ" required
                                                        readonly>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control text-center"
                                                        id="validationCustomUsername"
                                                        value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} :  المستخدم "
                                                        required readonly>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="paymentType" id="cashPayment" value="cash" required>
                                                        <label class="form-check-label" for="cashPayment">
                                                            نقدي
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="paymentType" id="companyPayment" value="company"
                                                            required>
                                                        <label class="form-check-label" for="companyPayment">
                                                            شركة
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><br>
                                            <div class="row g-1">
                                                <div class="col-md-4">
                                                    <div class="mb-2">
                                                        <select name="car_brand" id="brand" class="form-select text-center"
                                                            aria-describedby="validationServer04Feedback" required>
                                                            <option value="" disabled selected>ماركة السيارة</option>
                                                            <!-- Placeholder option -->
                                                            @foreach ($car_brand as $car_brand)
                                                                <option>{{ $car_brand }}</option>
                                                            @endforeach
                                                            <!-- Add options here -->
                                                        </select>
                                                        @error('car_brand')
                                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <select name="car_model" id="model" class="form-select text-center"
                                                            aria-describedby="validationServer04Feedback" required>
                                                            <option value="" disabled selected>موديل السيارة</option>
                                                            <!-- Placeholder option -->
                                                            @foreach ($car_model as $car_model)
                                                                <option>{{ $car_model }}</option>
                                                            @endforeach
                                                            <!-- Add options here -->
                                                        </select>
                                                        @error('car_model')
                                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <select name="car_service" id="serviceType"
                                                            class="form-select text-center"
                                                            aria-describedby="validationServer04Feedback" required>
                                                            <option value="" disabled selected>نوع الخدمة</option>
                                                            <!-- Placeholder option -->
                                                            @foreach ($car_service as $car_service)
                                                                <option>{{ $car_service }}</option>
                                                            @endforeach
                                                            <!-- Add options here -->
                                                        </select>
                                                        @error('car_service')
                                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-2 position-relative">
                                                        <input name="structure_no" type="text"
                                                            class="form-control text-center" id="chassisNumber"
                                                            name="chassisNumber" required placeholder="رقم الهيكل">
                                                        @error('structure_no')
                                                            <span class="d-block fs-6 text-danger mt-2 error-message">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <input name="car_counter" name="number"
                                                            class="form-control text-center" id="odometerReading" required
                                                            placeholder="رقم العداد">
                                                        <span class="input-group-text">KM</span>
                                                        @error('car_counter')
                                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2 position-relative">
                                                        <input name="car_name" type="text" class="form-control text-center"
                                                            id="carName" required placeholder="اسم السيارة">
                                                        @error('car_name')
                                                            <span class="d-block fs-6 text-danger mt-2 error-message">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="cashInput">
                                                        <div class="mb-2 position-relative">
                                                            <input name="u_name" type="text" name="name"
                                                                class="form-control text-center" id="customerName" required
                                                                placeholder="الاسم">
                                                            @error('u_name')
                                                                <span
                                                                    class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div id="companyOptions" style="display:none;">
                                                        <div class="mb-2">
                                                            <select name="u_name" id="companySelect"
                                                                class="form-select text-center"readonly>
                                                                <option selected>اختار الشركة</option>
                                                                @foreach ($company as $comp)
                                                                    <option value="{{ $comp->id }}"
                                                                        data-company-name="{{ $comp->company_name }}"
                                                                        data-company-phone="{{ $comp->phone }}">
                                                                        {{ $comp->company_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('u_name')
                                                                <span class="d-block fs-6 text-danger mt-2"readonly>{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-2 position-relative">
                                                        <span class="input-group-text">+966</span>
                                                        <input class="form-control text-center" name="u_phone" id="customerPhone" placeholder="5x xxx xxxx" required>
                                                        @error('u_phone')
                                                            <span class="d-block fs-6 text-danger mt-2 error-message">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="otp1" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 1" required>
                                                        <input type="text" class="form-control" id="otp2" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 2" required>
                                                        <input type="text" class="form-control" id="otp3" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 3" required>
                                                        <input type="text" class="form-control" id="otp4" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 4" required placeholder="لوحة">
                                                        <input type="text" class="form-control" id="otp5" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 5" required placeholder="رقم ">
                                                        <input type="text" class="form-control" id="otp6" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 6" required>
                                                        <input type="text" class="form-control" id="otp7" name="otp[]" maxlength="1" pattern="[0-9]" aria-label="OTP digit 7" required>

                                                        @error('car_plate')
                                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="col-md-12">
                                                <label for="formFile" class="form-label d-flex justify-content-end">ارفاق صورة</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                            <div class="border rounded p-1 mb-1">
                                                <div class="d-flex justify-content-end mb-1">
                                                    <label for="fuelLevel" class="form-label">مستوي البنزين</label>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="fuelLevel" required
                                                        min="0" max="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1" style="position: relative;">
                                            <textarea name="comment" class="form-control text-center" placeholder="تعليق" id="comment"
                                                style="height: 100px; direction: rtl; text-align: right;"></textarea>
                                            <div id="lineNumbers"
                                                style="position: absolute; top: 0; right: 0; bottom: 0; padding: 6px 10px; direction: ltr; text-align: left;">
                                            </div>
                                            @error('comment')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="d-grid gap-2 col-md-6 mx-auto py-4">
                                            <button class="btn btn-primary" name="submit" value="submit"
                                                type="submit">موافق</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        // Get radio buttons and field elements
        const cashRadio = document.getElementById('cashPayment');
        const companyRadio = document.getElementById('companyPayment');
        const cashInput = document.getElementById('cashInput');
        const companyOptions = document.getElementById('companyOptions');

        // Function to show cash input and hide company options
        function showCashInput() {
            cashInput.style.display = 'block';
            companyOptions.style.display = 'none';
            // Enable manual entry for phone number
            document.getElementById('customerPhone').removeAttribute('readonly');
        }

        // Function to hide cash input and show company options
        function showCompanyOptions() {
            cashInput.style.display = 'none';
            companyOptions.style.display = 'block';
            // Make phone input field readonly when company is selected
            document.getElementById('customerPhone').setAttribute('readonly', 'readonly');
        }

        // Initial call to set initial state based on checked radio button
        if (companyRadio.checked) {
            showCompanyOptions();
        } else {
            showCashInput();
        }

        // Event listeners to call respective functions when radio buttons are clicked
        cashRadio.addEventListener('change', showCashInput);
        companyRadio.addEventListener('change', showCompanyOptions);

        document.addEventListener('DOMContentLoaded', function() {
            // Access element properties or call methods here
            var element = document.getElementById('customerName');
            if (element) {
                // Do something with the element if it exists
            }
        });

        document.getElementById('companySelect').addEventListener('change', function() {
            var selectedOption = this.value;
            var customerPhoneInput = document.getElementById('customerPhone');

            // If a company is selected, make the phone input field readonly
            if (selectedOption !== '') {
                customerPhoneInput.setAttribute('readonly', 'readonly');
            } else {
                customerPhoneInput.removeAttribute('readonly');
            }
        });


        // Get the current date and time
        var currentDate = new Date();

        // Adjust the time zone offset to Saudi Arabian time (UTC+3)
        var saudiArabianTime = new Date(currentDate.getTime() + (3 * 60 * 60 * 1000));

        // Format the date and time to fit the input field format (YYYY-MM-DDTHH:MM)
        var formattedDate = saudiArabianTime.toISOString().slice(0, 16);

        // Set the value of the input field to the current date and time in Saudi Arabian time
        document.getElementById("validationCustomDate").value = formattedDate;

        function updateFields() {
            // Get the value entered in the "الاسم" field
            var nameValue = document.getElementById('customerName').value;

            // Update the "Access Time" and "التاريخ" fields based on the entered name
            var accessTime = generateAccessTime(nameValue);
            var date = generateDate(nameValue);

            document.getElementById('accessTime').value = accessTime;
            document.getElementById('data').value = date;

            // Manipulate browser history
            var stateObj = {
                name: nameValue,
                accessTime: accessTime,
                date: date
            };
            history.pushState(stateObj, "", "");
        }

        function generateAccessTime(name) {
            // Implement your logic to generate access time based on the entered name
            // This is just a placeholder, you need to replace it with your actual logic
            return "12:00";
        }

        function generateDate(name) {
            // Implement your logic to generate date based on the entered name
            // This is just a placeholder, you need to replace it with your actual logic
            return "2024-01-01";
        }

        document.getElementById('companySelect').addEventListener('change', function() {
            var selectedOption = this.value;
            var companyPhoneField = document.getElementById('customerPhone');

            // Populate form fields with data based on the selected company
            if (selectedOption !== '') {
                var selectedOptionElement = this.options[this.selectedIndex];
                companyPhoneField.value = selectedOptionElement.getAttribute('data-company-phone');
                // companyPhoneField.disabled = true;
            } else {
                // Clear form fields if no option is selected
                companyPhoneField.value = '';
                // companyPhoneField.disabled = false;
            }
        });
                // Concatenate the individual inputs into a single string
        function concatenatecar_plate() {
            var car_plate = '';
            var inputs = document.querySelectorAll('#car_plate input');
            inputs.forEach(function(input) {
                car_plate += input.value.trim(); // Trim to remove any extra spaces
            });
            return car_plate;
        }

        // Example of how to use the concatenated car plate value
        document.getElementById('submitBtn').addEventListener('click', function() {
            var car_plateValue = concatenatecar_plate();
            console.log(car_plateValue); // You can replace this with sending the value to the server
        });

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

</body>
