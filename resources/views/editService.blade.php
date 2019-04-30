@extends('layout')

@section('title', 'Edit Service')

@section('main')
<h1 class="text-center">Edit Service</h1>
<div class="row">
    <div class="col-9" style="margin: 0 auto">
    <form action="/service/{{$event->EventId}}/edit" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" class="form-control" value="{{old('title') == "" ? $event->Title : old('Title') }}">
          <small class="text-danger">{{$errors->first('title')}}</small>
        </div>
  
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{old('address') == "" ? $event->Address : old('address') }}">
            <small class="text-danger">{{$errors->first('address')}}</small>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" class="form-control" value="{{old('city') == "" ? $event->City : old('city') }}">
            <small class="text-danger">{{$errors->first('city')}}</small>
        </div>

        <div class="form-group">
            <label for="state_select">State</label>
            <select class="form-control" name="state_select">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
            <small class="text-danger">{{$errors->first('state_select')}}</small>
        </div>

        <div class="form-group">
            <label for="zip_code">Zip Code</label>
            <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{old('zip_code') == "" ? $event->ZipCode : old('zip_code')}}">
            <small class="text-danger">{{$errors->first('zip_code')}}</small>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{old('date') == "" ? $event->Date : old('date')}}">
             <small class="text-danger">{{$errors->first('date')}}</small>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" id="start_time" name="start_time" class="form-control" value="{{old('start_time') == "" ? $event->StartTime : old('start_time')}}">
             <small class="text-danger">{{$errors->first('start_time')}}</small>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" id="end_time" name="end_time" class="form-control" value="{{old('end_time') == "" ? $event->EndTime: old('end_time')}}">
            <small class="text-danger">{{$errors->first('end_time')}}</small>
        </div>

        <div class="form-group">
            <label for="org_select">Organization</label>
            <select class="form-control" name="org_select">
                @foreach($orgs as $org)
                 <option value="{{$org->OrganizationId}}" {{$org->OrganizationId == old('org_select') ? "selected" : ""}}>{{$org->Name}}</option>
                 @endforeach
            </select>
            <small class="text-danger">{{$errors->first('org_name')}}</small>
        </div>

        <div class="form-group">
            <label for="type_select">Type</label>
            <select class="form-control" name="type_select">
                @foreach($types as $type)
                 <option value="{{$type->EventTypeId}}" {{$type->EventTypeId == old('type_select') ? "selected" : ""}}>{{$type->Name}}</option>
                 @endforeach
            </select>
            <small class="text-danger">{{$errors->first('type_select')}}</small>
        </div> 
  
        <input type="submit" value="Save" class="btn btn-primary">
      </form>
    </div>
  </div>
@endsection