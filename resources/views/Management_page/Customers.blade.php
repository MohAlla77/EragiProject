<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Customers</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
        <style>
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
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
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
                <a class="navbar-brand" href="#"><span>العملاء</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </form>
            <button class="btn btn-link btn order-2 order-lg-0 me-6 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
                    <div class="card mb-4">
                        <div class="card-header text-end">
                            جدول العمللاء
                            <i class="fas fa-table me-1"></i>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>رقم اللوحة</th>
                                        <th>اسم السيارة</th>
                                        <th>رقم الهاتف</th>
                                        <th>اسم العميل</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>رقم اللوحة</th>
                                        <th>اسم السيارة</th>
                                        <th>رقم الهاتف</th>
                                        <th>اسم العميل</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <th>
                                            <button class="btn btn-primary btn-sm" onclick="window.print()"><i class="fas fa-print"></i></button>
                                            <button class="btn btn-info btn-sm" onclick="displayData()"><i class="fas fa-eye"></i></button>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>
<script>
  // Function to update the customer table with new data
  function updateCustomerTable(name, phone, carName, plateNumber, placeOfWork) {
    // Get the table body
    var tableBody = document.querySelector('#datatablesSimple tbody');

    // Create a new table row
    var newRow = tableBody.insertRow();

    // Insert cells with data
    newRow.insertCell(0).textContent = placeOfWork;
    newRow.insertCell(1).textContent = plateNumber;
    newRow.insertCell(2).textContent = carName;
    newRow.insertCell(3).textContent = phone;
    newRow.insertCell(4).textContent = name;
  }

  // Assuming you have a function to submit the form and capture data
  function submitForm() {
    // Get form data (replace these with your actual form data retrieval)
    var name = "John Doe";
    var phone = "+123456789";
    var carName = "Sample Car";
    var plateNumber = "ABC123";
    var placeOfWork = "Sample Workplace";

    // Update the customer table with new data
    updateCustomerTable(name, phone, carName, plateNumber, placeOfWork);
  }
</script>

        <script src="js/scripts.js"></script>
    </body>
</html>

