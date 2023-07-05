@extends('front.layouts.auth-base')
@section('title','Login')
@section('form')

<!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<h4 class="mb-2">Reset Password? 🔒</h4>
              <p class="mb-4">Enter your email and well send you instructions to reset your password</p>
              <form id="formAuthentication" class="mb-3" action="{{ route('password.store') }}" method="POST">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    value="{{ $request->email  }}" required autofocus autocomplete="username"
                  />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        required autocomplete="new-password"
                      />
                      <span class="cursor-pointer input-group-text"><i class="bx bx-hide"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Confirm Password</label>
                    <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        required autocomplete="new-password"
                    />
                    <span class="cursor-pointer input-group-text"><i class="bx bx-hide"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button class="btn btn-primary d-grid w-100"> {{ __('Reset Password') }}</button>
              </form>
              <div class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
@endsection('form')
