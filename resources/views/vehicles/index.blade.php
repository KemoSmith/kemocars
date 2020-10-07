@extends('layouts.new_app') @section('content')
@if(!auth()->user())
<frontpage-slider></frontpage-slider>
@endif
<div class="d-flex justify-content-center">
    <div class="col-12 col-sm-12 col-md-11 col-lg-10 p-0">
        <h1 class="text-center mt-4">
            Elplore Vehicles
        </h1>
        <v-divider class="mx-8"></v-divider>
        <cs-card-group
            :vehicles="{{ json_encode($vehicles->items()) }}"
            endpoint="/api/vehicle"
            :current-page="{{ $vehicles->currentPage()  }}"
            :last-page="{{ $vehicles->lastPage()  }}"
        ></cs-card-group>
    </div>
</div>

@endsection
