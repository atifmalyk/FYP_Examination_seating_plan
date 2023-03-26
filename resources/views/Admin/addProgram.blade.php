@include('components.header')
@include('components.sidebar')
<form id="form" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            Student Sitting Plan
        </div>
        <div class="card-body">
            <h5 class="card-title">Add Program</h5>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <select name="department"  class="form-control col-md-4" id="department">
                            @php
        //    The code you provided is instantiating an object of the StdDepartment model class.

         //In Laravel, you can interact with a database table using a model class.
       // The code $departments = new \App\Models\StdDepartment; creates a new instance of the StdDepartment model class,
        // which represents the std_departments table in the database.
         //This object can be used to retrieve data from the table, create new records,
        // update existing records, and delete records, among other things. For example,
         // you can call the departmentList method on this object to retrieve the list of departments,
                                // as shown in the previous code:
                                                                                        $departments = new \App\Models\StdDepartment;
                                                                                        $departmentList = $departments->departmentList();
    //                            @endphp
                            <option value="">--Select Department--</option>
                            {{--//@foreach($departmentList as $id => $department) - This is a loop that iterates over the $departmentList array.
                            For each department, it creates an <option> tag with the department name as the display text and the department
                             ID as the value attribute.--}}
                            {{--<option value="{{ $id }}">{{ $department }}</option> -
                             This line creates an <option> tag for each department in the $departmentList array. T
                             he value attribute is set to the department ID and the text inside the tag is set to the department name.--}}


                            @foreach($departmentList as $id => $department)

                                <option value="{{ $id }}">{{ $department }}</option>
                            @endforeach
                        </select>
                        <label for="program">Program Name</label>
                        <input class="form-control col-md-4" value="" name="pg_name" type="text" id="programName">

                    </div>
                </div>

            </div>@csrf
            <br>
            <input type="submit" name="addProgram" id="addProgram" class="btn btn-primary" value="Add Program">
        </div>
    </div>
</form>
<div class="container mt-4">
    <table class="table table-striped table-hover" id="myTable">
        <thead>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Delete/Update</th>
        </tr>
        </thead>

        <tbody>

            <tr>
<?php
    $sr=1;
    ?>
                @foreach ($programs as $program)
                <td>{{$sr++}}</td>
                <td>{{ $program->pg_name }}</td>
                <td>{{ $program->dept_id }}</td>
                <td>
                    <i class="btn fa fa-trash text-white bg-danger delete" data-id="{{$program->pg_id}}"></i>
                    <a href=""><i class="btn fa fa-pencil text-white bg-success edit"></i></a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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

{{--    for adding the program related to the selected department--}}
    $(document).ready(function() {
        $('#department').on('change', function() {
            var depId = $(this).val();


            if (depId) {
                var programName = $('#programName').val(); // Get the program name entered by the user
                $.ajax({
                    url: '/Admin/add-program',
                    type: "POST",
                    data: {
                        id: depId,
                        pg_name: programName
                    },
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        window.location.href = '/Admin/add-program';

                    }
                });
            }
        });
    });

</script>
<script>
{{--    for showing Datatables on page--}}
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
{{--for deleting the selected program--}}
<script>
    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        var program_id = $(this).data('id');

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
                    url: "{{ url('/Admin/add-program/') }}/"+program_id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        swal.fire({
                            title: 'Deleted!',
                            text: 'Program has been deleted.',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = window.location.href;
                            }
                        });
                    },
                    error: function () {
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
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</body>
</html>
