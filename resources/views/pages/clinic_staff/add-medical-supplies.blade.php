<div class="add-medical-supply">
    <div class="panel-heading col-md-6 offset-md-3 mt-3 rounded">
        <div class="col-md-4 offset-md-8 p-head">
            <h5 class="mb-0">Add Medical Item</h5>
        </div>
    </div>
    <div class="col-md-6 offset-md-3 rounded" id="add-medical-supply" style="background-color: white;">
        <form action="{{route('add-medical-supply')}}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name">
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label for="medicine_type">Medicine Type</label>
                        <select name="medicine_type" class="form-control" id="medicine_type">
                            @foreach($med_types as $med_type)
                            <option value="{{$med_type->id}}">{{$med_type->medicine_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                </div>
                <!-- <div class="col">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock">
                    </div>
                </div> -->
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" name="expiry_date">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="purchase_date">Purchase Date</label>
                        <input type="date" class="form-control" name="purchase_date">
                    </div>
                </div>
            </div>
            <a href="/medical-supplies-inventory" class="btn" id="btn-item-cancel">Cancel</a>
            <button type="submit" class="btn" id="btn-add-item">Add</button>
        </form>
    </div>
</div>