@extends('layout')

@section('title', 'Login')

@section('main')
  <h1 class="text-center">Login</h1>
  <p class="text-center">Don't have an account? Please <a href="/signup">Signup</a></p>
  <div class="col-9" style="margin: 0 auto">
    <form action="/login" method="post">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <small class="text-danger">{{$errors->first()}}</small>
      </div>
      <input type="submit" value="Login" class="btn btn-primary">
    </form>
  </div>
@endsection