




  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div class="col-12 text-center">
                  <h5 class="modal-title" id="exampleModalLabel">ادخل اسم المجموعة</h5>
            </div>
        </div>
        <form class="row" id="addItemForm" novalidate action="{{route('CategorizeGroup.store')}}"
          method="post">
          @csrf
        <div class="modal-body">
            <div class="col-md-12 mb-1">
                <input type="text" class="form-control text-center"
                    id="AddagroupFields" required
                    placeholder="اضافة المجموعة الاصناف" readonly>
            </div>
            <div class="row g-1">
                <div class="col-md-6">
                    <input name="CategorizeGroupName" type="text" class="form-control text-center"
                        id="#" required placeholder="اسم المجموعة">
                </div>
                <div class="col-md-6">
                    <input name="CategorizeGroupNumber" type="text" class="form-control text-center"
                        id="#" required placeholder="رقم المجوعة">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">اضافة</button>
            </div>
        </div>
      </div>
    </div>
  </div>



{{-- <div class="modal fade" id="exampleModal{{'#'}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <div class="col-12">
                        <h5 class="text-center" id="exampleModalLabel"> ادخل اسم المجموعة</h5>
                    </div>
                </div>
                <form class="row" id="addItemForm" novalidate action="{{route('CategorizeGroup.store')}}"
                    method="post">
                    @csrf
                    <div class="col-md-6 mb-2">
                        <input name="CategorizeGroupName" type="text" class="form-control text-center"
                            id="#" required placeholder="اسم المجموعة">
                    </div>
                    <div class="col-md-6">
                        <input name="CategorizeGroupNumber" type="text" class="form-control text-center"
                            id="#" required placeholder="رقم المجوعة">
                    </div>
                    <div class="col-12 text-center">
                        <button type="Save" class="col-6 btn btn-success">
                            اضافة
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
