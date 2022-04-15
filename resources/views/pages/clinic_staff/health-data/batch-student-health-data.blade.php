<div class="batch-student-health-data">
    <div class="col-md-6 offset-md-3 mt-5 rounded" id="create-batch-student-health-data" style="background-color: white;">
        <form action="{{route('student.import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Upload Batch Health Data</h3>
            <label for="file">Choose CSV File</label>
            <input type="file" id="img" name="file" class="form-control"><br>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>