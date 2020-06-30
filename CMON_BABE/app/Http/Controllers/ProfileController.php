<?php

namespace App\Http\Controllers;
use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Task;
use App\Employee;
use App\Location;
use App\User;
use App\Mail\ProfileMailable;

class ProfileController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function edit($id){

      $task = Task::findOrFail($id);
      $employees = Employee::all();

      return view("edit_task", compact("task", "employees"));
    }

    public function update(Request $request,$id){
      $validtate = $request -> validate([
        "title" => "required",
        "description" => "required",
        "employee_id" => "required"
      ]);
      Task::whereId($id) -> update($validtate);
      return redirect() -> route("home1");
    }

    public function delete($id){
      Task::findOrFail($id) -> delete();
      return redirect() -> route("home1");
    }

    public function create(){
      $employees = Employee::all();
      return view("create_task", compact("employees"));
    }

    public function store(Request $request){
      $validate = $request -> validate([
        "title" => "required",
        "description" => "required",
        "employee_id" => "required"
      ]);
      $newTask = new Task;

      $newTask -> title = $request -> title;
      $newTask -> description = $request -> description;
      $newTask -> employee_id = $request -> employee_id;

      $newTask -> save();

      return redirect() -> route("home1") ->with('status', 'Task ' . $newTask["title"] ." created!");
    }

    //---------

    public function delete_emp($id){

      $employee = Employee::findOrFail($id);
      $employee ->delete();

      return redirect() -> route("home1");
    }

    public function edit_emp($id){
      $employee = Employee::findOrFail($id);
      $locations = Location::all();
      return view('edit_emp', compact('employee', 'locations'));
    }
    public function update_emp(Request $request,$id){
      $validtate = $request -> validate([
        "locations" => "required|array"
      ]);
      $employee = Employee::findOrFail($id);
      $employee -> locations() -> sync($validtate['locations']);
      return redirect() -> route("home1");
    }
    public function edit_profile(){

      return view('auth.profile');
    }
    public function upload_profile(Request $request){

      $validate = $request -> validate([
        'name' => 'required',
        'profile_image' => 'required|image'
      ]);

      $user = User::findOrFail(auth()->user() -> id);
      $user -> name = $validate['name'];

       $image = $request->file('profile_image');
        $name = Str::slug($request->input('name')).'_'.time();
        $folder = '/uploads/images/';
        $ext = $image->getClientOriginalExtension();
        $filePath = $folder . $name. '.' . $ext;

        $image->storeAs($folder, $name.'.'. $ext, 'public');

        $user->profile_image = $filePath;
        $user -> save();

        Mail::to($request->user())->send(new ProfileMailable());

        return redirect() ->route('home1');
    }
}
