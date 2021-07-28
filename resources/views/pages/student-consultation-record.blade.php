@extends('layout.master')

@section('title')
    STUDENT HEALTH DATA
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav')

<div class="content">
    <div class="std-hlth-dashboard">
        <div class="offset-md-1 health-data-addbtn">
            <div class="col-md-4">
                <button class="btn" id="btn-data"><i class="fas fa-plus"></i> Add Health Datum</button><br>
                <button class="btn" id="btn-batchdata"><i class="fas fa-plus"></i> Add Batch Health Data</button>
            </div>    
            <div class="col-md-4 offset-md-3 student-dta">
                <h3>STUDENT HEALTH DATA</h3>
            </div>
        </div>
        <div class="offset-md-1 student-health-data">
            <table id="student-data" class="table table-hover" style="width:100%">
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
@include('pages.add-student-consultation-record')
@stop
