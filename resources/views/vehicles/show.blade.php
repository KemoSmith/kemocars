@extends('layouts.new_app') @section('content')

<cs-show-vehicle
    :vehicle="{{ json_encode($vehicle) }}"
    :user-owns-post="{{ auth()->user() && auth()->user()->id === $vehicle->user_id ? 'true' : 'false' }}"
></cs-show-vehicle>

@endsection
