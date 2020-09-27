@extends('layouts.new_app') @section('content')
<form id="main-register-form" method="POST" action="{{ route('register') }}">
    @csrf
    <cs-register-form></cs-register-form>
</form>
@endsection
