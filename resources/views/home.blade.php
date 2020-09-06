@extends('layouts.app') @section('content')

<frontpage-slider url="{{ URL('images') }}" class="mb-0"></frontpage-slider>

<div class="row m-0 pt-0 pr-0 pb-3 pl-3">
    <div class="col-9 pt-3 pr-3 pb-0 pl-0">
        <v-toolbar dense flat color="white">
            <h3 class="m-0 font-weight-light">
                <v-icon class="mr-1" color="blue">mdi-clock</v-icon>Latest Listings
            </h3>
            <v-spacer></v-spacer
            ><a href="{{ URL('vehicle') }}" class="text-decoration-none">
                <v-btn dark
                    ><v-icon class="mr-1">mdi-view-list</v-icon> All
                    Listings</v-btn
                >
            </a></v-toolbar
        >
        <div class="row m-0 mt-3 pt-3 pr-0 pb-0 pl-3">
            @foreach($vehicles as $vehicle)
            <div class="col-3 pt-0 pr-3 pb-3 pl-0">
                <a
                    href="{{ URL('/vehicle/' . $vehicle->id) }}"
                    class="text-decoration-none"
                >
                    <vehicle-card
                        vehicle-json-string="{{ json_encode($vehicle) }}"
                    ></vehicle-card>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-3 pt-3 pr-3 pb-0 pl-0">
        <filter-form
            url="{{ URL('') }}"
            request-all="{{ json_encode(request()->all()) }}"
        ></filter-form>
    </div>
</div>

@endsection
