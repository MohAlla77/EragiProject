
  <!-- Modal -->
  <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div class="col-12">
              <h5 class="modal-title text-center" id="exampleModalLabel">طلب شراء</h5>
            </div>
          </div>
          <form id="purchaseForm" action="#" method="post">
            <div class="modal-body">
                <div  class="row g-1">
                    <div class="col-md-6">
                        <input type="text" name="name" required
                            class="form-control  text-center"
                            id="validationDefault01" required
                            placeholder="اسم المورد">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="name" required
                            class="form-control  text-center"
                            id="validationDefault01" required
                            placeholder="رقم اللوحة">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="name" required
                            class="form-control text-center"
                            id="validationDefault01" required
                            placeholder="رقم الفاتورة">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" required
                            class="form-control text-center"
                            id="validationDefault01" required
                            placeholder="كود الصنف">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" required
                            class="form-control text-center"
                            id="validationDefault01" required
                            placeholder="الصنف">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="name" required
                            class="form-control text-center" id="quantity"
                            required placeholder="الكمية">
                    </div>
                    <div class="col-md-12">
                        <input type="number" name="name" required
                            class="form-control text-center" id="price"
                            required placeholder="السعر">
                    </div>
                    <div class="footer text-center">
                        <button type="button" class="btn btn-danger col-3"
                            data-bs-dismiss="modal">الغاء <i
                                class="fa-solid fa-xmark"></i></button>
                        <button type="submit" class="btn btn-success col-3">حفظ
                            <i class="fa fa-bookmark"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="button" class="btn btn-primary">حفظ</button>
        </div> --}}
      </div>
    </div>
  </div>
  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">طلب شراء</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="purchaseForm" action="#" method="post">
                <div  class="row g-1">
                    <div class="col-md-6">
                        <input type="text" name="name" required
                            class="form-control  text-center"
                            id="validationDefault01" required
                            placeholder="اسم المورد">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="name" required
                            class="form-control  text-center"
                            id="validationDefault01" required
                            placeholder="رقم اللوحة">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="name" required
                            class="form-control text-center"
                            id="validationDefault01" required
                            placeholder="رقم الفاتورة">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" required
                            class="form-control text-center"
                            id="validationDefault01" required
                            placeholder="كود الصنف">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" required
                            class="form-control text-center"
                            id="validationDefault01" required
                            placeholder="الصنف">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="name" required
                            class="form-control text-center" id="quantity"
                            required placeholder="الكمية">
                    </div>
                    <div class="col-md-12">
                        <input type="number" name="name" required
                            class="form-control text-center" id="price"
                            required placeholder="السعر">
                    </div>
                    {{-- <div class="footer text-center">
                        <button type="button" class="btn btn-danger col-3"
                            data-bs-dismiss="modal">الغاء <i
                                class="fa-solid fa-xmark"></i></button>
                        <button type="submit" class="btn btn-success col-3">حفظ
                            <i class="fa fa-bookmark"
                                aria-hidden="true"></i></button>
                    </div> 
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="button" class="btn btn-primary">حفظ</button>
        </div>
      </div>
    </div>
  </div> --}}