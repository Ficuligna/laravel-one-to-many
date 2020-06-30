<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

      $list = Task::all();

      return view("home1", compact("list"));
    }



}
