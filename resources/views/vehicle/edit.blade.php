@extends('layouts.app') @section('content')
<div class="d-flex justify-content-center">
    <div class="col-11 p-0 pt-7">
        <v-toolbar dense flat dark color="blue-grey darken-4">
            <v-icon class="mr-1">mdi-car</v-icon>
            <h3 class="m-0">Edit Vehicle Post</h3>
            <v-spacer></v-spacer>
            <form method="POST" action="/vehicle/{{ $vehicle->id }}">
                @method('DELETE') @csrf
                <v-btn fab color="blue" type="submit"
                    ><v-icon>mdi-delete</v-icon></v-btn
                >
            </form>
        </v-toolbar>
        <div class="row m-0 pt-2 pr-4 pb-4 pl-0 bg-white">
            <div class="col-8 pt-4 pr-0 pb-0 pl-4">
                <div class="h-100">
                    <vehicle-form-image-slider
                        deletable-images="{{ json_encode($vehicle->image) }}"
                    ></vehicle-form-image-slider>
                </div>
            </div>
            <div class="col-4 pt-4 pr-0 pb-0 pl-4">
                <form
                    id="edit-vehicle-form"
                    method="POST"
                    action="/vehicle/{{ $vehicle->id }}"
                    enctype="multipart/form-data"
                >
                    @method('PATCH') @csrf
                    <vehicle-form
                        errors="{{ $errors }}"
                        old-inputs="{{ $oldValues }}"
                    ></vehicle-form>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
