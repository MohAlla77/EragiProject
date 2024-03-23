<div class="row">
    <div class="col-md-6">
        <label for="sparePartsRequest" class="form-label d-flex justify-content-end">   {{$data->user_name}} : الإجرات المطلوبة من المهندس

        </label>
        <div class="numbered-textarea">
            <textarea class="form-control" name="sparePartsRequest" id="sparePartsRequest" style="height: 200px;" disabled>
                {{ $data->fix_requirement }}</textarea>
            <div class="line-numbers"></div>
        </div>
    </div>
    <div class="col-md-6">
            <label for="notes" class="form-label d-flex justify-content-end">شكاوى العميل
            </label>
            <div class="numbered-textarea">
                <textarea class="form-control" name="notes" id="notes" style="height: 200px;" disabled>
                                {{ $data->customer_comment }} </textarea>
                <div class="line-numbers"></div>
            </div>
    </div>
</div>
