@extends('layouts.main_layout')

@section('main_section')

  EMPLOYEE:  {{$employee["name"]}} {{$employee["last_name"]}}
  <br>
  LOCATIONS: <br>

  <form action="{{route('update_emp', $employee['id'])}}" method="post">
    @csrf
    @method("POST")

    <label for="locations[]"></label>
      @foreach ($locations as $location)
        <input type="checkbox" name="locations[]" value="{{$location -> id}}"

        @foreach ($employee -> locations as $emp_location)

          @if ($location -> id == $emp_location -> id)
            checked
          @endif

        @endforeach
        >{{$location -> street}}<br>
      @endforeach
      <input type="submit" name="" value="Update">
  </form>

@endsection
