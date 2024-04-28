<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div id="addNewItemForm">
                <div class="row">
                    <form id="searchForm" action="{{ route('spare.search') }}" method="GET">
                        <div class="input-group">
                            <input name="PartId" type="text" class="form-control text-center" id="validationCustom02" placeholder=" ابحث عن رمز الصنف" required>
                        </div>
                    </form>
                    @if (isset($spear))
                    <form action="{{ route('spear.store', $spear->id) }}" method="POST">
                        @csrf
                        <div class="row g-1">
                            <div class="col-md-6">
                                <input name="ItemCode" value="{{ $spear->part_id }}" type="number" class="form-control text-center" id="validationCustom02" placeholder="رمز الصنف" readonly required>
                            </div>
                            <div class="col-md-6">
                                <input name="ItemName" value="{{ $spear->name }}" type="text" name="itemName" id="itemName" required class="form-control text-center" placeholder="اسم الصنف" readonly>
                            </div>
                            <div class="col-md-6">
                                <input name="ItemPrice" value="{{ $spear->price }}" type="number" name="name" required class="form-control text-center" id="price" placeholder="السعر" readonly>
                            </div>
                            <div class="col-md-6">
                                <input name="ItemUnit" class="form-control text-center" id="unitServiceSelect" value="وحدة" readonly>

                            </div>
                            <div class="col-md-6">
                                <input name="ItemQuantity" type="number" name="name" required class="form-control text-center" id="quantity" placeholder="الكمية">
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-success col-3" id="addItemBtn">اضافة</button>
                        </div>
                    </form>
                    @elseif (isset($service))
                    <form action="{{ route('service.store', $service->id) }}" method="POST">
                        @csrf
                        <div class="row g-1">
                            <div class="col-md-6">
                                <input name="ItemCode" value="{{ $service->service_id}}" type="text" class="form-control text-center" id="validationCustom02" placeholder="رمز الصنف" readonly required>
                            </div>
                            <div class="col-md-6">
                                <input name="ItemName" value="{{ $service->name }}" type="text" name="itemName" id="itemName" required class="form-control text-center" placeholder="اسم الصنف" readonly>
                            </div>
                            <div class="col-md-6">
                                <input name="ItemPrice" value="{{ $service->cost_price }}" type="number" name="name" required class="form-control text-center" id="price" placeholder="السعر" readonly>
                            </div>
                            <div class="col-md-6">
                                <input name="ItemUnit" class="form-control text-center"   id="price" placeholder="السعر" value="خدمة" readonly>

                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-success col-3" id="addItemBtn">اضافة</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
