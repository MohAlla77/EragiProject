<div class="modal fade" id="exampleModal{{ $car->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-6 mx-auto">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">اكتب تعليق</h1>
                </div>
            </div>
            <form action="{{ route('car.ToDone', $car->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    {{-- <div class="col-12 mb-2">
                        <input name="WorkerName" type="number" class="form-control text-center" required
                        placeholder="ادخل عدد الفنيين">
                    </div>
                    <div  class="col-12 mb-2">
                        <input name="WorkerName" type="text" class="form-control text-center" required
                        placeholder="اسم العامل">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submite" class="btn btn-primary">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>