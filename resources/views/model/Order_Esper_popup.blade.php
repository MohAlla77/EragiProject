  <!-- Modal -->
  <div class="modal fade" id="exampleModal44" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="col-12 text-center">
            <h5 class="modal-title" id="exampleModalLabel">طلب اسبير</h5>
          </div>
        </div>
        <form action="{{ route('car.search') }}" method="GET">
          <div class="input-group mb-2">
            <input type="text" class="form-control text-center" name="plateNumber"
                placeholder="بحث">
            <button class="btn btn-outline-success" type="search">بحث</button>
          </div>
        </form>
          <div class="modal-body">
            <div class="row g-1">
              @if(isset($car))
              {{-- <div class="col-md-6">
                <input name="#" type="text" class="form-control text-center"
                  id="#" required placeholder="رقم امر العمل">
              </div> --}}
              <div class="col-md-6">
                <input type="text" value="{{$car->carPlate}}" class="form-control text-center"
                  required placeholder="رقم اللوحة">
              </div>
              <div class="col-md-6">
                <input value="{{ $car->structure_no }}" type="text" class="form-control text-center"
                  required placeholder="رقم الهيكل">
              </div>
              <div class="col-md-6">
                <input value="{{ $car->car_name }}" type="text" class="form-control text-center"
                  required placeholder="اسم السيارة">
              </div>
              <div class="col-md-6">
                <input value="{{ $car->brand }}" type="text" class="form-control text-center"
                  required placeholder="ماركة السيارة">
              </div>
              <div class="col-md-6">
                <input value="{{$car->model}}" type="text" class="form-control text-center"
                  required placeholder="موديل السيارة">
              </div>
              <div class="col-md-6">
                <input name="esper_name" type="text" class="form-control text-center"
                  id="#" required placeholder="اسم الاسبير">
              </div>
              <div class="col-md-12">
                <select name="esper_type" class="form-select text-center">
                  <option selected="#">نوع الاسبير</option>
                  <option value="#">اصلي</option>
                  <option value="#">تجاري</option>
                </select>
              </div>
            @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
            <button type="button" class="btn btn-primary">ارسال</button>
          </div>
      </div>
    </div>
  </div>