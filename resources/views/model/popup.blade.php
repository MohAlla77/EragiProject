<!-- Modal -->
<div class="modal fade" id="exampleModal{{$data->CarId}}{{$data->UserId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12">
                    <h5 class="text-center" id="exampleModalLabel">الإجراءت المطلوبة</h5>
                </div>
            </div>
            <form action="{{ route('RemoveCar.check',  ['id' => $data->CarId, 'user' => $data->UserId]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-1">
                        <input name="WorkerName" type="text"
                            class="form-control text-center" id="#" required
                            placeholder="تحديد اسم الفني">
                    </div>
                    <div class="col-12 mb-1">
                        <input name="FixTime" type="text"
                            class="form-control text-center" id="#" required
                            placeholder="الوقت المقترح للصيانة">
                    </div>
                    <div class="col-12 mb-1">
                        <input name="SpearPart" type="text"
                            class="form-control text-center" id="#" required
                            placeholder="تحديد قطع الغيار المطلوبة">
                    </div>
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
