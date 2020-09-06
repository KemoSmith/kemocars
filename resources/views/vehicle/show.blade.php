@extends('layouts.app') @section('content')
<div class="d-flex justify-content-center">
    <div class="col-11 p-0 pt-7">
        <v-toolbar color="blue-grey darken-4" dark dense flat>
            @if(auth()->user() && auth()->user()->id === $vehicle->user->id)
            <a
                href="{{ URL('vehicle/' . $vehicle->id . '/edit') }}"
                class="text-decoration-none"
            >
                <v-btn fab class="mr-3" color="blue"
                    ><v-icon class="mr-1">mdi-pencil</v-icon></v-btn
                >
            </a>
            @endif
            <v-icon class="mr-1">mdi-car</v-icon>
            <h3 class="m-0">
                {{ "$vehicle->year $vehicle->make $vehicle->model" }}
            </h3>
            <v-spacer></v-spacer>
            <v-subheader class="text-white"
                >Listing By | {{ $vehicle->user->name }}</v-subheader
            >
            <v-avatar
                color="blue"
                size="40"
                class="mr-4 text-white"
                >{{substr( $vehicle->user->name, 0, 1)}}</v-avatar
            >
            <v-chip x-large color="pink" dark label
                >${{ $vehicle->price }} / {{ $vehicle->condition }}</v-chip
            >
        </v-toolbar>
        <div class="row m-0 pt-2 pr-4 pb-4 pl-0 bg-white">
            <div class="col-8 pt-4 pr-0 pb-0 pl-4">
                <div class="h-100">
                    <image-slider
                        stringed-image-objects="{{json_encode($vehicle->image)}}"
                    ></image-slider>
                </div>
            </div>
            <div class="col-4 pt-4 pr-0 pb-0 pl-4">
                <v-alert
                    type="info"
                    color="blue-grey"
                    >{{ $vehicle->description }}</v-alert
                >
                <v-simple-table>
                    <template v-slot:default>
                        <tbody>
                            <tr>
                                <td>Chassis</td>
                                <td>{{  $vehicle->chassis }}</td>
                            </tr>
                            <tr>
                                <td>Engine Displacement (cc)</td>
                                <td>{{  $vehicle->engine_displacement }}</td>
                            </tr>
                            <tr>
                                <td>Engine</td>
                                <td>{{  $vehicle->engine_model }}</td>
                            </tr>
                            <tr>
                                <td>Fuel</td>
                                <td>{{  $vehicle->fuel }}</td>
                            </tr>
                            <tr>
                                <td>Distance</td>
                                <td>{{  $vehicle->distance . '/km' }}</td>
                            </tr>
                            <tr>
                                <td>Seats</td>
                                <td>{{  $vehicle->seats }}</td>
                            </tr>
                            <tr>
                                <td>Doors</td>
                                <td>{{  $vehicle->doors }}</td>
                            </tr>
                            <tr>
                                <td>Transmission</td>
                                <td>{{  $vehicle->transmission }}</td>
                            </tr>
                            <tr>
                                <td>Driving Wheels</td>
                                <td>{{  $vehicle->driving_wheels }}</td>
                            </tr>
                            <tr>
                                <td>Colour</td>
                                <td>{{  $vehicle->colour }}</td>
                            </tr>
                            <tr>
                                <td>Steering</td>
                                <td>{{  $vehicle->steering }}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>{{  $vehicle->location }}</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>{{  $vehicle->weight }}</td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>{{  $vehicle->size }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </div>
        </div>
    </div>
</div>

@endsection
