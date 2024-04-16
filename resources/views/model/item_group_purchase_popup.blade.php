<div class="modal fade" id="exampleModalitem{{'#'}}" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <div class="col-12">
                        <h5 class="text-center" id="exampleModalLabel"> ادخل اسم المجموعة</h5>
                    </div>
                </div>
                <form class="row g-1" id="addItemForm" novalidate action="{{route('CategorizeGroup.store')}}"
                    method="post">
                    @csrf
                    <div class="col-md-6">
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
</div>