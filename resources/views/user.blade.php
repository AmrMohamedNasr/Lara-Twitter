@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $user->name }}</h3>
            @if(auth()->user()->isNot($user))
                @if(auth()->user()->isFollowing($user))
                    <a href="{{ $user->unfollowLink }}" class="btn btn-danger">Unfollow</a>
                @else
                    <a href="{{ $user->followLink }}" class="btn btn-success">Follow</a>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection