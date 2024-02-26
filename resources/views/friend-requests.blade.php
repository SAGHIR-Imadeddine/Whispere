

@extends('layouts.app') 

@section('content')
    <h1>Friend Requests</h1>
    @if ($friendRequests->isEmpty())
        <p>No friend requests.</p>
    @else
        <ul>
            @foreach ($friendRequests as $request)
                <li>{{ $request->sender->name }} sent you a friend request.</li>
              
            @endforeach
        </ul>
    @endif
@endsection
