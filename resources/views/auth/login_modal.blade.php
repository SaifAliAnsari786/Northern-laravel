{{-- Login modal start --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-width">
        <div class="modal-content">
            <button type="button" class="btn-close ms-auto pe-4 pt-4" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            <div class="modal-header border-0 pt-0 d-flex flex-column">
                <h1 class="sign-up__title mx-auto mb-3">
                    <div>
                        <img src="{{url($logo->value)}}" alt="logo">
                    </div>
                </h1>
                <p class="sign-up__subtitle">Sign in to your account to continue</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form class="sign-up-form form">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control py-2" id="email"
                               placeholder="Enter your email"
                               required>

                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control py-2 mb-3" id="password"
                               placeholder="Enter your password"
                               required>
                        <a href="{{ url('forgot-password') }}">Forgot Password?</a>
                    </div>
                    <div id="my-login-modal-captcha">

                    </div>
                    <div class="row gy-5 pb-2">
                        <div class="col-8">
                            <input type="text" name="captcha" class="form-control py-2" id="captcha"
                                   placeholder="Enter Captcha" aria-label="Enter Captcha" required
                                   value="{{old('captcha')}}">
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-danger reload py-2" id="reload"
                                    onclick="getNewCaptcha()">
                                &#x21bb;
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="signup-btn" onclick="getLogin()">Sign in</button>
                        <button type="button" class="register-btn" onclick="getRegisterModal()">Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Login modal end --}}
