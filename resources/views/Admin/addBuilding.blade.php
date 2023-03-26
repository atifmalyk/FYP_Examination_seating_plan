@include('components.header')
@include('components.sidebar')

<form method="post" action="/Admin/add-building">
    @csrf
    <div class="card">
        <div class="card-header">
            Student Sitting Plan
        </div>
        <div class="card-body">
            <h5 class="card-title">Add Building</h5>
            <p class="card-text"></p>
            <label for="building_name">Building Name</label><br>
            <input class="form-control col-md-4" name="building_name" value="" id="building_name" type="text">
            <label for="building_address">Building Address</label><br>
            <input class="form-control col-md-4" name="building_address" value="" id="building_address" type="text">
            <label for="building_contact">Building Contact</label><br>
            <input class="form-control col-md-4" name="building_contact" id="building_name" type="text">

            @csrf
            <br>
            <input type="submit" name="addButton" id="addButton" class="btn btn-primary" value="Add Room">
        </div>
    </div>
</form>

<div class="container mt-4">
    <table class="table table-striped table-hover" id="myTable">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Building Name</th>
            <th>Building Contact</th>
            <th>Building Address</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Last Updated At</th>
            <th>Last Updated By</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        {{$sr=1}}
        @foreach($buildings as $building)

            <tr>

                <td>{{$sr++}}</td>
                <td>{{$building->building_name}}</td>
                <td>{{$building->building_contact}}</td>
                <td>{{$building->building_address}}</td>
                <td>{{$building->created_by_id}}</td>
                <td>{{$building->created_at}}</td>
                <td>{{$building->updated_at}}</td>
                <td>{{$building->last_updated_by_id}}</td>



                <td>



                    <i class="btn fa fa-trash text-white bg-danger delete" id="deleted" data-dep_id="" ></i>
                    <a href=><i class="btn fa fa-pencil text-white bg-success edit"></i></a>
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





{{--cdns--}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
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

@include('components.script')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</body>
</html>

