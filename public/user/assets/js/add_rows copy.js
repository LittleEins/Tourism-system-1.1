$(document).ready(function() {


  $(".add_item_btn").click(function(e) {
    // to stop the request
    e.preventDefault();

    // to show the feild row
    $("#show_item").prepend(`<div class="row">
    <div class="row">
      <div class="col-md-4 mb-3">
        <input type="text" name="first_name[]" class="form-control" placeholder="Fist Name" minlength="3" required>
      
      </div>
      <div class="col-md-4 mb-3">
        <input type="text" name="last_name[]" class="form-control" placeholder="Last Name" minlength="3" required>
      
      </div><div class="col-md-4 mb-3">
        <select name="gender[]" class="form-select" aria-label="Default select example" required>
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-3">
        <input type="number" name="contact[]" class="form-control" placeholder="Contact Number" maxlength="12">
      
      </div>
      <div class="col-md-6 mb-3">
        <input type="text" name="address[]" class="form-control" placeholder="Address" minlength="3" required>
        <input type="hidden" name="group_book" value="group">
      </div>
      <div class="col-md-2 mb-3 ml-3 d-grid">
        <button type="button" class="btn btn-danger remove_item_btn">Remove</button>
      </div>
    </div>
    <hr class="mt-2 mb-3"/>
  </div>`);

  });

  // to remove the row
  $(document).on('click','.remove_item_btn', function(e) {
    e.preventDefault();
    let row_item = $(this).parent().parent().parent();
    $(row_item).remove();
  });

});



    
