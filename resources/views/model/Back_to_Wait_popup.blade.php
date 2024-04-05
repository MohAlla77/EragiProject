<div class="modal fade" id="exampleModal2{{ $car->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-6 mx-auto">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">ادخال سبب الانتظار</h1>
                </div>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <select name="car_brand" id="brand" class="form-select text-center"
                        aria-describedby="validationServer04Feedback" required>
                        <option value="" disabled selected>سبب الرجوع الي الانتظار</option>
                        <option selected>اختلاف الاسبير</option>
                        <option selected>عدم توفر مواد تشغيل </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                    <button type="submite" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</div>