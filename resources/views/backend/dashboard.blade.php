@extends('layouts.back-end')
@push('styles')
<link rel="stylesheet" href=" {{ URL::asset('css/dashboard.css') }}">
@endpush
@section('title','Dashboard')
@section('content')
<div class="container-fluid p-4">

    <!-- Page Header -->

    {{-- <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Dashboard
            </h1>

            <p class="text-muted mb-0">
                <p>Welcome</p>
            </p>
        </div>



    </div> --}}


    <!-- ==========================================
             Statistics
        ========================================== -->






    <!-- ==========================================
             Dashboard Content
        ========================================== -->

    {{-- <div class="row g-4">



        <div class="col-12 col-xl-8">
          
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">
                        <h2 class="h5 mb-0">
                            Recent Activity
                        </h2>
                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>John Smith</td>
                                        <td>Created an account</td>
                                        <td>Today</td>
                                        <td>
                                            <span class="badge text-bg-success">
                                                Completed
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Sarah Jones</td>
                                        <td>Published a post</td>
                                        <td>Yesterday</td>
                                        <td>
                                            <span class="badge text-bg-success">
                                                Published
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>David Brown</td>
                                        <td>Updated profile</td>
                                        <td>Yesterday</td>
                                        <td>
                                            <span class="badge text-bg-primary">
                                                Updated
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Emma Wilson</td>
                                        <td>Submitted application</td>
                                        <td>2 days ago</td>
                                        <td>
                                            <span class="badge text-bg-warning">
                                                Pending
                                            </span>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

        </div>


        <!-- Quick Actions -->

  <div class="col-12 col-xl-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">
                        <h2 class="h5 mb-0">
                            Quick Actions
                        </h2>
                    </div>

                    <div class="card-body">

                        <div class="d-grid gap-2">

                            <a href="#" class="btn btn-primary">
                                Add User
                            </a>

                            <a href="#" class="btn btn-outline-primary">
                                Create Post
                            </a>

                            <a href="#" class="btn btn-outline-primary">
                                Manage Jobs
                            </a>

                            <a href="#" class="btn btn-outline-secondary">
                                View Reports
                            </a>

                        </div>

                    </div>

                </div>

            </div>

    </div> --}}

    {{-- <div class="d-flex align-items-start">

        <!-- Tab Navigation -->
        <div class="nav flex-column nav-pills me-3 col-md-3" id="v-pills-tab" role="tablist">

            <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                Profile
            </button>

            <button class="nav-link" id="settings-tab" data-bs-toggle="pill" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                Settings
            </button>

            <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                Security
            </button>

        </div>


        <!-- Tab Content -->
        <div class="tab-content col-md-9" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                <h3>Profile</h3>
                <p>
                    This is the profile content.
                </p>

            </div>


            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">

                <h3>Settings</h3>
                <p>
                    This is the settings content.
                </p>

            </div>


            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab" tabindex="0">

                <h3>Security</h3>
                <p>
                    This is the security content.
                </p>

            </div>

        </div>

    </div> --}}
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


                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            </div>

            <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>

            </div>

            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>

            </div>

        </div>

    </div>

</div>
@endsection

@push('scripts')

@endpush
