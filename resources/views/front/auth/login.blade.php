@extends('front.layouts.auth-base')
@section('title','Login')
<!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
@section('form')
<h4 class="mb-2">Welcome to Sneat! 👋</h4>
<p class="mb-4">Please sign-in to your account and start the adventure</p>

<form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email or Username</label>
    <input
      type="text"
      class="form-control"
      id="email"
      name="email"
      placeholder="Enter your email or username"
      :value="old('email')" required autofocus autocomplete="username"
    />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>

  <div class="mb-3 form-password-toggle">
    <div class="d-flex justify-content-between">
      <label class="form-label" for="password">Password</label>
      <a href="{{ route('password.request') }}">
        <small>Forgot Password?</small>
      </a>
    </div>
    <div class="input-group input-group-merge">
      <input
        type="password"
        id="password"
        class="form-control"
        name="password"
        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
        aria-describedby="password"
        required autocomplete="current-password"
      />
      <span class="cursor-pointer input-group-text"><i class="bx bx-hide"></i></span>
    </div>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>

  <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="remember-me"   name="remember"/>
      <label class="form-check-label" for="remember-me"> {{ __('Remember me') }} </label>
    </div>
  </div>
  <div class="mb-3">
    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
  </div>
</form>

<p class="text-center">
  <span>New on our platform?</span>
  <a href="{{ route('register') }}">
    <span>Create an account</span>
  </a>
</p>
@endsection('form')
