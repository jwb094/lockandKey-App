@extends('layouts.back-end')
@push('styles')
<link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}">
@endpush
@section('title','Dashboard')
@section('content')
<div class="container-fluid p-4">
    <div class="my-4">
        <a class="col-sm-2 btn btn-primary" href="{{ route('backend.password.create') }}">New Password</a>
    </div>
    @if (session('status'))
    <x-form-alert class="alert alert-success">
        {{ session('message') }}
    </x-form-alert>
    @endif
    <div class="accordion d-md-none" id="accordion-category">

        @foreach($passwordsByCategories as $category)

        <div class="accordion-item">

            <h2 class="accordion-header">
                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-category-{{ $category->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="accordion-category-{{ $category->id }}">
                    {{ $category->title }} ({{ count($category->passwords) }})
                </button>
            </h2>

            <div id="accordion-category-{{ $category->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordion-category">
                <div class="accordion-body">

                    <ul class="list-group list-group-flush">

                        @foreach($category->passwords as $value)

                        <li class="list-group-item mb-3">
                            {{ $value->website }}

                            <div class="mt-2">
                                <a class="btn" href="{{ route('backend.password.edit', $value->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('backend.password.destroy', $value->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>

                        @endforeach

                    </ul>

                </div>
            </div>

        </div>

        @endforeach

    </div>

    <div class="file-tabs d-flex align-items-stretch d-none d-md-flex">

        <!-- Tabs -->
        <div class="nav flex-column col-md-2" id="file-tabs" role="tablist">

            @foreach($passwordsByCategories as $category)

            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="category-{{ $category->id }}-tab" data-bs-toggle="pill" data-bs-target="#category-{{ $category->id }}" type="button" role="tab" aria-controls="category-{{ $category->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                {{ $category->title }} ({{ count($category->passwords) }})
            </button>

            @endforeach

        </div>


        <!-- Content -->
        <div class="tab-content flex-grow-1  col-md-8" id="file-tabs-content">

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
