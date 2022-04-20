@extends('layout.clinicstaff-master1')

@section('title')
    Released Medical Supplies
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
                            <h5>RELEASED MEDICAL SUPPLIES</h5>
                        </div>
                        <div class="col-md-6"></div>  
                        <hr>
                    </div>
                </div>
                <div class="row mb-4" id="med-subhead">
                    <div class="col-md-11" style="margin: auto;">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-print"></i> <a href="">Print All</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-11 supplies-inventory">
                    <table class="table table-hover rounded" id="supplies-inventory">
                        <thead>
                            <tr>                            
                                <th class="bg-primary text-white">Product Name</th>
                                <th class="bg-primary text-white">Product Type</th>
                                <th class="bg-primary text-white">Packaging Type</th>
                                <th class="bg-primary text-white text-center">Quantity</th>
                                <th class="bg-primary text-white">Receiver Name</th>
                                <th class="bg-primary text-white">Released Date</th>
                                <th class="bg-primary text-white text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($med_supplies as $med_supply)
                            @if($med_supply->archived == 0)
                            <tr>
                                <td>{{$med_supply->product_name}}</td>
                                <td>{{$med_supply->med_type->medicine_type}}</td>
                                <td>{{$med_supply->packaging_type->packaging_type}}</td>
                            @foreach($med_supply->med_release as $med_released)
                                <td class="text-center">{{$med_released->quantity}}</td>
                                <td>{{$med_released->receiver_name}}</td>
                                <td class="">{{$med_released->released_date}}</td>
                            @endforeach
                                <td class="text-center"><a href="" class="bg-danger rounded text-white" style="padding: 2px 5px;">Delete</a></td>
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
    function confirmArchive(){
            var result = confirm("Confirm to archive product.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        } 
  </script>
@include('pages.clinic_staff.medical-inventory.add-medical-supplies')
@stop