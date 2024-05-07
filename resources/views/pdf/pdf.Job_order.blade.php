<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Jop-Order</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- <style type="text/css">
            body{
                margin-top:20px;
                background:#eee;
            }

            .invoice {
                /* background: #fff; */
                padding: 20px
            }

            .invoice-company {
                font-size: 20px
            }

            .invoice-header {
                margin: 0 -20px;
                /* background: #f0f3f4; */
                padding: 20px
            }

            .invoice-date,
            .invoice-from,
            .invoice-to {
                display: table-cell;
                width: 1%
            }

            .invoice-from,
            .invoice-to {
                padding-right: 20px
            }

            .invoice-date .date,
            .invoice-from strong,
            .invoice-to strong {
                font-size: 16px;
                font-weight: 600
            }

            .invoice-date {
                text-align: right;
                padding-left: 20px
            }

            .invoice-price {
                background: #f0f3f4;
                display: table;
                width: 100%
            }

            .invoice-price .invoice-price-left,
            .invoice-price .invoice-price-right {
                display: table-cell;
                padding: 20px;
                font-size: 20px;
                font-weight: 600;
                width: 75%;
                position: relative;
                vertical-align: middle
            }

            .invoice-price .invoice-price-left .sub-price {
                display: table-cell;
                vertical-align: middle;
                padding: 0 20px
            }

            .invoice-price small {
                font-size: 12px;
                font-weight: 800;
                display: block
            }

            .invoice-price .invoice-price-row {
                display: table;
                float: left
            }
            /* 
            .invoice-price .invoice-price-right {
                width: 25%;
                background: #2d353c;
                color: #fff;
                font-size: 28px;
                text-align: right;
                vertical-align: bottom;
                font-weight: 300
            }

            .invoice-price .invoice-price-right small {
                display: block;
                opacity: .6;
                position: absolute;
                top: 10px;
                left: 10px;
                font-size: 12px
            } */

            .invoice-footer {
                border-top: 1px solid #ddd;
                padding-top: 10px;
                font-size: 10px
            }

            /* .invoice-note {
                color: #999;
                margin-top: 80px;
                font-size: 85%
            } */

            .invoice>div:not(.invoice-footer) {
                margin-bottom: 20px
            }

            .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
                color: #2d353c;
                background: #fff;
                border-color: #d9dfe3;
            }
        </style> -->
        <style>
            body {
              /* Set the background image */
              background-image: url('public/logo.jpg'); /* Replace 'background.jpg' with the path to your background image */
              /* Adjust background properties */
              background-size: cover;
              background-repeat: no-repeat;
            }
            /* Additional styles for the PDF paper content */
            .pdf-content {
              /* Add styling for the PDF paper content here */
            }
          </style>
    </head>
    <body>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="col-md-12">
                <div class="invoice">
                    <div class="invoice-company text-inverse f-w-600">
                        <!-- <span class="pull-right hidden-print">
                            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                        </span> -->
                            <div class="col-12 text-center">
                                <img style="height: 100px" src="./assets/img/logo-inch.jpg" alt="Company Logo">
                            </div>
                        </div>
                    </div>
                    <div class="invoice-header">
                        <div class="row">
                            <!-- <div class="col-4">
                                <div class="invoice-to text-center">
                                    <div class="card">
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 2px;">لومي</td>
                                                    <td style="padding: 2px;"><strong>اسم العميل</strong></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 2px;">ينبع</td>
                                                    <td style="padding: 2px;"><strong>عنوان العميل</strong></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 2px;">5588 ror</td>
                                                    <td style="padding: 2px;"><strong>رقم اللوحة</strong></td>
                                                </tr>
                                                    <td style="padding: 2px;">نقدي</td>
                                                    <td style="padding: 2px;"><strong>طريقة الدفع</strong></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 2px;">(123) 456-7890</td>
                                                    <td style="padding: 2px;"><strong>هاتف</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div id="qr-code-show"></div>
                            </div> -->
                            <div class="col-12">
                                <div class="invoice-from text-right">
                                    <address class="m-t-5 m-b-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="table-responsive">
                                                            <table class="table table-invoice table-reverse">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">2:5:2024 - 2:34 PM</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">التاريخ</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">احمد محمد</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">اسم العميل</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">+966 58 741 2369</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم التواصل</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">نقدي</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">نوع العميل</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">5.00 PM</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">وقت الاستلام</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">سيد</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">الفني المتخصص</td>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="table-responsive">
                                                            <table class="table table-invoice table-reverse">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">lanser</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">اسم السيارة</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">4895 rie</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم اللوحة</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">WDDS4GB9GN3595572</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم الهيكل</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">2018</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">موديل السيارة</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">159863 KM</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم العداد</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">اسود</td>
                                                                        <td class="text-end" width="50%" style="padding: 2px;">لون السيارة</td>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <p>
                                                                    <strong class="text-inverse mb-0">ثمال لصيانة السيارات</strong><br>
                                                                    ينبع - حي الياقوت <br>
                                                                    طريق الملك عبدالعزيز<br>
                                                                    هاتف :- <strong>[ 966-143222055 ]</strong><br>
                                                                    الرقم الضريبي :- <strong>[ 311150116600003 ]</strong><br>
                                                                    السجل التجاري :- <strong>[ 4700115456 ]</strong><br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </address>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="invoice-content">
                        <div class="row g-1">
                            <div class="col-4">
                                <div class="card" style="height: 200px;">
                                    <img style="height: 100%; width: 100%;" src="./assets/img/فحص سيارة.png" alt="فحص سيارة">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card" style="height: 200px;">
                                    <textarea class="form-control text-center" name="notes" id="notes" style="height: 100%;"
                                        placeholder="ملاحظات"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-invoice table-reverse">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10%">توقيع الفني</th>
                                        <th class="text-center" width="4.29%">الانتهاء</th>
                                        <th class="text-center" width="14.29%">بدء العمل</th>
                                        <th class="text-center" width="14.29%">التكلفة</th>
                                        <th class="text-center" width="24.29%">قطع الغيار</th>
                                        <th class="text-center" width="24.29%">الصيانة</th>
                                        <th class="text-center" width="1%">رقم</th>
                                    </tr><!-- border-right inside class th  -->
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <ol class="text-right">
                            <strong>-:بنود الاتفاق</strong>
                            <li>.اوافق علي الاصلاحات المذكورة والاتزام بسداد تكاليف الصيانة وفواتير القطع</li>
                            <li>.اوافق علي التجربة الميدانية للسيارة ولامانع لدي في ذالك</li>
                            <li>.المركز غير مسؤول عن الصيانة خارج المركز في حال الفحص لدينا</li>
                            <li>.في حال عدم العميل عن الاصلاح فالمركز غير ملتزم بتطبيق ماتم فكة من اجزاء ويلتزم العميل بدفع نصف قيمة التكاليف المتفق عليها</li>
                            <li>.المركز غير مسؤول عن السيارة في حالة تاخر صاحبها عن موعد الاستلام</li>
                            <li>.المركز غير مسؤول عن تلف القطع المتهالكة والبالية في حال كسرها اثناء الفك نتيجةالجفاف او الصدا</li>
                            <li>.المركز غير مسؤول عن اي مفقودات ثمينة داخل السيارة وعلي العميل استلام جميع المتنيات الخاصة قبل تسليم السيارة للمركز</li>
                            <li>.الفحص الشامل هو فحص مبدئي للسيارة وهناك بعض الاعطال لاتظهر الا بعد استخدام السيارة والسير بها لمسافات طويلة مثل (نقص الزيت- الحرارة)</li>
                            <li>.عند تغير زيت ناقل الحركة (الجيربكس) فالمركز غير مسؤول عن اي اعطال ناتجة عن التاخر في موعد تغير الزيت ويتحمل العميل المسئولية كاملة دون ادني</li>
                        </ol>
                    </div>
                    <!-- <table class="table table-sm">
                        <tbody>
                            <tr class="text-right">
                                <td>John Doe</td>
                                <td>توقيع العميل بالموافقة</td> -->
                                <!-- <td>John Doe</td>
                                <td>اسم البائع</td>
                            </tr>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                        </tbody>
                    </table>
                    <!-- <div class="col-6 text-right">
                        <strong> John Doe : مصدر الفاتورة</strong>
                    </div>
                    <div class="col-6  text-right">
                        <strong> John Doe : اسم البائع</strong>
                    </div> -->
                    <div class="invoice-footer">
                        <div class="row">
                            <div class="col-6">
                                <strong><p class="text-left m-b-5 f-w-600">
                                    THANK YOU FOR YOUR BUSINESS
                                    <!-- -- Aprel 30, 2024 -->
                                </p></strong>
                            </div>
                            <div class="col-6">
                                <strong><p class="text-right">توقيع العميل بالموافقة</p></strong>
                            </div>
                        </div>
                        <!-- <p class="text-center">
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d9abadb0bcb4a9aa99beb4b8b0b5f7bab6b4">[email&#160;protected]</a></span>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Function to generate the QR code
            function generateQRCode(text, showId) {
                // Construct the URL for the Google Charts API
                var chartUrl = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' + encodeURIComponent(text);

                // Create an image element for the QR code
                var qrCodeImg = document.createElement('img');
                qrCodeImg.src = chartUrl;

                // Get the container element
                var show = document.getElementById(showId);

                // Append the QR code image to the container
                show.appendChild(qrCodeImg);
            }

            // Call the function to generate the QR code
            var qrText = 'Hello, world!'; // Change this to the text you want to encode
            generateQRCode(qrText, 'qr-code-show');

            
        </script>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript"></script>
    </body>
</html>