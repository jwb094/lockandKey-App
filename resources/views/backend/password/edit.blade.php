@extends('layouts.back-end')
@push('styles')
{{-- <link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}"> --}}
@endpush
@section('title','Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center">Update Password</h1>
    </div>

    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-md-12">
            @if ($errors->any())
            <x-form-alert class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-form-alert>
            @endif
            <form action={{ route('backend.password.update',$password) }} method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <x-form-label for="category" class="form-label">Category</x-form-label>
                    <x-form-select class="form-select"  name="category_id" aria-label="Default select example" :categories="$categories" :recordFieldData="$password->category_id" fieldname="category_id"></x-form-select>
                </div>
                <div class="mb-3">
                    <x-form-label for="website" class="form-label">Website</x-form-label>
                    <x-form-input type="text" class="form-control" id="website" name="website" placeholder="" 
                    value="{{ old('website',$password->website) }}"></x-form-input>
                </div>
                <div class="mb-3">
                    <x-form-label for="username" class="form-label">Username</x-form-label>
                    <x-form-input type="username" class="form-control" id="username" name="username" placeholder=""
                    value="{{ old('email',$password->username) }}"></x-form-input>
                </div>
                <div class="mb-3">
                    <x-form-label for="username" class="form-label">Password</x-form-label>
                    <x-form-input type="password" class="form-control" id="password" name="password" placeholder=""
                    value="{{ old('password',$password->password) }}"></x-form-input>
                </div>
                <div class="mb-3">
                    <x-form-label for="notes" class="form-label">Notes</x-form-label>
                    <x-form-textarea class="form-control" id="notes" name="notes" rows="3"> value="{{ old('notes',$password->notes) }}"</x-form-textarea>
                </div>
                                    <x-form-button class="btn btn-primary w-100 py-2 mt-2" type="submit"> Update</x-form-button>
            </form>
        </div>
    </div>
</div>

@endsection
