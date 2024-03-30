

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-md-12">
          <h5 class="modal-title text-center" id="exampleModalLabel"> تعديل أو حذف الخدمة</h5>
        </div>
      </div>
      <div class="modal-body">
        <form class="row" id="addItemForm" novalidate
        action="" method="">
        @csrf
        <div class="col-md-6 mb-1">
            <input type="text" class="form-control text-center"
                id="اسم المجموعة" required placeholder="اسم المجموعة" value="{{$service->serviceGroup->name}}">
        </div>
        <div class="col-md-6">
            <input name="ServiceName" type="text"
                class="form-control text-center" id="اسم خدمة" required
                placeholder="اسم خدمة" value="{{$service->name}}">
        </div>
        <div class="col-md-6 mb-2">
            <input name="ServiceId"type="text" name="number"
                class="form-control text-center" id="الرمز" required
                placeholder="رمزالخدمة" disabled value="{{$service->service_id}}">
        </div>
        <div class="col-6">
            <input name="ServiceCost" type="number" name="number"
                class="form-control text-center" id="سعر التكلفة" required
                placeholder="السعر التكلفة" value="{{$service->cost_price}}">
        </div>

        <div class="col-md-12 mb-2" aria-label="Forms toggle">
             <input   class="form-control text-center" value="{{$service->service_type}}">
        </div>
        {{-- <div class="col-12 text-center">
            <button type="submit" class="col-12 btn btn-success">اضافة <i
                    class="fa-solid fa-plus"></i></button>
        </div> --}}
      </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <form action="{{ route('service.delete', $service->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
