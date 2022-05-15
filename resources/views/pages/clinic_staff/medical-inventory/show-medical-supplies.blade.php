@extends('layout.clinicstaff-master1')

@section('title')
    Medical Supplies Inventory
@stop

@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
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
    }#med-header hr{
        margin-top: 0px;
    }
    #med-subhead a{
        color: #0266ea;
    }
    #med-subhead i{
        color: #1067d8;
        font-size: 20px;
    }
</style>

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
                <div class="col-md-11 supplies-inventory">
                    <table class="table table-hover rounded" id="consumable-prod">
                        <thead>
                            <tr>                            
                                <th class="bg-primary text-white">Product Name</th>
                                <th class="bg-primary text-white">Product Type</th>
                                <th class="bg-primary text-white text-center">Stock</th>
                                <th class="bg-primary text-white">Purchase Date</th>
                                <th class="bg-primary text-white">Expiration Date</th>
                                <th class="bg-primary text-white text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($med_supplies as $med_supply)
                                @if($med_supply->archived == 0 && $med_supply->stock == 0)
                                <tr class="table-danger">
                                    <td>{{$med_supply->product_name}}</td>
                                    <td>{{$med_supply->med_type->medicine_type}}</td>
                                    <td class="text-center">{{$med_supply->stock}}</td>
                                    <td>{{date('F d, Y', strtotime($med_supply->purchase_date))}}</td>
                                    <td class="">{{date('F d, Y', strtotime($med_supply->expiry_date))}}</td>
                                    <td class="text-center">
                                        <a href="{{route('edit-medical-record', $med_supply->id, $med_types)}}" class="btn btn-warning btn-sm" id="btn-edit-inventory"><i class="far fa-edit"></i></a>
                                    
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#archiveModal"><i class="fas fa-trash-alt"></i></button>
                                    
                                        <!-- Archive Modal -->
                                        <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row mb-1" style="text-align: left;">
                                                            <p>Confirm to archive product.</p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col"></div>
                                                            <div class="col-md-4">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{route('archiveMedical', $med_supply->id)}}" class="btn btn-danger btn-sm">Archive</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @if($med_supply->archived == 0 && $med_supply->stock >= 1)
                                <tr>
                                    <td>{{$med_supply->product_name}}</td>
                                    <td>{{$med_supply->med_type->medicine_type}}</td>
                                    <td class="text-center">{{$med_supply->stock}}</td>
                                    <td>{{date('F d, Y', strtotime($med_supply->purchase_date))}}</td>
                                    <td class="">{{date('F d, Y', strtotime($med_supply->expiry_date))}}</td>
                                    <td class="text-center">
                                        <a href="{{route('edit-medical-record', $med_supply->id, $med_types)}}" class="btn btn-warning btn-sm" id="btn-edit-inventory"><i class="far fa-edit"></i></a>
                                    
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#archiveModal"><i class="fas fa-trash-alt"></i></button>
                                    
                                        <!-- Archive Modal -->
                                        <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row mb-1" style="text-align: left;">
                                                            <p>You can't archive this product, check stock status.</p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col"></div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Back</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    });
  </script>
@include('pages.clinic_staff.medical-inventory.add-medical-supplies')
@stop