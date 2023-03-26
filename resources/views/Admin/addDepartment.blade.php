@include('components.header')
@include('components.sidebar')

<form id="form" method="post" action="{{route('departments.add')}}">
    @csrf
    <div class="card">
        <div class="card-header">
            Student Sitting Plan
        </div>
        <div class="card-body">
            <h5 class="card-title">Add Department</h5>
            <p class="card-text"></p>
            @csrf
{{--            when you submit the form data to the server using the POST method,--}}
{{--            the department name specified in the dep_name input field will be sent to the server--}}
{{--            as a key-value pair in the request body.--}}
{{--            The key will be dep_name, which corresponds to the name attribute of the input field,--}}
{{--            and the value will be the value entered in the input field by the user.--}}
            <input class="form-control col-md-4" name="dep_name" value="" id="addDepart" type="text">
            @csrf
            <br>
            <input type="submit" name="addButton" id="addButton" class="btn btn-primary" value="Add Department">
        </div>
    </div>
</form>
<div class="container mt-4">
    <table class="table table-striped table-hover" id="myTable">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Department Name</th>
            <th>Created By</th>
            <th>Created On</th>
            <th>Last Updated By</th>
            <th>Last Updated On</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        {{$sr=1}}
         @foreach($departments as $department)

        <tr>

            <td>{{$sr++}}</td>
            <td>{{$department->dep_name}}</td>
            <td>{{$department->created_by_id}}</td>
            <td>{{$department->created_date_time}}</td>
            <td>{{$department->last_updated_by}}</td>
            <td>{{$department->updated_at}}</td>
            <td>



             <i class="btn fa fa-trash text-white bg-danger delete" id="deleted" data-dep_id="{{$department->dep_id}}" ></i>
               <a href={{ route('departments.edit', $department->dep_id) }}><i class="btn fa fa-pencil text-white bg-success edit"></i></a>
{{-- This generates the URL for the edit page using--}}
{{-- Laravel's route() helper function. The route() function maps the departments.edit named route to a URL that--}}
{{--  includes the department ID as a parameter. The department ID is passed as the second parameter to the route()--}}
{{--   function.--}}

                </form>
            </td>


        </tr>

        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"</script>
<script src="https://cdn.datatables.net/buttons/1.13.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.bootstrap4.min.js"</script>
<script src="https://cdn.jsdelivr.net/npm/jszip@3.2.2/dist/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.58/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.58/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"</script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script>$(document).ready(function() {
        $('#form').submit(function(event) {
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
                        'Department added successfully.',
                        'success'
                    );

                    // Clear the input field value
                    $('#addDepart').val('');

                    // Reload the page after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    // Show a Sweet Alert with the error message
                    Swal.fire(
                        'Error!',
                        'An error occurred while adding the department.',
                        'error'
                    );
                }
            });
        });
    });

</script>
<script>
    //This line of code is part of the AJAX request in the JavaScript code. It constructs the URL for the AJAX request
    // by replacing the :dep_id placeholder in the route definition with the actual dep_id value retrieved from the data
    // attribute of the clicked button.
        $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var dep_id = $(this).data('dep_id');
        swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
        url: "{{ url('/Admin/add-department/') }}/" + dep_id,
        type: 'DELETE',
        data: {
        _token: '{{ csrf_token() }}'
    },
        success: function(data) {
        swal.fire({
        title: 'Deleted!',
        text: 'Department has been deleted.',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
        window.location.reload();

    }
    });
    },
        error: function() {
        swal.fire({
        title: 'Oops...',
        text: 'Something went wrong!',
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
    }
    });
    }
    });
    });
</script>
@include('components.script')
</body>
</html>
