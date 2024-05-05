<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>bs4 invoice - Bootdey.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
                body{
                    margin-top:20px;
                    background:#eee;
                }

                .invoice {
                    background: #fff;
                    padding: 20px
                }

                .invoice-company {
                    font-size: 20px
                }

                .invoice-header {
                    margin: 0 -20px;
                    background: #f0f3f4;
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
                        <div class="row">
                            <div class="col-4 text-center">
                                <div class="invoice-detail">
                                    <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 1px;">1325346887</td>
                                                    <td style="padding: 1px;">رقم الفاتورة</td>
                                                </tr>
                                            </tbody>
                                    </table> 
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <strong>نوع الفاتورة : فاتورة مبيعات</strong><br>
                            </div>
                            <div class="col-4 text-right">
                                <img style="height: 100px" src="./assets/img/logo-inch.jpg" alt="Company Logo">
                            </div>
                        </div>
                    </div>
                    <div class="invoice-header">
                        <div class="row">
                            <div class="col-4">
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
                            </div>
                            <div class="col-4">
                                <div class="invoice-from text-right">
                                    <address class="m-t-5 m-b-5">
                                        <p>
                                            <strong class="text-inverse">ثمال لصيانة السيارات</strong><br>
                                            ينبع - حي الياقوت -
                                            طريق الملك عبدالعزيز
                                        </p>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" style="padding: 3px;">[ 966-143222055 ]</td>
                                                    <td style="padding: 2px;">-: هاتف</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="padding: 3px;">[ 311150116600003 ]</td>
                                                    <td style="padding: 2px;">-: الرقم الضريبي</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" style="padding: 3px;">[ 4700115456 ]</td>
                                                    <td style="padding: 2px;">-: السجل التجاري</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-content">
                        <div class="table-responsive">
                            <table class="table table-invoice table-reverse">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="19%">الاجمالي مع الضريبة</th>
                                        <th class="text-center" width="5%">15%الضريبة</th>
                                        <th class="text-center" width="21%">السعر</th>
                                        <th class="text-center" width="2%">الوحدة</th>
                                        <th class="text-center" width="2%">الكمية</th>
                                        <th class="text-center" width="40%">اسم الصنف</th>                        
                                        <th class="text-right"  width="10%">رمز الصنف</th>
                                        <th class="text-center" width="1%">رقم</th>
                                    </tr><!-- border-right inside class th  -->
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">50</td>
                                        <td class="text-right">
                                            <span class="text-inverse">تغير زيت الماكينة</span><br>
                                            <small>نص توضيحي للمهمة</small>
                                        </td>
                                        <td class="text-center">mkl12500</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">50</td>
                                        <td class="text-right">
                                            <span class="text-inverse">تغير زيت الجيروبوكس</span><br>
                                            <small>نص توضيحي للمهمة</small>
                                        </td>
                                        <td class="text-center">m.215</td>
                                        <td>2</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center">اجمالي<br> $5000</td>
                                        <td class="text-center">اجمالي<br>$5000</td>
                                        <td class="text-center">اجمالي<br>$5000</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="invoice-price">
                            <div class="table-responsive">
                                <table class="table table-invoice table-reverse">
                                    <thead>
                                        <tr>
                                            <th class="text-center">0.00=مبلغ الخصم</th>
                                            <th class="text-center" width="50%">=المبلغ المقدم</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">999=صافي المبلغ</th>
                                            <th class="text-center">777=الاجمالي بعد الضريبة</th>
                                        </tr>
                                        <tr>
                                            <th class="text-right">-:المبلغ بالاحرف </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <!-- <div class="invoice-price-left">
                        <div class="invoice-price-row">
                            <div class="sub-price">
                                <small>اجمالي السعر</small>
                                <span class="text-inverse">$108.00</span>
                            </div>
                            <div class="sub-price">
                                <i class="fa fa-plus text-muted"></i>
                            </div>
                            <div class="sub-price">
                                <small>المجموع الفرعي</small>
                                <span class="text-inverse">$4,500.00</span>
                            </div>
                        </div>
                        <div class="invoice-note">
                        <div class="col-12 text-right">
                            <strong class="">ملاحضة</strong>
                        </div> -->
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>مصدر الفاتورة</td>
                                        <td>John Doe</td>
                                        <td>اسم البائع</td>
                                    </tr>
                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <!-- <div class="col-6 text-right">
                                <strong> John Doe : مصدر الفاتورة</strong>
                            </div>
                            <div class="col-6  text-right">
                                <strong> John Doe : اسم البائع</strong>
                            </div> -->
                    <div class="invoice-footer">
                        <p class="text-center m-b-5 f-w-600">
                            THANK YOU FOR YOUR BUSINESS -- Aprel 30, 2024
                        </p>
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