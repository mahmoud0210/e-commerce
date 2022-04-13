@extends('admin.layouts.main')


  

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="row">

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Notification </h2>
            <a href="{{ route('notifications.read') }}" style="float: right;" class="btn btn-primary mb-2">Seen notification</a>
        </div>
    </div>

</div>



<table class="table table-bordered">

    <tr>
        <th>No</th>
        <th>notification</th>
       <th>#</th>
    </tr>

    @forelse ($users->notifications as $key =>$notification)
    <tr>
        @if ($notification->read_at===Null)
        
        <td>{{ $key+1}}</td>
        <td>{{ $notification->data['message']}}</td>
        <td>
            <a class="btn btn-success" href="{{ route('notifications.markasread',$notification->id) }}">mark as read</a>
            <a href="{{ route('deleteNotification',$notification->id)}}" class="btn btn-danger">Delete</a>

        </td>
        @endif
        

    </tr> 
    @empty
        
    @endforelse
</table>
<div>        
    <a href="{{route('markAllAsRead.notification')}}" class="btn btn-warning ml-2">Mark all as read</a>
    <a href="{{route('deleteAllNotification')}}" class="btn btn-danger pull-right">Delete all</a>
</div>
@endsection