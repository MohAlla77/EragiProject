
<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <h5 class="modal-title text-center" id="exampleModalLabel">تسعيرة</h5>
        </div>
      </div>
      <form id="quotationForm" action="#">
        <div class="modal-body">
          <div class="row g-1">
              <div class="col-md-6">
                  <input type="text" class="form-control text-center"
                      id="validationCustom02" value=""
                      placeholder="رقم اللوحة" required>
              </div>
              <div class="col-md-6">
                  <input type="text" class="form-control text-center"
                      id="validationCustom02" value=""
                      placeholder="اسم العميل" required>
              </div>
              <div class="col-md-6">
                  <input type="text" class="form-control text-center"
                      id="validationCustom02" value=""
                      placeholder="رقم العميل" required>
              </div>
              <div class="col-md-6">
                  <input type="text" class="form-control text-center"
                      id="validationCustom01" value=""
                      placeholder="القطعة" required>
              </div>
              <div class="col-md-6">
                  <input type="text" class="form-control text-center"
                      id="validationCustom02" value=""
                      placeholder="كود القطعة" required>
              </div>
              <div class="col-md-6">
                  <input type="text" class="form-control text-center"
                      id="validationCustom02" value=""
                      placeholder="كود المخزون" required>
              </div>
              <div class="col-md-6">
                  <input type="number" name="name"
                      class="form-control text-center" id="quantity"
                      required placeholder="الكمية">
              </div>
              <div class="col-md-6">
                  <input type="number" name="name"
                      class="form-control text-center" id="price"
                      required placeholder="السعر">
              </div>
              <div class="footer text-center">
                  <button type="button" class="btn btn-danger col-3"
                      data-bs-dismiss="modal">الغاء <i
                          class="fa-solid fa-xmark"></i></button>
                  <button type="submit"
                      class="btn btn-success col-3">حفظ <i
                          class="fa fa-bookmark"
                          aria-hidden="true"></i></button>
              </div>
          </div>
        </div>
      </form>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>