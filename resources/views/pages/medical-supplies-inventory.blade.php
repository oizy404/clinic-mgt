@extends('layouts.master')

@section('title')
    MEDICAL SUPPLIES INVENTORY
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav')

<div class="content">
    <div class="supplies-inventory-dashboard">
        <div class="offset-md-1 supplies-inventory-addbtn">
            <div class="col-md-4">
                <button class="btn" id="btn-item"><i class="fas fa-plus"></i> Add Item</button><br>
            </div>    
        </div>
        <div class="offset-md-1 supplies-inventory">
            <table id="supplies-inventory" class="table table-hover" style="width:100%">
                <thead>
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
                </thead>
                <tbody>
                @foreach($med_supplies as $med_supply)
                    <tr>
                        <td>{{$med_supply->id}}</td>
                        <td>{{$med_supply->product_name}}</td>
                        <td>{{$med_supply->med_type->medicine_type}}</td>
                        <td>{{$med_supply->stock}}</td>
                        <td>{{$med_supply->expiry_date}}</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                        <td><i class="fas fa-trash-alt"></i></td>
                    </tr>
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
@include('pages.add-medical-supplies')
@stop