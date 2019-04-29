@extends('layout')

@section('title', 'Sign Up')

@section('main')
  <h1 class="text-center">Sign Up</h1>
  <p class="text-center">Already have an account? Please <a href="/login">Login</a></p>
  <form method="post">
    @csrf
    <div class="col-9" style="margin: 0 auto">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" value="{{old('name')}}">
        <small class="text-danger">{{$errors->first('first_name')}}</small>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" value="{{old('last_name')}}">
        <small class="text-danger">{{$errors->first('last_name')}}</small>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
        <small class="text-danger">{{$errors->first('email')}}</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}">
        <small class="text-danger">{{$errors->first('password')}}</small>
      </div>
    
      <div class="form-group">
        <label for="org_name">Organization</label>
        <input type="text" id="org_name" name="org_name" class="form-control" value="{{old('org_name')}}">
        <small class="text-danger">{{$errors->first('org_name')}}</small>
      </div>
      <div class="form-group">
        <label for="description">Organization Description</label>
        <input type="text" id="description" name="description" class="form-control" value="{{old('description')}}">
        <small class="text-danger">{{$errors->first('description')}}</small>
      </div>
      <button type="submit" class="btn btn-primary">
        Save
      </button>
  </div>
  </form>
@endsection