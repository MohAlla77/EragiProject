<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ادوات السيارات</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
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
    </head>
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
                <a class="navbar-brand" href="#"><img src="./assets/img/logoeragi.jpg" class="img-fluid logo-img" alt="Logo"></a>
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
                    <div class="row">
                        <div class="col-6 mt-4">
                            <form action="مركبه_جديدة .php" method="POST">
                                <div class="card">
                                    <div class="mb-2">
                                        <input type="text" class="form-control text-center"placeholder="الاضافات" disabled>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <!-- For adding a new brand -->
                                    <input type="text" id="newBrandInput" class="form-control mb-2 text-center" placeholder="اضافة ماركة جديدة">
                                    <!-- For adding a new Model -->
                                    <input type="text" id="newModelInput" class="form-control mb-2 text-center" placeholder="اضافة موديل جديدة">
                                    <!-- For adding a new service -->
                                    <input type="text" id="newServiceInput" class="form-control mb-2 text-center" placeholder="اضافة خدمة جديدة">
                                    <div class="footer col-md-12 mb-2 text-center">
                                        <button class="btn btn-success col-6" onclick="addNewOption()">اضافة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6 mt-4">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <input type="text" class="form-control text-center"placeholder="تعريف الشركات" disabled>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control text-center" name="name" placeholder="اسم الشركة">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control text-center" name="name" placeholder="الرقم الضريبي">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control text-center" name="name" placeholder="اسم شخص">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control text-center" name="name" placeholder=" رقم الهاتف">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control text-center" name="name" placeholder="بطاقة الاتمان">
                                        </div>
                                        <div class="col-md-6">
                                            <select id="brand" class="form-select text-center" aria-describedby="validationServer04Feedback" required>
                                                <option selected>نوع العميل</option>
                                                <option selected>اجل</option>
                                                <option selected>مقدم</option>
                                            </select>
                                        </div>
                                        <div class="footer text-center col-12 mb-2">
                                            <button type="submit" id="add_client" class="btn btn-success col-6"> اضافة</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card col-6 bg-light">
                            <div class="card-body">
                                <ul class="tree">
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db1"><i class="fas fa-plus"></i> Database 1</a>
                                        <ul id="db1" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 2</a></li>
                                            <li class="text-center"><a href="#">Table 1</a></li>
                                            <li class="text-center"><a href="#">Table 3</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db2"><i class="fas fa-plus"></i> Database 2</a>
                                        <ul id="db2" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 4</a></li>
                                            <li class="text-center"><a href="#">Table 5</a></li>
                                            <li class="text-center"><a href="#">Table 6</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#db3"><i class="fas fa-plus"></i> Database 3</a>
                                        <ul id="db3" class="collapse mb-0">
                                            <li class="text-center"><a href="#">Table 7</a></li>
                                            <li class="text-center"><a href="#">Table 8</a></li>
                                            <li class="text-center"><a href="#">Table 9</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
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
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
