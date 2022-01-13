@extends('layout.master')

@section('title')
    STUDENT HEALTH DATA
@stop

@section('content')
@include('shared.admin-header')
@include('shared.supervisor-sidenav')

<div class="content">
    {{session('rank')}}
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
                @foreach($patients as $patient)
                    <tr>
                        <td>{{$patient->school_id}}</td>
                        <td>{{$patient->first_name}}</td>
                        <td>{{$patient->last_name}}</td>
                        <td>{{$patient->created_at}}</td>
                        <td><center><i class="far fa-edit"></i></center></td>
                        <td><center><i class="far fa-eye"></center></i></td>
                        <td><center><i class="fas fa-trash-alt"></center></i></td>
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

