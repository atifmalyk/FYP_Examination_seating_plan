
<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<section class="h-100 ">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                 alt="Sample photo" class="img-fluid"
                                 style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black">
                                <h3 class="mb-5 text-uppercase">Register</h3>

                                <div class="row">
                                    <form method="post" action="/Student/register">
                                    <div class="col-md-12 mb-4">
                                        <div class="form form-outline">
                                            @csrf
                                            <label class="form-label" for="name">First name:</label>

                                            <input type="text" id="name"  name="std_name" class="form-control form-control-lg" placeholder="Enter Your Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            @csrf
                                            <label class="form-label" for="std_rollNo">Roll No:</label>

                                            <input type="text" id="rollNo"  name="std_rollNo" class="form-control form-control-lg" placeholder="Enter Your Roll No" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <select name="department" class="form-control" id="department">
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
                                                @endphp
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


                                        </div>
                                    </div>

                                    </div>

                            <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="program">Programs</label>
                                    <select name="program" class="form-control" id="program" >
                                      @php
                                          $programs = new \App\Models\StdProgram();
                                                      $programList = $programs->programList();
                                      @endphp
                                        <option value="">--Select Program--</option>
                                        @foreach($programList as $id => $program)

                                            <option value="{{ $id }}">{{ $program }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                        <div class="form-outline mb-4">
                                    @csrf
                                    <label class="form-label" for="std_address">Address</label>

                                    <input type="text" id="address" name="std_address" class="form-control form-control-lg" />
                                </div>

                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                    <h6 class="mb-0 me-4">Gender: </h6> &nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        @csrf
                                        <input class="form-check-input" type="radio" name="std_gender" id="maleGender"
                                               value="Male" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        @csrf
                                        <input class="form-check-input" type="radio" name="std_gender" id="femaleGender"
                                               value="Female" />
                                        <label class="form-check-label" for="std_gender">Female</label>
                                    </div>



                                    <div class="form-check form-check-inline mb-0">
                                        @csrf
                                        <input class="form-check-input" type="radio" name="std_gender" id="otherGender"
                                               value="Other" />
                                        @csrf
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>

                                </div>




                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="std_semester">Semester</label>
                                    <select class="form-control" id="std_semester" name="std_semester">
                                        <option>Select Semester</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="std_section">Section</label>
                                    <select class="form-control" id="std_section" name="std_section">
                                        <option>Select Section</option>
                                        <option>Morning A</option>
                                        <option>Morning B</option>
                                        <option>Morning C</option>
                                        <option>Evening A</option>
                                        <option>Evening B</option>
                                        <option>Evening C</option>

                                    </select>
                                </div>
                            </div>

                                <div class="form-outline mb-4">
                                    @csrf
                                    <label class="form-label" for="std_contact">Contact:</label>

                                    <input type="text" id="std_contact" name="std_contact" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    @csrf
                                    <label class="form-label" for="std_email">Email ID:</label>

                                    <input type="text" id="std_email" name="std_email" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    @csrf
                                    <label class="form-label" for="creation_date_time">Registerd On:</label>

                                    <input type="date" id="creation_date_time" name="created_at" class="form-control form-control-lg" />
                                </div>

                                <div class="d-flex justify-content-end pt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
        $(document).ready(function() {
            $('#department').on('change', function() {
                var depId = $(this).val();

                if (depId) {
                    $.ajax({
                        // "+" concatinate
                        url: '/getPrograms/' + depId,
                        type: "GET",
                        dataType: "json",
                        // In the provided code, "data" refers to the response data that is received from the server as a result of the AJAX request.
                        // The response data is usually in JSON format,
                        // which is the expected data type in this case as specified by the "dataType" parameter in the AJAX request.
                        success:function(data) {
                            console.log(data);
                            // $('#program').empty(); is a jQuery function that is used to remove all child elements from the HTML element that has an ID of "program".
                            // In this specific code block, this function is used to clear any previously selected options in the "program" dropdown list before adding
                            // new options based on the response data received from the server.
                                // This function essentially resets the "program" dropdown list so that it can be
                                // populated with fresh options based on the current selection made in the "department"
                                // dropdown list.
                            $('#program').empty();
                            $('#program').append('<option value="">Select a program</option>');
                            $.each(data, function(key, value) {
                                $('#program').append('<option value.pg_id="'+ key +'">'+ value.pg_name +'</option>');

                            });
                        }
                    });
                } else {
                    $('#program').empty();
                }
            });
        });

</script>
</body>
</html>
