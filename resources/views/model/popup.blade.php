<!-- Modal -->
<div class="modal fade" id="exampleModal{{$data->CarId}}{{$data->UserId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الإجراءت المطلوبة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('RemoveCar.check',  ['id' => $data->CarId, 'user' => $data->UserId]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <textarea class="form-control" name="sparePartsRequest" id="sparePartsRequest">

                    </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">إرفاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
