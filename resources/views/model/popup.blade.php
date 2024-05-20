<style>
    .textarea-container {
        position: relative;
    }
    .line-numbers {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        text-align: right;
        pointer-events: none;
        white-space: pre-wrap;
        font-family: inherit;
        font-size: inherit;
        line-height: 1.5;
        color: #999;
    }
    textarea {
        direction: rtl;
        text-align: right;
        padding-right: 2.5em;
    }
</style>
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
                    <div class="row g-1">
                        <div class="col-6 mb-1">
                            <input name="WorkerName" type="text"
                                class="form-control text-center" id="#" required
                                placeholder="تحديد اسم الفني">
                        </div>
                        <div class="col-6 mb-1">
                            <input name="FixTime" type="text"
                                class="form-control text-center" id="#" required
                                placeholder="الوقت المقترح للصيانة">
                        </div>
                    </div>
                    <div class="col-12 mb-1">
                        <input name="SpearPart" type="text"
                            class="form-control text-center" id="#" required
                            placeholder="تحديد قطع الغيار المطلوبة">
                    </div>
                    <div class="textarea-container">
                        <div id="lineNumbers" class="line-numbers"></div>
                        <textarea class="form-control text-center" name="sparePartsRequest" id="sparePartsRequest" placeholder="ادخل الخدمات" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">إرفاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const textarea = document.getElementById('sparePartsRequest');
    const lineNumbers = document.getElementById('lineNumbers');

    textarea.addEventListener('input', updateLineNumbers);
    textarea.addEventListener('scroll', () => {
        lineNumbers.scrollTop = textarea.scrollTop;
    });

    function updateLineNumbers() {
        const lines = textarea.value.split('\n').length;
        lineNumbers.textContent = '';
        for (let i = 1; i <= lines; i++) {
            lineNumbers.textContent += i + '\n';
        }
    }

    updateLineNumbers(); // Initialize line numbers
</script>
