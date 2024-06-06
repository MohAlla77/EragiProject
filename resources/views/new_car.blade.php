@extends('Master')
    @section('title', 'New Car')
        @section('content')
            <div class="container-fluid mt-2">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="justify-content-center" action="{{ route('car.store') }}" method="POST"
                            enctype="multipart/form-data" id="carForm">
                            @csrf
                            {{-- onsubmit="sendAlert(event); scrollToTop();"> --}}
                            <div class="card">
                                <div class="row g-1">
                                    <div class="col-md-12"><br>
                                        <div class="row g-1">
                                            <div class="col-md-5">
                                                <input type="datetime-local" class="form-control text-center" 
                                                id="validationCustomDate" readonly required>
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
                                                    <select name="car_brand" id="brand"
                                                        class="form-select text-center"
                                                        aria-describedby="validationServer04Feedback" required>
                                                        <option value="" disabled selected>ماركة السيارة
                                                        </option>
                                                        <!-- Placeholder option -->
                                                        @foreach ($car_brand as $car_brand)
                                                            <option>{{ $car_brand }}</option>
                                                        @endforeach
                                                        <!-- Add options here -->
                                                    </select>
                                                    @error('car_brand')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    <select name="car_model" id="model"
                                                        class="form-select text-center"
                                                        aria-describedby="validationServer04Feedback" required>
                                                        <option value="" disabled selected>موديل السيارة
                                                        </option>
                                                        <!-- Placeholder option -->
                                                        @foreach ($car_model as $car_model)
                                                            <option>{{ $car_model }}</option>
                                                        @endforeach
                                                        <!-- Add options here -->
                                                    </select>
                                                    @error('car_model')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
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
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2 position-relative">
                                                    <input name="structure_no" type="text" class="form-control text-center" id="chassisNumber" required placeholder="رقم الهيكل" oninput="validateStructureNo()">
                                                    <span class="d-block fs-6 text-danger mt-2 error-message" id="structureNoError"></span>
                                                </div>
                                                <div class="input-group mb-2">
                                                    <input name="car_counter" name="number"
                                                        class="form-control text-center" id="odometerReading"
                                                        required placeholder="رقم العداد">
                                                    <span class="input-group-text">KM</span>
                                                    @error('car_counter')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-2 position-relative">
                                                    <input name="car_name" type="text"
                                                        class="form-control text-center" id="carName" required
                                                        placeholder="اسم السيارة">
                                                    @error('car_name')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2 error-message">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="cashInput">
                                                    <div class="mb-2 position-relative">
                                                        <input name="u_name" type="text" name="name"
                                                            class="form-control text-center" id="customerName"
                                                            required placeholder="الاسم">
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
                                                            <option>اختار الشركة</option>
                                                            @foreach ($company as $comp)
                                                                <option value="{{ $comp->company_name }}"
                                                                    data-company-name="{{ $comp->company_name }}"
                                                                    data-company-phone="{{ $comp->phone }}">
                                                                    {{ $comp->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('u_name')
                                                            <span
                                                                class="d-block fs-6 text-danger mt-2"readonly>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="input-group mb-2 position-relative">
                                                    <span class="input-group-text">+966</span>
                                                    <input class="form-control text-center" name="u_phone"
                                                        id="customerPhone" placeholder="5x xxx xxxx" required>
                                                    @error('u_phone')
                                                        <span
                                                            class="d-block fs-6 text-danger mt-2 error-message">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="otp1"
                                                        maxlength="1" required>
                                                    <input type="text" class="form-control"
                                                        name="otp2"maxlength="1" required>
                                                    <input type="text" class="form-control" name="otp3"
                                                        maxlength="1" required>
                                                    <input type="text" class="form-control" name="otp4"
                                                        maxlength="1" required placeholder="لوحة">
                                                    <input type="text" class="form-control" name="otp5"
                                                        maxlength="1" required placeholder="رقم ">
                                                    <input type="text" class="form-control" name="otp6"
                                                        maxlength="1" required>
                                                    <input type="text" class="form-control" name="otp7"
                                                        maxlength="1" required>
                                                    {{-- @error('car_plate')
                                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                    @enderror --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row g-1 mb-1">
                                            <div class="col-md-12">
                                                <div class="card bg-light border-dark">
                                                    <div class="card-body">
                                                        <div class="form-group text-center">
                                                            <label for="image3" style="cursor: pointer;">
                                                                <img 
                                                                {{-- src="placeholder.jpg" --}}
                                                                 class="img-thumbnail"
                                                                    id="imagePreview3">
                                                            </label>
                                                            <input type="file" name="images[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="border rounded p-1">
                                            <div class="d-flex justify-content-end mb-1">
                                                <label for="fuelLevel" class="form-label">مستوي البنزين</label>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <input type="range" class="form-range" id="fuelLevel" required
                                                    min="0" max="100">
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div style="position: relative;">
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
        @stop
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set the current date and time to Saudi Arabian time (UTC+3)
        var currentDate = new Date();
        var saudiArabianTime = new Date(currentDate.getTime() + (3 * 60 * 60 * 1000));
        var formattedDate = saudiArabianTime.toISOString().slice(0, 16);
        var dateTimeInput = document.getElementById('validationCustomDate');
        if (dateTimeInput) {
            dateTimeInput.readOnly = true;
            dateTimeInput.value = formattedDate;
        }

        // Get radio buttons and field elements
        const cashRadio = document.getElementById('cashPayment');
        const companyRadio = document.getElementById('companyPayment');
        const cashInput = document.getElementById('cashInput');
        const companyOptions = document.getElementById('companyOptions');
        const customerName = document.getElementById('customerName');
        const customerPhone = document.getElementById('customerPhone');
        const companySelect = document.getElementById('companySelect');

        // Function to show cash input and hide company options
        function showCashInput() {
            if (cashInput) cashInput.style.display = 'block';
            if (customerName) {
                customerName.value = '';
                customerName.disabled = false;
            }
            if (companySelect) companySelect.disabled = true;
            if (companyOptions) companyOptions.style.display = 'none';
            if (customerPhone) customerPhone.removeAttribute('readonly');
        }

        // Function to hide cash input and show company options
        function showCompanyOptions() {
            if (companyOptions) companyOptions.style.display = 'block';
            if (customerName) {
                customerName.value = '';
                customerName.disabled = true;
            }
            if (companySelect) {
                companySelect.disabled = false;
                companySelect.style.display = 'block';
            }
            if (customerPhone) customerPhone.setAttribute('readonly', 'readonly');
        }

        // Initial call to set initial state based on checked radio button
        if (companyRadio && companyRadio.checked) {
            showCompanyOptions();
        } else if (cashRadio) {
            showCashInput();
        }

        // Event listeners for radio buttons
        if (cashRadio) {
            cashRadio.addEventListener('change', showCashInput);
        }
        if (companyRadio) {
            companyRadio.addEventListener('change', showCompanyOptions);
        }

        // Handle company selection change
        if (companySelect) {
            companySelect.addEventListener('change', function() {
                var selectedOption = this.value;

                // If a company is selected, make the phone input field readonly
                if (selectedOption !== '') {
                    if (customerPhone) {
                        customerPhone.setAttribute('readonly', 'readonly');
                        var selectedOptionElement = this.options[this.selectedIndex];
                        customerPhone.value = selectedOptionElement.getAttribute('data-company-phone');
                    }
                } else {
                    if (customerPhone) {
                        customerPhone.removeAttribute('readonly');
                        customerPhone.value = '';
                    }
                }
            });
        }

        // Function to update fields based on the customer name
        function updateFields() {
            if (customerName) {
                var nameValue = customerName.value;
                var accessTime = generateAccessTime(nameValue);
                var date = generateDate(nameValue);

                var accessTimeField = document.getElementById('accessTime');
                var dataField = document.getElementById('data');

                if (accessTimeField) accessTimeField.value = accessTime;
                if (dataField) dataField.value = date;

                var stateObj = {
                    name: nameValue,
                    accessTime: accessTime,
                    date: date
                };
                history.pushState(stateObj, "", "");
            }
        }

        function generateAccessTime(name) {
            return "12:00"; // Placeholder logic
        }

        function generateDate(name) {
            return "2024-01-01"; // Placeholder logic
        }

        // Concatenate the individual inputs into a single string
        function concatenateCarPlate() {
            var carPlate = '';
            var inputs = document.querySelectorAll('#car_plate input');
            inputs.forEach(function(input) {
                carPlate += input.value.trim();
            });
            return carPlate;
        }

        // Example of how to use the concatenated car plate value
        var submitBtn = document.getElementById('submitBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                var carPlateValue = concatenateCarPlate();
                console.log(carPlateValue); // Replace this with sending the value to the server
            });
        }

        // Image preview
        var image3 = document.getElementById('image3');
        if (image3) {
            image3.addEventListener('change', function(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('imagePreview3');
                    if (output) {
                        output.src = dataURL;
                    }
                };
                reader.readAsDataURL(input.files[0]);
            });

            var imagePreview3 = document.getElementById('imagePreview3');
            if (imagePreview3) {
                imagePreview3.addEventListener('click', function() {
                    image3.click();
                });
            }
        }
        
            function validateStructureNo() {
                const structureNoInput = document.getElementById('chassisNumber');
                const errorSpan = document.getElementById('structureNoError');
                const value = structureNoInput.value;
                const regex = /^[A-Z0-9]{17}$/;

                if (!regex.test(value)) {
                    errorSpan.textContent = 'The structure number must be exactly 17 characters long and contain only uppercase letters and digits.';
                } else {
                    errorSpan.textContent = '';
                }
            }
    });
</script>