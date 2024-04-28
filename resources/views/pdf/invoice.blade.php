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
                    font-weight: 400;
                    display: block
                }

                .invoice-price .invoice-price-row {
                    display: table;
                    float: left
                }

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
                }

                .invoice-footer {
                    border-top: 1px solid #ddd;
                    padding-top: 10px;
                    font-size: 10px
                }

                .invoice-note {
                    color: #999;
                    margin-top: 80px;
                    font-size: 85%
                }

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
                        <span class="pull-right hidden-print">
                            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                        </span>
                        <img style="height: 100px" src="./assets/img/logo-inch.jpg" alt="Company Logo">
                    </div>
                    <div class="invoice-header">
                        <div class="invoice-date text-right">
                            <strong>نوع الفاتورة : فاتورة مبيعات</strong>
                            <div class="date text-inverse m-t-5">Aprel 24, 2024</div>
                            <div class="invoice-detail">
                                رقم الفاتورة : 1325346887<br>
                                Services Product
                            </div>
                            <strong>رقم اللوحة : </strong>
                        </div>
                        <div class="invoice-to text-right">
                            <strong>الي</strong>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">لومي</strong><br>
                                Street Address<br>
                                City, Zip Code<br>
                                تلفون: (123) 456-7890<br>
                                Fax: (123) 456-7890
                            </address>
                            <strong>طريقة الدفع : نقدي</strong>
                        </div>
                        <div class="invoice-from text-right">
                            <strong>من</strong>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">ثمال لصيانة السيارات</strong><br>
                                ينبع حي الياقوت<br>
                                طريق الملك عبدالعزيز<br>
                                تلفون : 966-143222055<br>
                                الرقم الضريبي : 311150116600003<br>
                                السجل التجاري : 4700115456
                            </address>
                        </div>
                    </div>
                    <div class="invoice-content">
                        <div class="table-responsive">
                            <table class="table table-invoice table-reverse">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="20%">الاجمالي مع الضريبة</th>
                                        <th class="text-center" width="20%">15%الضريبة</th>
                                        <th class="text-center" width="20%">السعر</th>
                                        <th class="text-center" width="20%">الوحدة</th>
                                        <th class="text-center" width="20%">الكمية</th>
                                        <th class="text-center" width="20%">اسم الصنف</th>                        
                                        <th class="text-right">رمز الصنف</th>
                                        <th class="text-center" width="40%">رقم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">50</td>
                                        <td class="text-center">$50.00</td>
                                        <td>
                                            <span class="text-inverse">تصميم وتطوير موقع الكتروني</span><br>
                                            <small>نص توضيحي للمهمة</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">50</td>
                                        <td class="text-center">$50.00</td>
                                        <td>
                                            <span class="text-inverse">تصميم وتطوير موقع الكتروني</span><br>
                                            <small>نص توضيحي للمهمة</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">$2,500.00</td>
                                        <td class="text-center">50</td>
                                        <td class="text-center">$50.00</td>
                                        <td>
                                            <span class="text-inverse">تصميم وتطوير موقع الكتروني</span><br>
                                            <small>نص توضيحي للمهمة</small>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
                        <div class="invoice-price">
                            <div class="invoice-price-right">
                                <small>الإجمالي</small> <span class="f-w-600">$4508.00</span>
                            </div>
                            <div class="invoice-price-left">
                                <div class="invoice-price-row">
                                    <div class="sub-price">
                                        <small>رسوم باي بال (5.4%)</small>
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
                            </div>
                        </div>
                    </div>
                    <div class="invoice-note">
                        * Make all cheques payable to [Your Company Name]<br>
                        * Payment is due within 30 days<br>
                        * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
                    </div>
                    <div class="invoice-footer">
                        <p class="text-center m-b-5 f-w-600">
                            THANK YOU FOR YOUR BUSINESS
                        </p>
                        <p class="text-center">
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d9abadb0bcb4a9aa99beb4b8b0b5f7bab6b4">[email&#160;protected]</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript"></script>
    </body>
</html>