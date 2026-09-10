@extends('layouts.back-end')
@push('styles')
<link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}">
@endpush
@section('title','Dashboard')
@section('content')
<div class="container-fluid p-4">
    <div class="file-tabs d-flex align-items-stretch">

        <!-- Tabs -->
        <div class="nav flex-column col-md-2" id="file-tabs" role="tablist">

            <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                Profile
            </button>

            <button class="nav-link" id="account-tab" data-bs-toggle="pill" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">
                Account
            </button>

            <button class="nav-link" id="password-tab" data-bs-toggle="pill" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">
                Password
            </button>

        </div>


        <!-- Content -->
        <div class="tab-content flex-grow-1 col-md-8" id="file-tabs-content">

            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @php
                $categories = [
                "Algebra",
                "Calculus",
                "Geometry",
                "Statistics", "Biology",
                "Chemistry",
                "Physics",
                "Astronomy"
                ]
                @endphp

                <x-list class="list-group list-group-flush" :categories="$categories">

                </x-list>
            </div>

            <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">

                <x-list class="list-group list-group-flush" :categories="$categories">

                </x-list>

            </div>

            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

                <x-list class="list-group list-group-flush" :categories="$categories">

                </x-list>

            </div>

        </div>

    </div>

</div>
@endsection

@push('scripts')

@endpush
