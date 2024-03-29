<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>سيارة جديدة</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
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
        .logo-img {
          width: 55px; /* Adjust the width as needed */
          height: auto; /* Maintain aspect ratio */
          margin-right: 20px; /* Adjust the margin as needed */
      }
        .inner-card {
          padding: 15px; /* Adjust padding as needed */
          margin-bottom: 15px; /* Adjust margin as needed */
      }
    </style>
</head>

<body class="sb-nav-fixed sb-sidenav-toggled">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 text-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider"/></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="container-fluid">
            <a class="navbar-brand"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img text-end" alt="Logo"></a>            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="navbar-brand" href="#"><span>ادخال البيانات</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </form>
        <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
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
                <div class="container-fluid"><br>
                    <div class="card bg-light mb-2">
                        <div class="card-body">
                            <form class="justify-content-center" action="{{ route('car.store') }}" method="POST"
                                id="carForm">
                                @csrf
                                {{-- onsubmit="sendAlert(event); scrollToTop();"> --}}
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12 mb-2"><br>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <!-- Pre-fill the date field with the current date and time using JavaScript -->
                                                    <input type="datetime-local" class="form-control text-center"
                                                        id="validationCustomDate" placeholder="التاريخ" required
                                                        disabled>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control text-center"
                                                        id="validationCustomUsername"
                                                        value="المستخدم : {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} "
                                                        placeholder="اسم المستخدم" required disabled>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            نقدي 
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            شركة
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <select name="car_brand" id="brand"
                                                    class="form-select text-center"
                                                    aria-describedby="validationServer04Feedback" required>
                                                    <option value="" disabled selected>ماركة السيارة</option> <!-- Placeholder option -->
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
                                                <select name="car_model" id="model"
                                                    class="form-select text-center"
                                                    aria-describedby="validationServer04Feedback" required>
                                                    <option value="" disabled selected>موديل السيارة</option> <!-- Placeholder option -->
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
                                                    <option value="" disabled selected>نوع الخدمة</option> <!-- Placeholder option -->
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
                                            <div class="mb-2">
                                                <input name="structure_no" type="text"
                                                    class="form-control text-center" id="chassisNumber"
                                                    name="chassisNumber" required placeholder="رقم الهيكل">
                                                @error('structure_no')
                                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <input name="car_counter" type="number" name="number"
                                                    class="form-control text-center" id="odometerReading" required
                                                    placeholder="رقم العداد">
                                                @error('car_counter')
                                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <input name="car_name" type="text"
                                                    class="form-control text-center" id="carName" required
                                                    placeholder="اسم السيارة">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                @error('car_name')
                                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <input name="u_name" type="text" name="name"
                                                    class="form-control text-center" id="customerName" required
                                                    placeholder="الاسم">
                                                @error('u_name')
                                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <input name="u_phone" type="number" name="number"
                                                    class="form-control text-center" id="customerPhone" required
                                                    placeholder="رقم الهاتف">
                                                @error('u_phone')
                                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <input name="car_plate" type="text" name="plateNumber"
                                                    class="form-control text-center" id="plateNumber" required
                                                    placeholder="رقم اللوحة">
                                            </div>
                                            @error('car_plate')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="border rounded p-1 mb-1">
                                                <div class="d-flex justify-content-end mb-1">
                                                    <label for="fuelLevel" class="form-label">مستوي البنزين</label>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="fuelLevel" required
                                                        min="0" max="100">
                                                </div>
                                            </div>
                                            <div class="mb-1" style="position: relative;">
                                                <textarea name="comment" class="form-control text-center" placeholder="تعليق" id="comment"
                                                    style="height: 100px; direction: rtl; text-align: right;"></textarea>
                                                <div id="lineNumbers"
                                                    style="position: absolute; top: 0; right: 0; bottom: 0; padding: 6px 10px; direction: ltr; text-align: left;">
                                                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Your JavaScript code here
            var element = document.getElementById('yourElementId');
            // Check if the element exists before accessing its properties or calling methods
            if (element) {
                // Access element properties or call methods here
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
            var nameValue = document.getElementById('validationCustomUsername').value;

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
        // Select the range input
        var fuelLevelInput = document.getElementById('fuelLevel');

        // Add event listener for input change
        fuelLevelInput.addEventListener('input', function() {
            var fuelLevel = fuelLevelInput.value;

            // Set the gradient background based on the value
            fuelLevelInput.style.background =
                'linear-gradient(to right, red 0%, yellow 25%, blue 50%, green 75%, green ' + fuelLevel + '%)';
        });

        function copyPlateNumber() {
            var plateNumber = document.getElementById("plateNumber");
            plateNumber.select();
            document.execCommand("copy");
            alert("Plate number copied to clipboard: " + plateNumber.value);
        }

        // Define chart options
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        function addNewOption() {
            // Get the values entered by the user
            var newBrand = document.getElementById('newBrandInput').value;
            var newService = document.getElementById('newServiceInput').value;
            var newModel = document.getElementById('newModelInput').value;

            // Check if the new options already exist in the select dropdowns
            if (!isOptionExists(newBrand, 'brand')) {
                addOptionToSelect(newBrand, 'brand');
            }

            if (!isOptionExists(newService, 'serviceType')) {
                addOptionToSelect(newService, 'serviceType');
            }

            if (!isOptionExists(newModel, 'model')) {
                addOptionToSelect(newModel, 'model');
            }

            // Clear the input fields
            document.getElementById('newBrandInput').value = '';
            document.getElementById('newServiceInput').value = '';
            document.getElementById('newModelInput').value = '';
        }

        // Function to check if the option already exists in the select dropdown
        function isOptionExists(optionText, selectId) {
            var select = document.getElementById(selectId);
            for (var i = 0; i < select.options.length; i++) {
                if (select.options[i].text === optionText) {
                    return true;
                }
            }
            return false;
        }

        // Function to add a new option to the select dropdown
        function addOptionToSelect(optionText, selectId) {
            var select = document.getElementById(selectId);
            var newOption = document.createElement('option');
            newOption.text = optionText;
            select.add(newOption);
        }
        // server.js
        const express = require('express');
        const mongoose = require('mongoose');
        const bodyParser = require('body-parser');
        const app = express();

        // Body parser middleware
        app.use(bodyParser.urlencoded({
            extended: false
        }));
        app.use(bodyParser.json());

        // MongoDB connection
        mongoose.connect('mongodb://localhost:27017/carFormDB', {
                useNewUrlParser: true,
                useUnifiedTopology: true
            })
            .then(() => console.log('MongoDB Connected'))
            .catch(err => console.log(err));

        // Define a schema for your form data
        const carFormSchema = new mongoose.Schema({
            // Define your schema fields here
            brand: String,
            model: String,
            serviceType: String,
            // Add other fields as needed
        });

        const CarForm = mongoose.model('CarForm', carFormSchema);

        // Route to handle form submission
        app.post('/submit-form', (req, res) => {
            const formData = req.body;

            // Create a new instance of the CarForm model with the submitted data
            const newFormEntry = new CarForm({
                brand: formData.brand,
                model: formData.model,
                serviceType: formData.serviceType,
                // Map other fields here
            });

            // Save the new form entry to the database
            newFormEntry.save()
                .then(() => res.send('Form data saved successfully'))
                .catch(err => res.status(400).send('Unable to save form data: ' + err));
        });

        const PORT = process.env.PORT || 5000;
        app.listen(PORT, () => console.log(`Server running on port ${PORT}`));


        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

    <canvas id="myChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>
