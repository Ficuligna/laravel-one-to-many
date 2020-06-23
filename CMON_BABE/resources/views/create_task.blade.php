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


  <form action="{{route('store_task')}}" method="post">
    @csrf
    @method("POST")

    <label for="title">TITLE</label>
    <input type="text" name="title" value=""> <br>

    <label for="description">DESCRIPTION</label>
    <input type="text" name="description" value=""> <br>

    <label for="employee_id">EMPLOYEE</label>
    <select name="employee_id">
      @foreach ($employees as $employee)
        <option value="{{$employee['id']}}">
          {{$employee['name']}} {{$employee['last_name']}}
        </option>

      @endforeach

    </select><br>

    <input type="submit" name="" value="Assign">
@endsection
