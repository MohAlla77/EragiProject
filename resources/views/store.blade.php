@extends('Master')
@section('title', ('Store'))
@section('navbarTitle', ('Store'))
@section('content')
    <button id="toggleButton" class="btn btn-primary" onclick="toggleVisibility()">الجدول</button>
    <div id="dismissal_receiving" style="display: none;">
        <table id="example" class="table table-striped" style="width:100%">
        </table>
        <div class="card">
            <div class="card-header text-end">جدول المخزن <i class="fas fa-table mt-1"></i>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                    <th scope="col">الكمية المتوفر</th>
                    <th scope="col">التكلفة</th>
                    <th scope="col">متوسط السعر </th>
                    <th scope="col">سعر التجزي</th>
                    <th scope="col">سعر الاجمالي</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الوحدة</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">التسلسلي</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th scope="col">الكمية المتوفر</th>
                    <th scope="col">التكلفة</th>
                    <th scope="col">متوسط سعر البيع</th>
                    <th scope="col">سعر البيع التجزي</th>
                    <th scope="col">سعر البيع الاجمالي</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الوحدة</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">اسم الصنف</th>
                    <th scope="col">الرقم التسلسلي</th>
                    </tr>
                </tfoot>
                <tbody>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div id="table">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-light shadow mt-2" id="cardContainer">
                    <div class="card bg-light shadow-lg border-3">
                        <div class="card-body">
                            <div class="select row mb-2" aria-label="Forms toggle">
                                <select class="form-select text-center" onchange="toggleForm(this)">
                                    <option value="dismissal">اذن صرف</option>
                                    <option value="receiving">اذن استلام</option>
                                </select>
                            </div>
                            <div class="card shadow-lg border-0" id="dismissalForm">
                                <div class="card-body">
                                    <form class="mb-1" novalidate action="المخزن.php" method="post">
                                        <div class="row g-1">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control text-center" placeholder="اذن صرف" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                    <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="اسم القطعة">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control text-center" id="validationCustomAddress" required placeholder="الرقم التسلسلي">
                                            </div>
                                            <div class="col-md-6">
                                                    <input type="number" class="form-control text-center" id="Unit" required placeholder="الوحدة">
                                            </div>
                                            <div class="col-md-6">
                                                    <input type="number" class="form-control text-center" id="validationCustomAddress" required placeholder="الكمية">
                                            </div>
                                            <div class="col-md-12">
                                                <select id="validationServer04" class="form-select text-center" aria-describedby="validationServer04Feedback" required>
                                                    <option selected>نوع الصرف</option>
                                                    <option>صرف تشغيلي</option>
                                                    <option>صرف خدمي</option>
                                                </select>
                                            </div>
                                            <div class="form-floating col-md-12 mb-1">
                                                <textarea class="form-control" placeholder="Description" id="floatingTextarea"></textarea>
                                                <label class="text-center" for="floatingTextarea">ملاحظات</label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="SUBMIT" class="col-6 btn btn-danger">موافق</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow-lg border-0" id="receivingForm" style="display: none;">
                                <div class="card-body">
                                    <form class="mb-1" novalidate action="المخزن.php" method="post">
                                        <div class="row g-1">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control text-center" id="AddacategoryFields" required placeholder="استلام" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                    <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="اسم القطعة">
                                            </div>
                                            <div class="col-md-6">
                                                    <input type="number" class="form-control text-center" id="Unit" required placeholder="الوحدة">
                                            </div>
                                            <div class="col-md-6">
                                                    <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="الكمية">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control text-center" id="validationCustomAddress" required placeholder="الرقم التسلسلي">
                                            </div>
                                            <div class="form-floating col-md-12">
                                                <textarea class="form-control" placeholder="Description" id="floatingTextarea"></textarea>
                                                <label class="text-center" for="floatingTextarea">ملاحظات</label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="SUBMIT" class="col-6 btn btn-success">موافق</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<script>
    function toggleVisibility() {
        var dismissalReceiving = document.getElementById('dismissal_receiving');
        var tableContainer = document.getElementById('tableContainer');

        if (dismissalReceiving.style.display === 'none') {
            dismissalReceiving.style.display = 'block';
            tableContainer.style.display = 'none';
        } else {
            dismissalReceiving.style.display = 'none';
            tableContainer.style.display = 'block';
        }
    }

                function toggleForm(selectElement) {
        var dismissalForm = document.getElementById('dismissalForm');
        var receivingForm = document.getElementById('receivingForm');

        if (selectElement.value === 'dismissal') {
            dismissalForm.style.display = 'block';
            receivingForm.style.display = 'none';
        } else if (selectElement.value === 'receiving') {
            dismissalForm.style.display = 'none';
            receivingForm.style.display = 'block';
        }
    }
</script>