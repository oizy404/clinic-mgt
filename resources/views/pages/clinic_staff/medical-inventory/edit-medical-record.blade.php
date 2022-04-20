@extends('layout.clinicstaff-master1')

@section('title')
    Edit Medical Product
@stop

@section('content')

{{session('rank')}}
        <div class="main-container">
            <div class="row mb-1" id="med-header">
                <div class="col-md-11" style="margin: auto; padding: 0px;">
                    <div class="col-md-5">
                        <h5>MEDICAL SUPPLIES INVENTORY</h5>
                    </div>
                    <div class="col-md-6"></div>  
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 update-supplies-inventory mt-4" style="margin: auto;">
                    <div class="card">
                        <div class="card-header bg-info text-dark">
                            <h5 class="mb-0">Update Product</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-medical-record', $med_supply->id)}}" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="product_name"><b>Product Name</b></label>
                                            <input type="text" class="form-control" name="product_name" value="{{$med_supply->product_name}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="medicine_type"><b>Medicine Type</b></label>
                                            <select name="medicine_type" class="form-control" id="medicine_type">
                                                <option value="{{$med_supply->med_type->id}}">{{$med_supply->med_type->medicine_type}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="quantity"><b>Quantity/Pieces</b></label>
                                            <input type="text" class="form-control" name="quantity">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group-sm">
                                            <label for="reciever_name"><b>Reciever Name</b></label>
                                            <input type="text" class="form-control" name="reciever_name">
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