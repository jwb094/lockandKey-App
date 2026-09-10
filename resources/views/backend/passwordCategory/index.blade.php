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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">No of Tagged Password</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $categories = [
            ["title"=> "Algebra",
            "count" => 8],
            ["title"=> "Algebra",
            "count" => 5],
            ["title"=> "Algebra",
            "count" => 4],
            ["title"=> "Algebra",
            "count" => 9],
            ]
            @endphp
            <tr>
                @foreach($categories as $key => $value)

                <th scope="row">1</th>
                <td>{{ $value['title'] }}</td>
                <td>{{ $value['count'] }}</td>
                <td>
                    <a type="button" class="btn" href="">Edit</a>
                    <a type="button" class="btn" href="">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')

@endpush
