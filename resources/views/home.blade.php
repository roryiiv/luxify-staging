@extends('layouts.dashboard')

@section('sidebar')
    @if (Auth::user())
        @if(Auth::user()->role == 'user')
            @include('inc.db-sidebar-user')
        @elseif(Auth::user()->role == 'seller')
            @include('inc.db-sidebar-seller')
        @else
            @include('inc.db-sidebar-user')
        @endif
    @else
        @include('inc.db-sidebar-seller')
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
