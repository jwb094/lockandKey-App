@extends('layouts.back-end')
@push('styles')
<link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}">
@endpush
@section('title','Dashboard')
@section('content')
<div class="container-fluid p-4">
       <div class="my-4">
            <a class="col-sm-2 btn btn-primary" href="{{ route('backend.password.add') }}">New Password</a>
        </div>
    <div class="file-tabs d-flex align-items-stretch">
 
        <!-- Tabs -->
        <div class="nav flex-column col-md-2" id="file-tabs" role="tablist">

            @foreach($passwordsByCategories as $category)

            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="category-{{ $category->id }}-tab" data-bs-toggle="pill" data-bs-target="#category-{{ $category->id }}" type="button" role="tab" aria-controls="category-{{ $category->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                {{ $category->title }} ({{ count($category->passwords) }})
            </button>

            @endforeach

        </div>


        <!-- Content -->
        <div class="tab-content flex-grow-1 col-md-8" id="file-tabs-content">

            @foreach($passwordsByCategories as $category)

            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="category-{{ $category->id }}-tab">

                <x-list class="list-group list-group-flush" :categories="$category->passwords" />

            </div>

            @endforeach

        </div>

    </div>

</div>
@endsection

@push('scripts')

@endpush
