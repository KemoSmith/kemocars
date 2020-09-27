@extends('layouts.app') @section('content')
<div class="row m-0 pt-3 pr-0 pb-3 pl-3 d-flex justify-content-between">
    <div class="col-3 pt-2 pr-3 pb-0 pl-0">
        <filter-form
            url="{{ URL('') }}"
            request-all="{{ json_encode(request()->all()) }}"
        ></filter-form>
    </div>

    <div class="col-9 pt-2 pr-3 pb-0 pl-0">
        <v-card tile>
            <v-toolbar dense flat color="blue-grey darken-4" dark class="mt-0">
                @if(\Request::route()->getName() == 'vehicle.index')
                <h3 class="m-0 font-weight-light">
                    <v-icon class="mr-1" color="blue">mdi-view-list</v-icon>All
                    Vehicles
                </h3>
                @else
                <h3 class="m-0 font-weight-light">
                    <v-icon class="mr-1" color="blue">mdi-magnify</v-icon
                    >Results
                </h3>
                @endif
                <v-spacer></v-spacer>
                @if(\Request::route()->getName() != 'vehicle.index')
                <a href="{{ URL('') }}" class="text-decoration-none">
                    <v-btn dark
                        ><v-icon class="mr-1">mdi-view-list</v-icon> All
                        Listings</v-btn
                    >
                </a>
                @endif
            </v-toolbar>
        </v-card>
        @if((\Request::route()->getName() == 'vehicle.search' or
        \Request::route()->getName() == 'vehicle.filter') && count($vehicles)
        === 0)
        <v-card outlined class="mt-3 p-3">
            <h5 class="text-center m-0">
                Oops! We could not find any vehicle that matches your search.
            </h5>
        </v-card>
        @elseif(\Request::route()->getName() == 'vehicle.index' &&
        count($vehicles) === 0)
        <v-card outlined class="mt-3 p-3">
            <h5 class="text-center m-0">
                Oops! We could not find any vehicles. List yours today.
            </h5>
        </v-card>
        @else
        <div class="row mt-3 p-0 pl-4">
            @foreach($vehicles as $vehicle)
            <div class="col-4 p-0 pr-4 pb-3">
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
        @endif
    </div>
</div>
@endsection
