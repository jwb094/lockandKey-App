@extends('layouts.back-end')
@push('styles')

@endpush
@section('title','Edit Profile')
@section('content')

<div class="container-fluid">
    <div class="row">
        @if ($status)
            @if ($status === false)
            <x-form-alert class="alert alert-danger">
                <li>{{ $message }}</li>
                </ul>
            </x-form-alert>
            @endif
            @if ($status === true)
            <x-form-alert class="alert alert-success">
                <li>{{ $message }}</li>
                </ul>
            </x-form-alert>
            @endif
        @endif
        <!-- Main content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <section class="form-signin col-md-9 m-auto">
                <h1 class="h2 mb-3 fw-normal text-center my-4"> Profile Information </h1>
                <form action={{ route('backend.user.update',$user->id) }} method="POST" class="profile_information" id="profile_information">
                    @csrf
                    @method('PUT')
                    <div class="form-check mt-3">
                        <x-form-label for="first_name" class="form-label"> First Name </x-form-label>
                        <x-form-input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name',$user->first_name) }}"></x-form-input>
                    </div>
                    <div class="form-check mt-3">
                        <x-form-label for="user_last_name" class="form-label"> Last Name </x-form-label>
                        <x-form-input type="text" id="user_last_name" class="form-control" name="last_name" value="{{ old('last_name',$user->last_name) }}"></x-form-input>
                    </div>
                    <div class="form-check mt-3">
                        <x-form-label for="user_email" class="form-label"> Last Name </x-form-label>
                        <x-form-input type="text" id="user_email" class="form-control" name="email" value="{{ old('user_email',$user->email) }}"></x-form-input>
                    </div>
                    <div class="form-check mt-3">
                        <x-form-label for="user_password" class="form-label"> Password </x-form-label>
                        <x-form-input type="password" id="user_password" class="form-control" name="password" value="{{ old('user_password',$user->password) }}"></x-form-input>
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Update</button>
                </form>


            </section>
        </div>
    </div>
</div>



@endsection
