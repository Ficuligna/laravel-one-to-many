<div class="">
  @if (Route::has('login'))
    <div class="top-right links">
      @auth

        <a href="{{url('/home')}}"> Home </a>
        <a href="{{route("profile_edit")}}">
         {{ Auth::user()->name }} <span class="caret"></span>
         <img src="{{ asset(auth()->user()->profile_image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
        </a>
      @else
        <a href="{{route('login')}}">Login</a>

        @if (Route::has('register'))
          <a href="{{route('register')}}">Register</a>

        @endif
      @endauth

    </div>

  @endif</div>
