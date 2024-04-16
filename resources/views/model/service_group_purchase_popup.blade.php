
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ادخل اسم المجموعة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-1" id="addItemForm" novalidate
        action="{{ route('ServiceGroup.store') }}" method="post">
        @csrf
        <div class="modal-body">
            <div class="col-md-12">
                <input type="text" class="form-control text-center"
                    id="AddagroupFields" required
                    placeholder="اضافة المجموعة الخدمات" readonly>
            </div>
            <div class="col-md-6">
                <input name="GroupName" type="text"
                    class="form-control text-center" id="#" required
                    placeholder="اسم المجموعة">
            </div>
            <div class="col-md-6">
                <input name="GroupNumber" type="text"
                    class="form-control text-center" id="#" required
                    placeholder="رقم المجوعة">
            </div>
            <div class="col-md-12">
                <input name="GroupID" type="text"
                    class="form-control text-center" id="AddagroupFields"
                    required placeholder="أضف رمز (Ex: الماكنيكا -> MCH)"
                    required>
            </div>
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  


{{-- 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <div class="col-12">
                        <h5 class="text-center" id="exampleModalLabel"> ادخل اسم المجموعة</h5>
                    </div>
                </div>
              
                    
            <div class="modal-body">
                   
                </div>
                    <div class="footer col-12 text-center">
                        <button type="submite" class="col-6 btn btn-success">اضافة <i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </form>
        </div>
    </div>
</div> --}}