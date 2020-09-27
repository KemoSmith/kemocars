@extends('layouts.app') @section('content')
<div class="d-flex justify-content-center row m-0 pt-3 pr-0 pb-3 pl-3">
    <div class="col-12 pt-2 pr-3 pb-0 pl-0">
        <v-card tile>
            <v-toolbar dense flat color="blue-grey darken-4" dark>
                @if(auth()->user() && auth()->user()->id === $vehicle->user->id)
                <a
                    href="{{ URL('vehicle/' . $vehicle->id . '/edit') }}"
                    class="text-decoration-none"
                >
                    <v-btn fab class="mr-3" dark color="blue"
                        ><v-icon class="mr-1">mdi-pencil</v-icon></v-btn
                    >
                </a>
                @endif
                <v-icon class="mr-1">mdi-car</v-icon>
                <h3 class="m-0">
                    {{ "$vehicle->year $vehicle->make $vehicle->model" }}
                </h3>
                <v-spacer></v-spacer>
                 <a
                href="/vehicle/u/{{$vehicle->user->id}}"
                class="text-decoration-none"
                >
                    <v-subheader class="text-dark"
                    >Listing By | {{ $vehicle->user->name }}</v-subheader>
                </a>
                <v-avatar
                    color="blue"
                    size="40"
                    class="mr-4 text-white"
                    >{{substr( $vehicle->user->name, 0, 1)}}</v-avatar
                >
                <v-chip x-large color="blue" dark label
                    >${{ $vehicle->price }} / {{ $vehicle->condition }}</v-chip
                >
            </v-toolbar>
        </v-card>
    </div>
    <div class="col-2 pt-2 pr-3 pb-0 pl-0">
        <advert-div class="mt-3"></advert-div>
    </div>
    <div class="col-10 pt-2 pr-3 pb-0 pl-0">
        <div class="row pt-2 pr-4 pb-4 pl-0">
            <div class="col-7 pt-1 pr-0 pb-0 pl-4">
                <v-card tile elevation='0' class="h-100">
                    <image-slider
                        stringed-image-objects="{{json_encode($vehicle->image)}}"
                    ></image-slider>
                </v-card outlined>
            </div>
            <div class="col-5 pt-1 pr-0 pb-0 pl-4">
                <v-card tile class="p-3">
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
                                    <td>
                                        {{  $vehicle->engine_displacement }}
                                    </td>
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
                </v-card>
                <v-card tile class="p-3 mt-4">
                    <h4 class="mt-3 mx-3">
                        <v-icon color="blue">mdi-mail</v-icon>
                        Contact Information
                    </h4>
                    <div class="col-5 p-0">
                        <v-divider class="mt-0"></v-divider>
                    </div>
                    @foreach($vehicle->contact_info as $ci)
                    <v-chip-group label column>
                        <v-chip>
                            <v-chip small>{{ $ci->type }}</v-chip>
                            {{$ci->info}}
                        </v-chip>
                    </v-chip-group>
                    @endforeach
                </v-card>
            </div>

        </div>
    </div>
</div>

@endsection
