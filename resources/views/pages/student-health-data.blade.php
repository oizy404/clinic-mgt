@extends('layout.master')

@section('title')
    STUDENT HEALTH DATA
@stop

@section('content')
@include('shared.admin-header')
@include('shared.admin-sidenav')

<div class="content">
    <div class="hlth-dashboard">
        <div class="offset-md-1 health-data-addbtn">
            <div class="col-md-4">
                <button class="btn" id="btn-data"><i class="fas fa-plus"></i> Add Health Datum</button><br>
                <button class="btn" id="btn-batchdata"><i class="fas fa-plus"></i> Add Batch Health Data</button>
            </div>    
            <div class="col-md-4 offset-md-3 hlth-dta">
                <h3>STUDENT HEALTH DATA</h3>
            </div>
        </div>
        <div class="offset-md-1 health-data">
            <table id="health-data" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Date Recorded</th>
                        <th>Edit</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tbl_students as $tbl_student)
                    <tr>
                        <td>{{$tbl_student->id}}</td>
                        <td>{{$tbl_student->first_name}}</td>
                        <td>{{$tbl_student->last_name}}</td>
                        <td>{{$tbl_student->created_at}}</td>
                        <td><i class="far fa-edit"></i></td>
                        <td><i class="far fa-eye"></i></td>
                        <td><i class="fas fa-trash-alt"></i></td>
                    </tr>
                @endforeach
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
@include('pages.add-student-health-data')
@include('pages.batch-student-health-data')
@stop

