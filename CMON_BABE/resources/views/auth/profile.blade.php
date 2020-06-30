@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <form action="{{ route('upload_profile')}}" method="POST" role="form" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
              <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">
              </div>
          </div>
          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
              <div class="col-md-6">
                  <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
              </div>
          </div>
          <div class="form-group row">
              <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
              <div class="col-md-6">
                  <input id="profile_image" type="file" class="form-control" name="profile_image">
                  @if (auth()->user()->image)
                      <code>{{ auth()->user()->image }}</code>
                  @endif
              </div>
          </div>
          <div class="form-group row mb-0 mt-5">
              <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
          </div>
      </form>
    </div>
</div>
@endsection
