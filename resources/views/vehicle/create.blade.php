@extends('layouts.app') @section('content')
<div class="d-flex justify-content-center">
    <div class="col-10 p-0 pt-7">
        <v-card outlined>
            <v-toolbar dense flat>
                <v-icon class="mr-1">mdi-car</v-icon>
                <h3 class="m-0">Post Vehicle</h3>
            </v-toolbar>
        </v-card>
        <div class="row pr-4 pb-4 pl-0">
            <div class="col-8 pt-4 pr-0 pb-0 pl-4">
                <v-card outlined class="h-100 p-3">
                    <vehicle-form-image-slider></image-slider>
                </v-card>
            </div>
            <div class="col-4 pt-4 pr-0 pb-0 pl-4">
                <v-card outlined class="p-3">
                    <form
                    method="POST"
                    action="/vehicle"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <vehicle-form
                        errors="{{ $errors }}"
                        old-inputs="{{ $oldInputs }}"
                    ></vehicle-form>
                </form>
                </v-card>
            </div>
        </div>
        </div>
        </div>


@endsection
