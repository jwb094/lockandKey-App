@extends('layouts.front-end')
    @push('styles')
    <link rel="stylesheet" href=" {{ URL::asset('css/form.css') }}">
    @endpush
    @section('title','home')
    @section('content')
      <div class="w-100 d-flex justify-content-center align-items-center mx-auto" style="max-width: 400px;">

          <section class="form-signin w-100 m-auto">
              <form action= method="POST">
                       @csrf
                  <h1 class="h3 mb-3 fw-normal text-center"> Sign in</h1>
                  <div class="form-floating">
                      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">Email address</label> </div>
                  <div class="form-floating">
      
                      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password"> <label for="floatingPassword">Password</label> </div>
                  <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
                  <a class="btn btn-primary w-100 py-2 mt-2" href="/register">Register</a>
      
              </form>
          </section>
      </div>


    @endsection
