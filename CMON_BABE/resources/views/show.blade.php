@extends('layouts.main_layout')

@section('main_section')

  EMPLOYEE:  {{$employee["name"]}} {{$employee["last_name"]}}
  <br>
  LOCATIONS: <br>
  <ul>
    @foreach ($emplocations as $emplocation)
      <li>
        {{$emplocation["street"]}} --- {{$emplocation["city"]}} --- {{$emplocation["state"]}}<br>
      </li>
    @endforeach
  </ul>
  Tasks assigned:<br>
  <ul>
    @foreach ($employee_tasks as $task)
      <li>
        <b>{{$task["title"]}}</b><br>
        {{$task["description"]}}<br>
      </li><br>
    @endforeach

    <a href="{{route('edit_emp', $employee['id'])}}">Edit</a> <a href="{{route('delete_emp', $employee['id'])}}">Delete</a>
@endsection
