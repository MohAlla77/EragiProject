{{--    <style>
            .logo-img {
                width: 60px; /* Adjust the width as needed */
                height: auto; /* Maintain aspect ratio */
                margin-right: 20px; /* Adjust the margin as needed */
            }
            body {
                background-image: url('img/logo-inch.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .card {
                background-color: rgba(255, 255, 255, 0.7); /* Adjust the last value (0.7) to change the transparency */
                /* Other existing styles for the card */
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

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider"/></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./assets/img/logo-inch.jpg" class="img-fluid logo-img" alt="Logo"></a>
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
                <main> --}}
                    @extends('Master')
                    @section('title','Data Entry')
                    @section('content')
                        <div class="row g-1 mt-4">
                            <div class="col-6">
                                <div class="card bg-light border-dark">
                                    <div class="card-body">
                                        <form action="#" method="POST">
                                            <div class="mb-1">
                                                <input class="form-control text-center"placeholder="الاضافات" readonly>
                                            </div>
                                            <div class="row g-1">
                                                <!-- For adding a new brand -->
                                                <div class="col-md-6">
                                                    <input type="text" id="newBrandInput" class="form-control mb-1 text-center" placeholder="اضافة ماركة جديدة">
                                                </div>
                                                <!-- For adding a new Model -->
                                                <div class="col-md-6">
                                                    <input type="text" id="newModelInput" class="form-control mb-1 text-center" placeholder="اضافة موديل جديدة">
                                                </div>
                                                <!-- For adding a new service -->
                                                <div class="col-md-6">
                                                    <input type="text" id="newServiceInput" class="form-control mb-1 text-center" placeholder="اضافة خدمة جديدة">
                                                </div>
                                                <!-- For adding a new Technical -->
                                                <div class="col-md-6">
                                                    <input type="text" id="#" class="form-control mb-1 text-center" placeholder="اضافة فني جديد">
                                                </div>
                                                <!-- For adding a new WaitReason -->
                                                <div class="col-md-12">
                                                    <input type="text" id="#" class="form-control mb-1 text-center" placeholder="اضافة سبب انتظار">
                                                </div>
                                            </div>
                                            <div class="footer col-md-12 mb-2 text-center">
                                                <button class="btn btn-success col-6" onclick="addNewOption()">اضافة</button>
                                            </div>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light text-white border-dark">
                                    <div class="card-body">
                                        <form action="{{route('Data_Entry')}}" method="post">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <input class="form-control text-center"placeholder="تعريف الشركات" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="PersonName" type="text" class="form-control text-center" name="name" placeholder="اسم شخص">
                                                </div>                                            
                                                <div class="col-6">
                                                    <input name="CompanyName" class="form-control text-center" name="name" placeholder="اسم الشركة">
                                                </div>
                                                <div class="col-6">
                                                    <input name="TaxNumber" class="form-control text-center" name="name" placeholder="الرقم الضريبي">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">+966</span>
                                                        <input  name="CompanyPhone" class="form-control text-center input-group" name="name" placeholder=" رقم الهاتف">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input name="#" class="form-control text-center" name="name" placeholder="السجل التجاري">
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="CompanyPayType" id="brand" class="form-select text-center" aria-describedby="validationServer04Feedback" required>
                                                        <option selected >طريقة الدفع</option>
                                                        <option selected>اجل</option>
                                                        <option selected>مقدم</option>
                                                        <option selected>كاش</option>
                                                    </select>
                                                </div>
                                                <div class="footer text-center col-12 mb-2">
                                                    {{-- button view Company --}}
                                                    <button type="submit" id="view" class="btn btn-info col-4"> عرض <i class="fa-solid fa-users-viewfinder"></i></button>
                                                    <button type="submit" id="add_client" class="btn btn-success col-4"> اضافة <i class="fa-solid fa-address-card"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="secondFormRow" style="display: none;">
                            <div class="col-6">
                                <div class="card bg-light text-white border-dark">
                                    <div class="card-body">
                                        <form action="{{route('Data_Entry')}}" method="post">
                                            @csrf
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <form action="{{ route('car.search') }}" method="GET">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control text-center" name="plateNumber"
                                                                placeholder="ابحث عن الشركة">
                                                            <button class="btn btn-outline-success" type="search">بحث</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-6">
                                                    <input name="CompanyName" class="form-control text-center" name="name" placeholder="اسم الشركة" readonly>
                                                </div>
                                                <div class="col-6">
                                                    <input name="TaxNumber" class="form-control text-center" name="name" placeholder="الرقم الضريبي" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <input name="PersonName" type="text" class="form-control text-center" name="name" placeholder="اسم شخص" readonly>
                                                </div>
                                                <div class="col-md-6 input-group">
                                                    <span class="input-group-text">+966</span>
                                                    <input  name="CompanyPhone" class="form-control text-center input-group" name="name" placeholder=" رقم الهاتف" readonly>
                                                </div>
                                                <div class="col-6">
                                                    <input name="#" class="form-control text-center" name="name" placeholder="السجل التجاري" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="#" class="form-control text-center" name="name" placeholder="طريقة الدفع" readonly>
                                                </div>
                                                <div class="footer text-center col-12 mb-2">
                                                    <button type="submit" id="edit" class="btn btn-secondary col-4"> تعديل <i class="fa-solid fa-user-pen"></i></button>
                                                    <button type="submit" id="save" class="btn btn-success col-4"> حفظ <i class="fa-regular fa-floppy-disk"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @stop
                    <script>
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
                                app.use(bodyParser.urlencoded({ extended: false }));
                                app.use(bodyParser.json());

                                // MongoDB connection
                                mongoose.connect('mongodb://localhost:27017/carFormDB', { useNewUrlParser: true, useUnifiedTopology: true })
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
                                //veiw
                                document.getElementById('view').addEventListener('click', function() {
                                var secondFormRow = document.getElementById('secondFormRow');
                                if (secondFormRow.style.display === 'none' || secondFormRow.style.display === '') {
                                    secondFormRow.style.display = 'block';
                                } else {
                                    secondFormRow.style.display = 'none';
                                }
                            });
                    </script>