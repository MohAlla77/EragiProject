<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $service->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل أو حذف الخدمة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="row" id="addItemForm" novalidate action="{{ route('service.update', $service->id) }}"
                method="POST">
                @method('PUT')
                @csrf

                <div class="modal-body">
                    <div class="col-md-6 mb-1">
                        <select name="service_group_id" class="form-select text-center" onchange="toggleForm(this)">
                            @foreach ($ServiceGruop as $group)
                                <option value="{{ $group->id }}">
                                    {{ $group->name }}
                                </option>
                            @endforeach
                    </div>
                    <div class="col-md-6">
                        <input name="ServiceName" type="text" class="form-control text-center" id="اسم خدمة"
                            required placeholder="اسم خدمة" value="{{ $service->name }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input name="ServiceId"type="text" name="number" class="form-control text-center"
                            id="الرمز" required placeholder="رمزالخدمة" disabled value="{{ $service->service_id }}">
                    </div>
                    <div class="col-6">
                        <input name="ServiceCost" type="number" name="number" class="form-control text-center"
                            id="سعر التكلفة" required placeholder="السعر التكلفة" value="{{ $service->cost_price }}">
                    </div>

                    <div class="col-md-12 mb-2" aria-label="Forms toggle">
                        <select name="ServiceType" class="form-select text-center" onchange="toggleForm(this)" placeholder="{{$service->service_type}}">
                            <option value="داخلية">خدمة داخلية </option>
                            <option value="خارجية">خدمة خارجية</option>
                        </select>
                    </div>
                    {{-- <div class="col-12 text-center">
                     <button type="submit" class="col-12 btn btn-success">اضافة <i
                    class="fa-solid fa-plus"></i></button>
                           </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            <form id="DeleteForm" action="{{ route('service.delete', $service->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger delete-btn" type="submit" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
            </form>
        </div>
    </div>
</div>
