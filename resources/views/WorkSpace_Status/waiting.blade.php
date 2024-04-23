<div class="row">
    <div class="col-md-6">
        <label for="sparePartsRequest" class="form-label d-flex justify-content-end">   {{$data->user_name}} : الإجرات المطلوبة من المهندس

        </label>
        <div class="row g-1 mb-1">
            <div class="col-6">
                <input name="#" type="text"
                    class="form-control text-center" id="#" required
                    placeholder="اسم الفني">
            </div> 
            <div class="col-6">
                <input name="#" type="text"
                    class="form-control text-center" id="#" required
                    placeholder="الوقت المقترح للصيانة">
            </div>
        </div>
        <div class="col-12 mb-1">
            <input name="#" type="text"
                class="form-control text-center" id="#" required
                placeholder="قطع الغيار المطلوبة">
        </div>
        <div class="numbered-textarea">
            <textarea class="form-control" name="sparePartsRequest" id="sparePartsRequest" style="height: 117px;" disabled>
                {{ $data->fix_requirement }}</textarea>
            <div class="line-numbers"></div>
        </div>
        <div class="row">
            <div class="col-6 d-grid gap-2 mx-auto py-4 text-center">
                <form action="{{route('Add.Done', $car->id)}}" method="post">
                    @csrf
                    <button class="btn btn-danger" type="submit"> إنهاء عمل<i class="fa fa-briefcase" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="col-6 d-grid gap-2 mx-auto py-4 text-center">
                <form action="{{route('Add.Maintenance', $car->id)}}" method="post">
                    @csrf
                <button  class="btn btn-success" type="submit">امر عمل <i class="fa fa-briefcase" aria-hidden="true"></i></button>
                </form>
            </div>
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
