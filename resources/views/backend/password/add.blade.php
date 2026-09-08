@extends('layouts.back-end')
@push('styles')
{{-- <link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}"> --}}
@endpush
@section('title','Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center">Add New Password</h1>
    </div>

    <div class="col-md-9 mx-sm-auto col-lg-8 px-md-4">
        <div class="col-md-12">

            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <x-form-label for="category" class="form-label">Category</x-form-label>
                    <x-form-select class="form-select" aria-label="Default select example"></x-form-select>
                </div>
                <div class="mb-3">
                    <x-form-label for="website" class="form-label">Website</x-form-label>
                    <x-form-input type="text" class="form-control" id="website" name="website" placeholder=""></x-form-input>
                </div>
                <div class="mb-3">
                    <x-form-label for="username" class="form-label">Username</x-form-label>
                    <x-form-input type="email" class="form-control" id="username" name="username" placeholder=""></x-form-input>
                </div>
                <div class="mb-3">
                    <x-form-label for="username" class="form-label">Password</x-form-label>
                    <x-form-input type="password" class="form-control" id="username" name="username" placeholder=""></x-form-input>
                </div>
                <div class="mb-3">
                       <div class="mb-3">
                    <x-form-label for="notes" class="form-label">Notes</x-form-label>
                    <x-form-textarea class="form-control" id="notes" name="notes" rows="3"></x-form-textarea>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
