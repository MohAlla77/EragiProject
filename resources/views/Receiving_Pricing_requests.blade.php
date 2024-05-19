<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>الرئسية</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
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
            #myAlert {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
    </style>
</head>
<body class="sb-nav-fixed">
        @include('Layout.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('Layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div>
                    <button type="button" class="btn btn-primary col-3 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                        طلبات التسعير <i class="fa fa-bell" aria-hidden="true"></i>
                    </button>
                    @include('model.order_quotation_popup')
                </div>
                <div id="myAlert" class="alert alert-info collapse text-center">
                    <a id="linkClose" href="#" class="Close"></a>
                    <strong>لديك طلب تسعير جديد الرجاء التسعير </strong>
                </div>
                <div class="card p-4">
                    <p class="lead">Thank you for your order!</p>
                    <p>Your pricing request is being processed. Please wait while we prepare the pricing information for your products.</p>
                    <div class="text-center">
                      <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row g-1">
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom02" value=""
                                    placeholder="رقم الفاتورة" required>
                            </div>
                            {{-- <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom02" value=""
                                    placeholder="طرقة الدفع" required>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom02" value=""
                                    placeholder="اسم مستخدم المشتريات" required>
                            </div> --}}
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom01" value=""
                                    placeholder="الرقم التسلسلي" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom02" value=""
                                    placeholder="اسم الصنف" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center"
                                    id="validationCustom02" value=""
                                    placeholder="الكمية" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="name"
                                    class="form-control text-center" id="quantity"
                                    required placeholder="نوع الوحدة">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="name"
                                    class="form-control text-center" id="price"
                                    required placeholder="سعر التكلفة">
                            </div>
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">
                                الغاء <i class="fa-solid fa-xmark"></i>
                                </button>
                                <button type="submit" class="btn btn-success col-3">
                                    حفظ <i class="fa fa-bookmark" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @extends('Layout.footer')
        </div>
    </div>    
    <script type="text/javascript">
        $(document).ready(function(){
            // Check if the alert should be shown (e.g., passed a parameter from the previous page)
            var showAlert = true; // Change this based on your logic

            if (showAlert) {
                $('#myAlert').show('fade');

                setTimeout(function (){
                    $('#myAlert').hide('fade');
                }, 4000);
            }

            $('#linkClose').click(function(){
                $('#myAlert').hide('fade');
            });
        });
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