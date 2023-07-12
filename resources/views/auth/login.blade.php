@extends('admin.layouts.app')
@section('title')
    <title>Ruby Homes</title>
@endsection
@section('content')
    <main class="page-center">
        <article class="sign-up">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <h1 class="sign-up__title">
                        <div>
{{--                            <img src="{{url($logo->value)}}" alt="logo">--}}
                        </div>
                    </h1>
                    <p class="sign-up__subtitle">Sign in to your account to continue</p>
                    @include('errors.error')
                    @include('success.success')
                    <form class="sign-up-form form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <label class="form-label-wrapper">
                            <p class="form-label">Email</p>
                            <input
                                name="email"
                                class="form-input"
                                type="email"
                                placeholder="Enter your email"
                                required
                            />
                        </label>
                        <label class="form-label-wrapper mb-3">
                            <p class="form-label">Password</p>
                            <input
                                name="password"
                                class="form-input"
                                type="password"
                                placeholder="Enter your password"
                                required
                            />
                        </label>
{{--                        <div class="row mb-4">--}}
{{--                            <div class="col-10">--}}
{{--                                <div class="captcha">--}}
{{--                                    <span>{!! captcha_img('flat') !!}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-10">--}}
{{--                                <input type="text" name="captcha" class="form-input" id="captcha"--}}
{{--                                       placeholder="Enter Captcha" aria-label="Enter Captcha" required--}}
{{--                                       value="{{old('captcha')}}">--}}
{{--                            </div>--}}
{{--                            <div class="col-1 px-0">--}}
{{--                                <button type="button" class="btn btn-danger py-2 reload" id="reload"--}}
{{--                                        onclick="getNewCaptcha()">--}}
{{--                                    &#x21bb;--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button class="form-btn primary-default-btn transparent-btn">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </article>
    </main>
@endsection

