@extends('layouts.new_app') @section('content')
<div class="d-flex justify-content-center">
    <div class="col-12 col-sm-12 col-md-11 col-lg-10 p-0">
        <h1 class="text-center mt-4">
            Results
        </h1>
        <v-divider class="mx-8"></v-divider>

        @if(count($vehicles) == 0)
        <h3 class="font-weight-light text-center">
            !Oops :( We Have Found No Results
        </h3>
        @endif

        <cs-card-group
            :vehicles="{{ json_encode($vehicles->items()) }}"
            endpoint="{{ $endpoint }}"
            :current-page="{{ $vehicles->currentPage() }}"
            :last-page="{{ $vehicles->lastPage() }}"
        ></cs-card-group>
    </div>
</div>
@endsection
