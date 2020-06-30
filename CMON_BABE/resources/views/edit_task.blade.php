@extends('layouts.main_layout')

@section('main_section')

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form action="{{route('update_task', $task['id'])}}" method="post">
    @csrf
    @method("POST")

    <label for="title">TITLE</label>
    <input type="text" name="title" value="{{$task['title']}}"> <br><br>

    <label for="description">DESCRIPTION</label>
    <input type="text" name="description" value="{{$task['description']}}"> <br><br>

    <label for="employee_id">EMPLOYEE</label>
    <select name="employee_id">
      @foreach ($employees as $employee)
        <option value="{{$employee['id']}}"
        @if ($employee["id"] == $task -> employee -> id)
          selected
        @endif
        >
          {{$employee['name']}} {{$employee['last_name']}}
        </option>
      @endforeach

    </select><br><br>

    <input type="submit" name="" value="Update">

  </form>
@endsection
