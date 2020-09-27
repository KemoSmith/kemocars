@extends('layouts.new_app') @section('content')
<div class="container py-0">
    <div
        class="row justify-content-center align-items-center"
        style="height: calc(100vh - 70px - 97px);"
    >
        <div class="col-md-5">
            <v-card tile>
                <v-toolbar dense flat
                    ><v-toolbar-title>
                        <v-icon class="mr-1" color="blue">mdi-check</v-icon>
                        {{ __("Verify Your Email Address") }}
                    </v-toolbar-title></v-toolbar
                >
                <v-divider class="m-0"></v-divider>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{
                            __(
                                "A fresh verification link has been sent to your email address."
                            )
                        }}
                    </div>
                    @endif

                    {{
                        __(
                            "Before proceeding, please check your email for a verification link."
                        )
                    }}
                    {{ __("If you did not receive the email") }},
                    <form
                        class="d-inline"
                        method="POST"
                        action="{{ route('verification.resend') }}"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-link p-0 m-0 align-baseline"
                        >
                            {{ __("click here to request another") }}</button
                        >.
                    </form>
                </div>
            </v-card>
        </div>
    </div>
</div>
@endsection
