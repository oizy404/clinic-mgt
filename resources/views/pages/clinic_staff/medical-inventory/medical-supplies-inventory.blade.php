@extends('layout.clinicstaff-master1')

@section('title')
    ACD Medical Supplies Inventory
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
                        
                        {!! Toastr::message() !!}
                        
                        <div class="col-md-5">
                            <h5>MEDICAL SUPPLIES INVENTORY</h5>
                        </div>
                        <div class="col-md-6"></div>  
                        <hr>
                    </div>
                </div>
                <div class="row mb-4" id="med-subhead">
                    <div class="col-md-11" style="margin: auto;">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-plus"></i> <a href="{{route('released-medical-supplies')}}">Released Medical Products</a>
                            </div>
                            <div class="col"></div> 
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-11 supplies-inventory">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-consumable" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Available Products</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-expiring" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Expiring Products</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-expired" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Expired Products</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-consumable" role="tabpanel" aria-labelledby="nav-home-tab"><br>
                            <table class="table table-hover rounded" id="consumable-prod">
                                <thead>
                                    <tr>                            
                                        <th class="bg-primary text-white">Product Name</th>
                                        <th class="bg-primary text-white">Product Type</th>
                                        <th class="bg-primary text-white text-center">Stock</th>
                                        <th class="bg-primary text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($med_supplies as $med_supply)
                                    @if($med_supply->stock == 0)
                                    <tr class="table-danger">
                                        <td>{{$med_supply->product_name}}</td>
                                            @foreach($med_types as $med_type)
                                                @if($med_type->id == $med_supply->med_type_id)
                                                    <td>{{$med_type->medicine_type}}</td>
                                                @endif
                                            @endforeach
                                        <td>{{$med_supply->med_type_id}}</td>
                                        <td class="text-center">{{$med_supply->stock}}</td>
                                        <td class="text-center">
                                        
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @if($med_supply->stock >= 1)
                                    <tr>
                                        <td>{{$med_supply->product_name}}</td>
                                            @foreach($med_types as $med_type)
                                                @if($med_type->id == $med_supply->med_type_id)
                                                    <td>{{$med_type->medicine_type}}</td>
                                                @endif
                                            @endforeach
                                        <td class="text-center">{{$med_supply->stock}}</td>
                                        <td class="text-center">
                                            <a href="{{route('show-medical-supplies', $med_supply->product_name)}}" class="btn btn-warning btn-sm" id="btn-edit-inventory"><i class="far fa-edit"></i></a>
                                        
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
                        <div class="tab-pane fade" id="nav-expiring" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <small class="text-danger mt-2"><b>(Following medicines are stored for two months after purchase and soon to expire.)</b></small><br><br>
                            <table class="table table-hover rounded" id="expiring-prod">
                                <thead>
                                    <tr>                            
                                        <th class="bg-primary text-white">Product Name</th>
                                        <th class="bg-primary text-white">Product Type</th>
                                        <th class="bg-primary text-white text-center">Stock</th>
                                        <th class="bg-primary text-white">Purchase Date</th>
                                        <th class="bg-primary text-white">Expiry Date</th>
                                        <th class="bg-primary text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($expiring_products as $expiring_product)
                                    @if($expiring_product->archived == 0 && $expiring_product->stock >= 1)
                                    <tr>
                                        <td>{{$expiring_product->product_name}}</td>
                                        <td>{{$expiring_product->med_type->medicine_type}}</td>
                                        <td class="text-center">{{$expiring_product->stock}}</td>
                                        <td>{{date('F d, Y', strtotime($expiring_product->purchase_date))}}</td>
                                        <td class="">{{date('F d, Y', strtotime($expiring_product->expiry_date))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('edit-medical-record', $expiring_product->id, $med_types)}}" class="btn btn-warning btn-sm" id="btn-edit-inventory"><i class="far fa-edit"></i></a>
                                        
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#archiveExpiringModal"><i class="fas fa-trash-alt"></i></button>
                                        
                                            <!-- Archive Modal -->
                                            <div class="modal fade" id="archiveExpiringModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <a href="{{route('archiveMedical', $expiring_product->id)}}" class="btn btn-danger btn-sm">Archive</a>
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
                        <div class="tab-pane fade" id="nav-expired" role="tabpanel" aria-labelledby="nav-contact-tab"><br>
                            <table class="table table-hover rounded" id="expired-prod">
                                <thead>
                                    <tr>                            
                                        <th class="bg-primary text-white">Product Name</th>
                                        <th class="bg-primary text-white">Product Type</th>
                                        <th class="bg-primary text-white text-center">Stock</th>
                                        <th class="bg-primary text-white">Purchase Date</th>
                                        <th class="bg-primary text-white">Expiry Date</th>
                                        <th class="bg-primary text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($expired_products as $expired_product)
                                    @if($expired_product->archived == 0 && $expired_product->stock >= 1)
                                    <tr>
                                        <td>{{$expired_product->product_name}}</td>
                                        <td>{{$expired_product->med_type->medicine_type}}</td>
                                        <td class="text-center">{{$expired_product->stock}}</td>
                                        <td>{{date('F d, Y', strtotime($expired_product->purchase_date))}}</td>
                                        <td class="">{{date('F d, Y', strtotime($expired_product->expiry_date))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('edit-medical-record', $expired_product->id, $med_types)}}" class="btn btn-warning btn-sm" id="btn-edit-inventory"><i class="far fa-edit"></i></a>
                                        
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#archiveExpiredModal"><i class="fas fa-trash-alt"></i></button>
                                        
                                            <!-- Archive Modal -->
                                            <div class="modal fade" id="archiveExpiredModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <a href="{{route('archiveMedical', $expired_product->id)}}" class="btn btn-danger btn-sm">Archive</a>
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