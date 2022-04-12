@extends('layout.master')

@section('title')
    ACD Medical Supplies Inventory
@stop

@section('content')
<style>
    .add-data{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px; 
        right:40px;
        background-color: #006dff;
        color: #ffffff;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        
    }
    .add-data i{
        margin-top:22px;
    }
</style>
@include('shared.clinicstaff-header')
@include('shared.clinicstaff-sidenav')

{{session('rank')}}
        <div class="main-container">
            <div class="supplies-inventory-dashboard">
                <div class="offset-md-1 supplies-inventory-addbtn">
                    <div class="col-md-4">
                        <!-- <button class="btn" id="btn-item"><i class="fas fa-plus"></i> Add Item</button><br> -->
                    </div>
                    <div class="col-md-7 offset-md-1">
                        <h3>MEDICAL SUPPLIES INVENTORY</h3>
                    </div>    
                </div>
                <div class="offset-md-1 supplies-inventory">
                    <table class="table table-hover rounded" id="supplies-inventory">
                        <thead>
                            <tr>                            
                                <th class="bg-primary text-white">Product Name</th>
                                <th class="bg-primary text-white">Product Type</th>
                                <th class="bg-primary text-white text-center">Stock</th>
                                <th class="bg-primary text-white text-center">Expiry Date</th>
                                <th class="bg-primary text-white text-center">View</th>
                                <th class="bg-primary text-white text-center">Update</th>
                                <th class="bg-primary text-white text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($med_supplies as $med_supply)
                            @if($med_supply->archived == 0)
                            <tr>
                                <td>{{$med_supply->product_name}}</td>
                                <td>{{$med_supply->med_type->medicine_type}}</td>
                                <td class="text-center">{{$med_supply->stock}}</td>
                                <td class="text-center">{{$med_supply->expiry_date}}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-success"><i class="far fa-eye"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('edit-medical-record', $med_supply->id, $med_types)}}" class="btn btn-warning" id="btn-edit-inventory"><i class="far fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('archiveMedical', $med_supply->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <a href="#" class="add-data" id="btn-item">
        <i class="fas fa-plus"></i>
        </a>

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
@include('pages.clinic_staff.add-medical-supplies')
@stop