<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <h5 class="modal-title text-center" id="exampleModalLabel">طلبات تسعيرة</h5>
        </div>
      </div>
      <form>
        <div class="modal-body">
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
      </form>
    </div>
  </div>
</div>

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i
                          class="fa-solid fa-xmark"></i></button>
        <button type="button" class="btn btn-primary">Save changes <i
                          class="fa fa-bookmark"
                          aria-hidden="true"></i></button>
      </div> --}}