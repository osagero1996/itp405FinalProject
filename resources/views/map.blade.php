@extends('layout')

@section('title', 'Service Map')


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
        </tr>    

        
    @empty
        <h2>No Events In Your Area</h2>
        <br><br>
    @endforelse

{{--  --}}
</table>


@endsection
