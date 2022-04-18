@extends('layout.clinicstaff-master1')

@section('title')
    Edit Medical Product
@stop

@section('content')

{{session('rank')}}
        <div class="main-container">
            <div class="row supplies-inventory-dashboard">
                <div class="col-md-11 supplies-inventory-addbtn">
                    <div class="col-md-4">
                        <!-- <button class="btn" id="btn-item"><i class="fas fa-plus"></i> Add Item</button><br> -->
                    </div>
                    <div class="col-md-7 offset-md-1">
                        <h3>MEDICAL SUPPLIES INVENTORY</h3>
                    </div>    
                </div>
                <div class="col-md-11 update-supplies-inventory mt-4" style="margin: auto;">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Product</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-medical-record', $med_supply->id, $med_types)}}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$med_supply->product_name}}">
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
                                            <label for="quantity">Quantity/Pieces</label>
                                            <input type="text" class="form-control" name="quantity">
                                        </div>
                                    </div>
                                </div>
                                <a href="/medical-supplies-inventory" class="btn btn-danger" id="btn-item-cancel">Cancel</a>
                                <button type="submit" class="btn btn-primary" id="btn-edit-item">Update</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
        $(".hamburger").click(function(){
            $(".wrapper").toggleClass("active")
        });

        $('#supplies-inventory').DataTable();
    }); 
  </script>
@stop