<div class="add-medical-supply">
    <div class="col-md-8 offset-md-2 mt-5 rounded" id="add-medical-supply">
        <div class="card border-info">
            <div class="card-header bg-primary text-white">
                <h4>Medical Supplies Inventory</h4>
            </div>
            <div class="card-body">
                <form action="{{route('add-medical-supply')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="product_name"><strong>Product Name</strong></label>
                                <input type="text" class="shadow-sm form-control" name="product_name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="generic_name"><strong>Generic Name</strong></label>
                                <input type="text" class="shadow-sm form-control" name="generic_name">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="medicine_type"><strong>Medicine Type</strong></label>
                                <select name="medicine_type" class="shadow-sm form-control" id="medicine_type">
                                    <option value="">---</option>
                                    <option value="1">Capsules</option>
                                    <option value="2">Cream</option>
                                    <option value="3">Drops</option>
                                    <option value="4">Implant or Patches</option>
                                    <option value="5">Injections</option>
                                    <option value="6">Inhalers</option>
                                    <option value="7">Liquid</option>
                                    <option value="8">Soppositories</option>
                                    <option value="9">Tablet</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="packaging_type"><strong>Pharmaceutical Packaging Type</strong></label>
                                <select name="packaging_type" class="shadow-sm form-control" id="packaging_type">
                                    <option value="">---</option>
                                    <option value="1">Bottles</option>
                                    <option value="2">Vials</option>
                                    <option value="3">Blister packs</option>
                                    <option value="4">Sachets</option>
                                    <option value="5">Syringes</option>
                                    <option value="6">Ampoules</option>
                                    <option value="7">Cartons</option>
                                    <option value="8">Boxes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="quantity"><strong>Quantity</strong></label>
                                <input type="text" class="shadow-sm form-control" name="quantity">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="stock"><strong>Stock</strong></label>
                                <input type="text" class="shadow-sm form-control" name="stock">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="expiry_date"><strong>Expiry Date</strong></label>
                                <input type="date" class="shadow-sm form-control" name="expiry_date">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="purchase_date"><strong>Purchase Date</strong></label>
                                <input type="date" class="shadow-sm form-control" name="purchase_date">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="lot_num"><strong>Lot Number</strong></label>
                                <input type="text" class="shadow-sm form-control" name="lot_num">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group input-group-sm">
                                <label for="supplier"><strong>Product Supplier</strong></label>
                                <input type="text" class="shadow-sm form-control" name="supplier">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-danger" id="btn-item-cancel">Cancel</a>
                    <button type="submit" class="btn btn-primary text-white" style="width: 80px;" id="btn-add-item">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>