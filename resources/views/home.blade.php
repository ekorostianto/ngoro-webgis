@extends('layouts.app')

@section('content')
<div class='uk-container uk-container-xsmall'>
    <div class='uk-card'> 
        <div class="uk-card-header uk-card-title">
            <p>Dashboard</p>
        </div>
        <div class="uk-card-body">
            @if (session('status'))
            <div class="" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <p>You are logged in!</p>
            <a href="/usaha">Edit usaha</a> or <a href="/kegiatan">kegiatan</a>
        </div>
    </div>
</div>
@endsection