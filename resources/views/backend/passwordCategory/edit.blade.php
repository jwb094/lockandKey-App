@extends('layouts.back-end')
@push('styles')
{{-- <link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}"> --}}
@endpush
@section('title','Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center">Edit New Category</h1>
    </div>

    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-md-12">

         <form action={{ route('backend.category.update',$category) }} method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <x-form-label for="title" class="form-label">Title</x-form-label>
                    <x-form-input type="text" class="form-control" id="title" name="title" placeholder=""  value="{{ old('title',$category->title) }}"></x-form-input>
                </div>
                <div class="mb-3">
                    <x-form-label for="notes" class="form-label">Notes</x-form-label>
                    <x-form-textarea class="form-control" id="notes" name="notes" rows="3">{{ old('title',$category->title) }}</x-form-textarea>
                </div>
           <x-form-button class="btn btn-primary w-100 py-2 mt-2" type="submit"> Update</x-form-button>
            </form>
        </div>
    </div>
</div>

@endsection
