$(document).ready(function () {
 
    // allowed maximum input fields
    var max_input = 5;
 
    // initialize the counter for textbox
    var x = 1;
 
    // handle click event on Add More button
    $('.add-btn').click(function (e) {
      e.preventDefault();
      if (x < max_input) { // validate the condition
        x++; // increment the counter
        $('.wrapper').append(`
            <div class="input-box row mt-2">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="siblingComplete_name" class=""><b>Sibling's Complete Name</b></label>
                        <input type="text" class="form-control" name="siblingComplete_name" oninput="this.value = this.value.toUpperCase()">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="siblingAge" class=""><b>Age</b></label>
                        <input type="text" class="form-control" name="siblingAge">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="siblingSex" class=""><b>Gender</b></label>
                        <input type="text" class="form-control" name="siblingSex">
                    </div>
                </div>
                <div class="col-md-1 mt-4">
                    <a href="#" class="remove-lnk"><i class="fas fa-times-circle"></i></a>
                </div>
            </div>
        `); // add input field
      }
    });
 
    // handle click event of the remove link
    $('.wrapper').on("click", ".remove-lnk", function (e) {
      e.preventDefault();
      $(this).closest('.input-box').remove();  // remove input field
      x--; // decrement the counter
    })
 
  });