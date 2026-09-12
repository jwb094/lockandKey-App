@extends('layouts.back-end')
@push('styles')
<link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}">
@endpush
@section('title','Dashboard')
@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <h1 class="text-center">Categories</h1>
    </div>
        <div class="my-4">
            <a class="col-sm-2 btn btn-primary" href="{{ route('backend.category.create') }}">New Category</a>
        </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($categories as $key => $value)


                <td>{{ $value->title }}</td>

                <td>
                    <a type="button" class="btn" href="{{ route('backend.category.edit',$value->id) }}">Edit</a>
                    <form action="{{ route('backend.category.destroy',$value->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')

@endpush
