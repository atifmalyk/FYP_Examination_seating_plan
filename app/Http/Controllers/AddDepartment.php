 <?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Model_AddDepartment;


class AddDepartment extends Controller{


    public function addDepart(){
        $departments=Model_AddDepartment::all();

        return view('Admin.addDepartment',['departments'=>$departments]);
    }
    public function addDepartmentSubmit(Request $request)
    {
        //Here are the step-by-step process of how the form submission works in Laravel:
        //
        //When the user clicks the "Add Department" button, the form data is submitted to the server using the POST method.
        //
        //The form data is sent to the URL defined by the departments.add route.
        //
        //The addDepartmentSubmit method in the AddDepartment controller is executed. This method accepts an instance of the Illuminate\Http\Request class as a parameter.
        //
        //The controller method retrieves the value of the dep_name input field from the request using the input method of the Request object.
        //
        //The created_date_time is generated using the now() function.
        //
        //The controller method inserts the department name and created_date_time into the std_departments database table using the DB facade's table method and insert method.
        //
        //The method returns a redirect response that redirects the user back to the previous page with a success message. The with method is used to add a message to the session data, which can be retrieved in the view.
        //
        //When the page is reloaded, the success message is displayed to the user.
        //
        //That's how the form submission process works in Laravel
        $dep_name = $request->input('dep_name');
//        $created_by_id = Auth::user()->id;
        $created_date_time = now();
//        $last_updated_by_id = Auth::user()->id;
//        $last_update_date_time = now();
        DB::table('std_departments')->insert([
            'dep_name' => $dep_name,
//            'created_by_id' => $created_by_id,
            'created_date_time' => $created_date_time,
//            'last_updated_by_id' => $last_updated_by_id,
//            'last_update_date_time' => $last_update_date_time
        ]);

        return back()->with('success', 'Department added successfully!');
    }
    public function deleteDepartment($dep_id){

        DB::table('std_departments')->where('dep_id',$dep_id)->Delete();
//        return back()->with('success', 'Department delted successfully!');

    }
    public function editDepartment($dep_id)
    {
        //        public function editDepartment($dep_id): This is a controller method that expects a parameter
//$dep_id, which is the ID of the department to be edited. The parameter is passed in via the route definition
// as a URL parameter.
//$department = Model_AddDepartment::find($dep_id): This line of code retrieves the department from the database
// using the ID provided in the $dep_id parameter. It uses the find() method to retrieve a single record by its ID.
// If no department is found with that ID, the method will return null.
//return view('Admin.updateDepart', ['department' => $department]): This line of code returns a view called
// Admin.updateDepart, passing in an array of data that includes the $department variable. The view() method
// is a helper function provided by Laravel for rendering views. In this case, it will render the updateDepart
// view file and pass the $department variable to that view. The view file can then use this variable to pre-fill
// the edit form with the department's current values.
//Overall, this function retrieves a department from the database by its ID, and then passes it to a view to render
// an edit form for that department. The view can then use the data passed to it to pre-fill the form fields with
// the department's current values.
        $department = Model_AddDepartment::find($dep_id);
        return view('Admin.updateDepart', ['department' => $department]);
    }
    public function updateDepartment(Request $request, $dep_id)
    {

        $department = Model_AddDepartment::findOrFail($dep_id);

        $department->dep_name = $request->input('dep_name');
//        $department->last_update_date_time = now();

        $department->save();

        return redirect()->route('departments.add')->with('success', 'Department updated successfully!');
    }
}
