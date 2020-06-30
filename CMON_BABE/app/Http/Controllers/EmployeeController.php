<?php

namespace App\Http\Controllers;

  use App\Task;
  use App\Employee;
  use App\Location;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{

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
