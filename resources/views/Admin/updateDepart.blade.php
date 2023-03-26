@include('components.header')
@include('components.sidebar')
{{--Load the department edit form: Navigate to the URL for the departments.edit route,
which should include the dep_id parameter for the department to be edited. This will load the edit form for the
department.

Make changes to the department data: Update the department data in the edit form as needed.
 The form will likely include an input field for the department name.

Submit the form: When you are finished making changes, submit the form.
 This will send a PUT request to the departments.update route with the updated data.

Update the department record: The updateDepartment() method in the controller will receive
 the PUT request and update the corresponding department record in the database.
  The method will retrieve the department record using the findOrFail() method, which will
  throw an exception if the record cannot be found. The method will then update the department name based
  on the input from the edit form and save the record.

Redirect to the departments add page: After the record has been updated, the updateDepartment()
 method will redirect the user to the departments add page using the redirect() method and the departments
 .add route. The method will also include a success message using the with() method, which can be displayed on
  the add page to indicate that the update was successful.--}}
{{--  <--Load the department edit form: Navigate to the URL for the departments.edit route,--}}
{{--  which should include the dep_id parameter for the department to be edited. This will load the edit form for--}}
{{--  the department.-->--}}


{{--<form action="{{ route('departments.update', $department->dep_id) }}" method="POST">:
 This is a HTML form element that specifies the action and method of the form. The action
  attribute is set to the route name departments.update, which is the route that handles
  updating a department record. The $department->dep_id variable is used to specify the
  ID of the department being updated, which is passed as a parameter in the route definition.
   The method attribute is set to POST, which is the HTTP method used to submit the form data to the server.
@method('PUT'): This is a Blade directive that generates a hidden input field in the form.
The hidden input field contains the value of the PUT HTTP method. This is used to override the default POST method
used by the HTML form, allowing us to use the PUT method for updating the department record. Laravel automatically
maps the PUT method to the updateDepartment() method in the AddDepartment controller, which handles updating the
department record in the database.
<input type="text" name="dep_name" value="{{ $department->dep_name }}">: This is an input field that allows the
 user to update the department name. The name attribute is set to dep_name, which is the name of the database
 column that stores the department name. The value attribute is set to {{ $department->dep_name }}, which is a Blade directive that outputs the current department name as the default value of the input field. This pre-fills the input field with the current value, allowing the user to easily edit it.
<button type="submit">Update</button>: This is a submit button that allows the user to submit the form data
 to update the department record. When the user clicks this button, the form data is sent to the server,
  which updates the department record in the database.--}}
  <form action="{{ route('departments.update', $department->dep_id) }}" method="POST">
      @method('PUT')
      @csrf
      <div class="container">
      <div class="card ">
          <div class="card-body">
          <div class="card-header">Student Sitting Plan</div><BR>
          <label for="dep_name"><h5>Update Name</h5></label>
          <input class="form-control col-md-4" type="text" id="dep_name" name="dep_name" value="{{ $department->dep_name }}" required> <br>
          <button class="btn btn-primary col-md-2" type="submit">Update</button>
      </div>
      </div>
  </div>
  </form>
  </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      $(document).ready(function() {
          $('form').submit(function(event) {
              // Prevent the default form submission behavior
              event.preventDefault();

              // Submit the form data using AJAX
              $.ajax({
                  url: $(this).attr('action'),
                  type: 'POST',
                  data: $(this).serialize(),
                  success: function(response) {

                      // Show a Sweet Alert with the success message
                      Swal.fire(
                          'Success!',
                          'Department updated successfully.',
                          'success'
                      )

                      // Redirect to the add department page after 2 seconds
                      setTimeout(function() {
                          window.location.href = "{{ route('departments.add') }}";
                      }, 2000);
                  },
                  error: function(xhr) {
                      // Show a Sweet Alert with the error message
                      Swal.fire(
                          'Error!',
                          'An error occurred while updating the department.',
                          'error'
                      );
                  }
              });
          });
      });


  </script>
  @include('components.script')
  </body>
</html>
