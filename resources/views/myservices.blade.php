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
            <td><a class="btn btn-primary" href="/service/{{$event->EventId}}/edit" role="button">Edit</a></td>
            <td><a class="btn btn-danger" data-toggle="modal"  data-target="#exampleModal"  role="button">Delete</a></td>
        </tr>    

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete? This cannot be undone.
                    </div>
                    <div class="modal-footer">
                    <form action="/service/{{$event->EventId}}/delete" method="post">
                        @csrf
                        @method('DELETE')
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                    </div>
                  </div>
                </div>
              </div>
    @empty
        <h2>Create an event to see them here</h2>
        <br><br>
    @endforelse

{{--  --}}
</table>


@endsection