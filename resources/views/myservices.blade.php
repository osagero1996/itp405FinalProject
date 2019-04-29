@extends('layout')

@section('title', 'My Services')



@section('main')
<table class="table">
    <tr>
        <th>Title</th>
        <th>Address</th>
        <th>City</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Type</th>
    </tr>

    @forelse ($events as $event)
        <tr>
            <td>{{$event->Title}}</td>
            <td>{{$event->Address}}</td>
            <td>{{$event->City}}</td>
            <td>{{$event->Date}}</td>
            <td>{{$event->StartTime}}</td>
            <td>{{$event->EndTime}}</td>
            <td>{{$event->EventType->Name}}</td>
            <td><a class="btn btn-primary" href="/"></a></td>
        </tr>    
    @empty
        <h2>Create an event to see them here</h2>
    @endforelse

</table>
@endsection