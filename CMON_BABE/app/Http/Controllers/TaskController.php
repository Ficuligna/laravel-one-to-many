<?php

namespace App\Http\Controllers;
use App\Task;
use App\Employee;
use App\Location;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

      $list = Task::all();

      return view("home", compact("list"));
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
      return redirect() -> route("home");
    }

    public function delete($id){
      Task::findOrFail($id) -> delete();
      return redirect() -> route("home");
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

      return redirect() -> route("home") ->with('status', 'Task ' . $newTask["title"] ." created!");
    }

    public function show($id){
      $locations = Location::all();
      $tasks = Task::all();
      $employee = Employee::findOrFail($id);

      $emplocations=[];
      foreach ($locations as $location) {
        foreach ($employee -> locations as $employetion) {
          if ($employetion -> id == $location -> id) {
            $emplocations[] = $location;
          }
        }
      }
      $employee_tasks = [];
      foreach ($tasks as $task) {
        if ($task["employee_id"] == $id) {
          $employee_tasks[]= $task;
        }
      }
      return view("show", compact("employee_tasks" , "employee","emplocations"));
    }


}
