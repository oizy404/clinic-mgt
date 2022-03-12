@extends('layout.master')

@section('title')
    MEDICAL SUPPLIES INVENTORY
@stop

@section('content')
@include('shared.admin-header')
@include('shared.supervisor-sidenav')

{{session('rank')}}
        <div class="main-container">
            <div class="supplies-inventory-dashboard">
                <div class="offset-md-1 supplies-inventory-addbtn">
                    <div class="col-md-4">
                        <button class="btn" id="btn-item"><i class="fas fa-plus"></i> Add Item</button><br>
                    </div>
                    <div class="col-md-7 offset-md-1">
                        <h3>MEDICAL SUPPLIES INVENTORY</h3>
                    </div>    
                </div>
                <div class="offset-md-1 supplies-inventory">
                    <table id="supplies-inventory" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Stock</th>
                                <th>Expiry Date</th>
                                <th>Update</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($med_supplies as $med_supply)
                            @if($med_supply->archived == 0)
                            <tr>
                                <td>{{$med_supply->product_name}}</td>
                                <td>{{$med_supply->med_type->medicine_type}}</td>
                                <td>{{$med_supply->stock}}</td>
                                <td>{{$med_supply->expiry_date}}</td>
                                <td>
                                    <a href="{{route('edit-medical-record', $med_supply->id, $med_types)}}" id="btn-record"><center><i class="far fa-edit"></i></center></a>
                                </td>
                                <td>
                                    <center><a href="" ><i class="far fa-eye"></i></a></center>
                                </td>
                                <td>
                                    <a href="{{route('archiveMedical', $med_supply->id)}}"><center><i class="fas fa-trash-alt"></i></center></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID Number</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Stock</th>
                                <th>Expiry Date</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>  
            </div>
        </div>


    </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
      $(".hamburger").click(function(){
        $(".wrapper").toggleClass("active")
      });
  </script>
@include('pages.clinic_staff.add-medical-supplies')
@stop