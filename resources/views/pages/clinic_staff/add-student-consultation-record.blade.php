<div class="student-consulation-record">
    <form action="">
        <!-- start of Student's School Info -->
        <div class="form-group">
            <label for="grade" class="form-label"><b>Grade School</b></label>
            <select name="grade" id="grade">
                <option value=""></option>
                <option value="Kinder">Kinder</option>
                <option value="Grade 1">Grade 1</option>
                <option value="Grade 2">Grade 2</option>
                <option value="Grade 3">Grade 3</option>
                <option value="Grade 4">Grade 4</option>
                <option value="Grade 5">Grade 5</option>
                <option value="Grade 6">Grade 6</option>
            </select>
        <div class="form-group">
            <label for="juniorHS" class="form-label"><b>Junior High School</b></label>
            <select name="juniorHS" id="juniorHS">
                <option value=""></option>
                <option value="Grade 7">Grade 7</option>
                <option value="Grade 8">Grade 8</option>
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
            </select>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="seniorHS" class="form-label"><b>Senior High School</b></label>
                <select name="seniorHS" id="seniorHS">
                    <option value=""></option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                </select><br>
                <label for="classSched" class="form-label"><b>Class Scedule</b></label>
                <select name="classSched" id="classSched">
                    <option value=""></option>
                    <option value="Day">Day</option>
                    <option value="Evening">Evening</option>
                </select>
            </div>
            <div class="col">
                <label for="academicYear" class="form-label"><b>Academic Year</b></label>
                <input type="text" class="form-control" name="academicYear">
            </div>
        </div>
        <div class="form-group">
            <label for="college" class="form-label"><b>Colleg</b></label>
            <select name="college" id="college">
                <option value=""></option>
                <option value="Year 1">Year 1</option>
                <option value="Year 2">Year 2</option>
                <option value="Year 3">Year 3</option>
                <option value="Year 4">Year 4</option>
            </select>
        </div>
        </div>
        <!-- end of Student's School Info -->
        <!-- start of Doctor's Note -->
        <div class="form-group">
            <label for="consultationDateTime" class="form-label"><b>Date & Time</b></label><br>
            <input type="datetime-local" id="consultationDateTime" name="consultationDateTime"><br>
            <label for="doctorsNote" class="form-label"><b>Doctor's Note</b></label><br>
            <textarea name="doctorsNote" id="doctorsNote" cols="70" rows="10"></textarea>
        </div>
        <!-- end of Doctor's Note -->
    </form>
</div>