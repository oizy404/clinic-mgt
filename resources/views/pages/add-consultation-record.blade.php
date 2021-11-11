<div class="add-consultation-record">
    <div class="panel-heading col-md-8 offset-md-2 mt-3 rounded">
        <div class="col-md-1">
            <a href="#" id="btn-cancel" style="float:left; color: red;"><i class="fas fa-times-circle"></i></a>
        </div>
        <div class="col-md-5 offset-md-7 p-head">
            <h4 class="mb-0">CONSULTATION FORM</h4>
            <!-- <small>STUDENT</small> -->
        </div>
    </div>
    <div class="col-md-8 offset-md-2 rounded" id="add-consultation-record">
        <form action=" " method="post">
            @csrf
            @method('post')
            <div class="form-group" id="health-evaluation" style="background-color: white;">
                <div class="col-md-2 form-group">
                    <label for="idnumber" class=""><b>ID Number</b></label>
                    <input type="text" class="form-control" name="idnumber">
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="height" class=""><b>Height</b></label>
                            <input type="text" class="form-control" name="height">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="weight" class=""><b>Weight</b></label>
                            <input type="text" class="form-control" name="weight">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="bmi" class=""><b>Body Mass Index</b></label>
                            <input type="text" class="form-control" name="bmi">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="bloodpressure" class=""><b>Blood Pressure(BP)</b></label>
                            <input type="text" class="form-control" name="bloodpressure">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="doctorsNotes" class=""><b>Doctor's Notes</b></label>
                    <textarea class="form-control" name="doctorsNotes" id="doctorsNotes" cols="10" rows="4"></textarea>
                </div>
            </div>
            <button type="submit" class="btn" id="btn-add-consultation">Add</button>
        </form>
    </div>
</div>