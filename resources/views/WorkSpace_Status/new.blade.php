
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('AddCar.check', $car->id) }}" method="POST">
            @csrf
            <label for="notes" class="form-label d-flex justify-content-end">شكاوى العميل
            </label>
            <div class="numbered-textarea">
                <textarea class="form-control" name="notes" id="notes" style="height: 200px;">
                </textarea>
                <div class="line-numbers"></div>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto py-4">
                <button class="btn btn-primary" type="submit"> أمر فحص <i class="fa fa-search"
                        aria-hidden="true"></i></button>
        </form>
    </div>
</div>
