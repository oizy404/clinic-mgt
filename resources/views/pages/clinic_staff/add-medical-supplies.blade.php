<div class="add-medical-supply">
    <div class="panel-heading col-md-6 offset-md-3 mt-3 rounded">
        <div class="col-md-4 offset-md-8 p-head">
            <h5 class="mb-0">Add Medical Item</h5>
        </div>
    </div>
    <div class="col-md-6 offset-md-3 rounded" id="add-medical-supply">
        <div class="card">
            <div class="card-header bg-info">
                <h4>Medical Supplies Inventory</h4>
            </div>
            <div class="card-body">
                <form action="{{route('add-medical-supply')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group input-group-sm">
                        <label for="product_name"><strong>Product Name</strong></label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="medicine_type"><strong>Medicine Type</strong></label>
                                <select name="medicine_type" class="form-control" id="medicine_type">
                                    @foreach($med_types as $med_type)
                                    <option value="{{$med_type->id}}">{{$med_type->medicine_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="quantity"><strong>Quantity</strong></label>
                                <input type="text" class="form-control" name="quantity">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="stock"><strong>Stock</strong></label>
                                <input type="text" class="form-control" name="stock">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="expiry_date"><strong>Expiry Date</strong></label>
                                <input type="date" class="form-control" name="expiry_date">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="purchase_date"><strong>Purchase Date</strong></label>
                                <input type="date" class="form-control" name="purchase_date">
                            </div>
                        </div>
                    </div>
                    <a href="/medical-supplies-inventory" class="btn btn-danger" id="btn_cancel">Cancel</a>
                    <button type="submit" class="btn btn-success" id="btn-add-item">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>