@extends('layouts.app')
@section('content')

<div class="container py-3">
    <h1 class="fs-4 text-secondary py-3">
        {{ __('Profile') }}
    </h1>
    <div class="card text-bg-dark p-4 mb-4 shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 text-bg-dark shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 text-bg-dark shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
