<div class="appoint-patient" id="dialog3" style="display: none;">
    <div class="col-md-6 offset-md-3 mt-5">
        <div class="card rounded">
            <div class="card-header bg-primary text-white">
                <h4>Search Patient</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" style="width:100%" id="health-data">
                    <thead>
                        <tr>
                            <th style="display:none">ID</th>
                            <th class="bg-info text-dark">User ID</th>
                            <th class="bg-info text-dark">Name</th>
                            <th class="bg-info text-dark">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr class="patientsData">
                            <td style="display: none">{{$patient->id}}</td>
                            <td>{{$patient->user_id}}</td>
                            <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                            <td>{{$patient->patient_role}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger" id="apt-patient-cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>