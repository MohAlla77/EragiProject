<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" rel="stylesheet">
    <style>
        body {
            direction: rtl;
            text-align: right;
        }
        .text-inverse {
            color: #333;
        }
        .table-invoice thead th {
            border-bottom: 1px solid #ddd;
        }
        .table-reverse {
            direction: ltr;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        {{-- <div class="invoice">
            <div class="invoice-company text-inverse f-w-600">
                <div class="col-12 text-center">
                    <img style="height: 100px" src="./assets/img/logo-inch.jpg" alt="Company Logo">
                </div>
            </div>
        </div> --}}
        <div class="row">
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
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->name}} </td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">اسم العميل</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->phone}}</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم التواصل</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->car_type}}</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">نوع العميل</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->created_at}}</td>
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
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->car_name}}</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">اسم السيارة</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->plate}}</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم اللوحة</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->plate}}</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم الهيكل</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->model}}</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">موديل السيارة</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">{{$car->counter}} KM</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">رقم العداد</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td class="text-end" width="50%" style="padding: 2px;">اسود</td>
                                                        <td class="text-end" width="50%" style="padding: 2px;">لون السيارة</td>
                                                    </tr> --}}
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- <div class="col-4">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </address>
                </div>
            </div>
        </div>
        {{-- <div class="row g-1"> --}}
            <div class="col-12">
                <div class="card" style="height: 200px;">
                    <img style="height: 100%; width: 100%;" src="" alt="صور السياراة">
                </div>
            </div>
            <div class="col-12">
                <div class="card" style="height: 200px;">
                    <textarea class="form-control text-center" name="notes" id="notes" style="height: 100%;"
                        placeholder="ملاحظات">{{$car->comment}}</textarea>
                </div>
            </div>
        {{-- </div> --}}
        <div class="table-responsive">
            <table class="table table-invoice table-reverse">
                <thead>
                    <tr>
                        <th class="text-center" width="10%"> الفني</th>
                        <th class="text-center" width="14.29%">الانتهاء</th>
                        <th class="text-center" width="14.29%">بدء العمل</th>
                        {{-- <th class="text-center" width="14.29%">التكلفة</th> --}}
                        <th class="text-center" width="24.29%">قطع الغيار</th>
                        <th class="text-center" width="24.29%">الصيانة</th>
                        <th class="text-center" width="1%">رقم</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        {{-- <ol class="text-end">
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
        <div class="invoice-footer">
            <div class="row">
                <div class="col-6">
                    <strong><p class="text-left m-b-5 f-w-600">
                        THANK YOU FOR YOUR BUSINESS
                    </p></strong>
                </div>
                <div class="col-6 text-end">
                    <strong><p>توقيع العميل بالموافقة</p></strong>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlRaPyy+NIOOGWX9P+obN+1Hb+4J6g6c6pC8iwlwzyPpLeStF6x1az0Rblg" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWi42a2MaIWyxkQISrQp60JE4h2VA8W8BEMMZz9zZfk1ouKMoZER6pN0Xt" crossorigin="anonymous"></script>
</body>
</html>