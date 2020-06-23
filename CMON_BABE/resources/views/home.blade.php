@extends('layouts.main_layout')

@section('main_section')

  @if (session('status'))
    <div class="alert alert-success">
      <h2>
        {{ session('status') }}
      </h2>
    </div>
@endif

<a href="{{route('create_task')}}"><h2>Assign new task</h2></a>
  <ul>

    @foreach ($list as $task)
      <li>
        TASK TITLE: <b>{{$task["title"]}}</b><br>
        TASK DESCRIPTION: <b>{{$task["description"]}}</b><br>
        EMPLOYEE: <a href="{{route('show_all_tasks', $task -> employee -> id)}}">
          <b>{{$task -> employee -> name}} {{$task -> employee -> last_name}}</b>
        </a> <br>
        <a href="{{route('edit_task', $task['id'])}}">Edit</a> <a href="{{route('delete_task', $task['id'])}}">Delete</a>
        <br><br>

      </li>
    @endforeach
  </ul>
@endsection
