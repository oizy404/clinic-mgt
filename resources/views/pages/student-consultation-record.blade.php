@extends('layout.master')

@section('title')
    STUDENT HEALTH DATA
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav')

<div class="content">
    {{session('rank')}}
    <div class="consultation-record-dashboard">
        <div class="offset-md-1 consultation-record-addbtn">
            <div class="col-md-4">
                <button class="btn" id="btn-record"><i class="fas fa-plus"></i> Add Consultation Datum</button><br>
                <button class="btn mt-1" id="btn-batchrecord"><i class="fas fa-plus"></i> Add Batch Consultation Record</button>
            </div>    
            <div class="col-md-5 offset-md-3 consultation-record">
                <h3>CONSULTATION RECORD</h3>
            </div>
        </div>
        <div class="offset-md-1 consultation-records">
            <table id="consultation-record" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Date Recorded</th>
                        <th>Edit</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1000804387</td>
                        <td>Lindsay William</td>
                        <td>Jan, 02, 2021</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>1000804387</td>
                        <td>Lindsay William</td>
                        <td>Jan, 02, 2021</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>1000804387</td>
                        <td>Lindsay William</td>
                        <td>Jan, 02, 2021</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>1000804387</td>
                        <td>Lindsay William</td>
                        <td>Jan, 02, 2021</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>1000804387</td>
                        <td>Lindsay William</td>
                        <td>Jan, 02, 2021</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                    </tr>
                    <tr>
                        <td>1000804387</td>
                        <td>Lindsay William</td>
                        <td>Jan, 02, 2021</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Date Recorded</th>
                        <th>Edit</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>
        </div>  
    </div>
</div>
@include('pages.add-consultation-record')
@stop
