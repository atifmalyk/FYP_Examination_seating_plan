@include('components.header')
@include('components.sidebar')
<form method="post" action="/Admin/add-room" id="room-form">
    @csrf

    <div class="card">
        <div class="card-header">
            Student Sitting Plan
        </div>

        <div class="card-body">
            <h1 class="card-title">Add Room</h1>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <select name="building_id"  class="form-control col-md-4" id="building">
                            @php
                                $buildings = new \App\Models\BuildingModel();
                                $buildingList = $buildings->buildingList();
                            @endphp
                            <option value="">--Select Building--</option>
                            @foreach($buildingList as $id=>$building)
                            <option value="{{$id}}" >{{$building}}</option>
                            @endforeach
                        </select><br>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="room-no"><h4>Room No</h4></label>
                                <input class="form-control" name="room_no" value="" id="roomNo" type="text">
                            </div>
                            <div class="col-md-6">
                                <label for="room-no"><h4>Room Length</h4></label>
                                <input class="form-control" name="room_length" value="" id="roomLength" type="number" placeholder="In Feet">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="room-no"><h4>Room Width</h4></label>
                                <input class="form-control" name="room_width" value="" id="roomWidth" type="number" placeholder="In Feet">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="submit" name="addButton" id="addButton" class="btn btn-primary" value="Add Room">
                                @csrf
                            </div>
                        </div>


</form>
<div id="display"></div>

    <table id="table"></table>

<div class="container mt-4">
    <table class="table table-striped table-hover" id="myTable">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Room No</th>
            <th>Room Length</th>
            <th>Room Width</th>
            <th>Created By</th>
            <th>Building Name</th>
            <th>Created At</th>
            <th>Last Updated At</th>
            <th>Last Updated By</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        {{$sr=1}}
        @foreach($rooms as $room)

            <tr>

                <td>{{$sr++}}</td>
                <td>{{$room->room_no}}</td>
                <td>{{$room->room_length}}</td>
                <td>{{$room->room_width}}</td>
                <td>{{$room->created_by_id}}</td>
                <td>{{$room->building_name}}</td>
                <td>{{$room->created_at}}</td>
                <td>{{$room->updated_at}}</td>
                <td>{{$room->last_updated_by_id}}</td>


                <td class="d-flex ">

                    <i class="btn fa fa-trash text-white bg-danger delete mr-2" id="deleted" data-dep_id="" ></i>
                    <a href=""><i class="btn fa fa-pencil text-white bg-success edit"></i></a>
{{--                     This generates the URL for the edit page using--}}
{{--                     Laravel's route() helper function. The route() function maps the departments.edit named route to a URL that--}}
{{--                      includes the department ID as a parameter. The department ID is passed as the second parameter to the route()--}}
{{--                       function.--}}

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
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
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
<script>

    $(document).ready(function() {
        $('#building').on('change', function() {
            var buildingID = $(this).val();

            if (buildingID) {
                var roomNo = $('#roomNo').val();
                var roomLength = $('#roomLength').val();
                var roomWidth = $('#roomWidth').val();

                $.ajax({
                    url: '/Admin/add-room',
                    type: 'post',
                    data: {
                        building_id : buildingID,
                        room_no: roomNo,
                        room_length: roomLength,
                        room_width: roomWidth
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        window.location.href = '/Admin/add-room';
                    }
                });
            }
        });
    });

</script>

@include('components.script')

<script>
    debugger
    const roomWidthInput = document.getElementById('roomWidth');
    const roomLengthInput = document.getElementById('roomLength');
    const displayElement = document.getElementById('display');

    const addButton = document.getElementById('addButton');
    addButton.addEventListener('click', () => {
        const roomLength = roomLengthInput.value;
        const roomWidth = roomWidthInput.value;
        var totalSpace = (roomLength * roomWidth) ;
        var eachStudentSpace = 25;

        var totalNumberOfStudents = Math.floor(totalSpace / eachStudentSpace);

        localStorage.setItem('roomCapacity', totalNumberOfStudents);

        // Create a table with rows and columns based on the room width and total number of students
        var table = document.createElement('table');
        var tbody = document.createElement('tbody');

        var numColumns = Math.floor(roomWidth / 5); // Assuming each student needs 5 sq ft of space
        var numRows = Math.ceil(roomLength/5);
        var studentCount = 0;
        for (var i = 0; i < numRows; i++) {
            var tr = document.createElement('tr');
            for (var j = 0; j < numColumns; j++) {
                var td = document.createElement('td');
                if (studentCount < totalNumberOfStudents) {
                    td.textContent = `Student ${studentCount + 1}`;
                }
                tr.appendChild(td);
                studentCount++;
            }
            tbody.appendChild(tr);
        }
        table.appendChild(tbody);
        displayElement.innerHTML = '';
        displayElement.appendChild(table);

        // Store the table data in localStorage
        var tableData = displayElement.innerHTML;
        localStorage.setItem('tableData', tableData);
    });



</script>



</body>
</html>
