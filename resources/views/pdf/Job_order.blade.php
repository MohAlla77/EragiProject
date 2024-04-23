<!DOCTYPE html>
<html>
<head>
  <title>Job_order</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
<div class="rtl">
    <div class="logo-container">
        <img style="height: 100px" src="./assets/img/logo-inch.jpg">
        <div class="col-md-12">
            <hr class="separator-line">
        </div>
        <div class="card">
            <div class="card-body">
                <h2>مؤسسة ثمال لصيانة السيارات</h2><br>
                <h3>حي الياقوت - طريق الملك عبدالعزيز - باتجاة جدة</h3><br>
                <h3>هاتف : 014322055</h3>
            </div>
        </div>
    </div>
    <div  style="direction: rtl;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="./assets/img/فحص سيارة.png" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <textarea name="comment" class="form-control text-center" placeholder="تعليق" id="comment"
                        style="height: 100px; direction: rtl; text-align: right;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>توقيع الفني</th>
                            <th>الفني المتخصص</th>
                            <th>الانتهاء</th>
                            <th>بدء العمل</th>
                            <th>قطع الغيار</th>
                            <th>الصيانة</th>
                            <th>رقم</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h4 class="card-title text-center">بنود الاتفاق</h5>
              <p class="card-text text-end">اوافق علي الاصلاحات المذكورةوالتزم بسداد تكاليف الصيانةوفواتير القطع.<br>
                اوافق علي التجربة الميدانية للسيارة ولامانع لدي في ذالك.<br>
                المركز غير مسؤول عن الصيانة خارج المركز في حال الفحص لدينا.<br>
                في حال عدول العميل عن الاصلاح فالمركز غير ملزم بتطبيق ماتم فكة من اجراء ويلتزم العميل بدفع نصف قيمة التكاليف المتفق<br>
                المركز غير مسؤول عن المركبة في حال تاخر صاحبها عن موعد الاستلام.<br>
                المركز غير مسؤول عن تلف القطعة المتهالكة والبالية في حال كسرها اثناء الفك نتيجة الجفاف او الصداء .<br>
                المركز غير مسؤول عن اي مفقودات ثمينة دخل السيارة وعلي العميل استلام جميع المفتنيات الخاصةقبل تسليم للمركز.<br>
                الفحص الشامل هو فحص مبدئي للسيارة وهنالك بعض الاعطال لاتظهر الا بعد استخدام السيارة والسير بها لمسافات طويلة مثل (نقص الزيت-الحرارة).<br>
                عند تغير ناقل الحركة (الجيربكس) فالمركز غير مسؤول عن اي اعطال ناتجة عن التاخر في موعد تغير الزيت ويتحمل العميل المسؤولية كاملة .
              </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Get HTML content
    var content = document.getElementById('content');

    // Initialize jsPDF
    var doc = new jsPDF();

    // Add HTML content to PDF
    doc.html(content, {
      callback: function (pdf) {
        // Save PDF
        pdf.save('output.pdf');
      }
    });
  </script>
</body>
</html>