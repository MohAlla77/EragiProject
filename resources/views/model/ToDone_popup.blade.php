<div class="modal fade" id="exampleModal{{ $car->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">ادخال اسم الفني</h1>
            </div>
            <form action="{{ route('car.ToDone', $car->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input name="WorkerName" type="text" class="form-control text-center" required
                    placeholder=" اسم العامل ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submite" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>