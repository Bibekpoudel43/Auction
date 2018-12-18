@include ('admin.inc.header')
<body class="bg-dark">
<div class="container " style="margin-top: 150px;">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <span class="text-white">Recover your password</span>
                    </div>
                </div>
            </div>
           <div class="row">
                    <div class="col-md-12">
                         <form method="POST" action="{{ route('admin.password.request') }}">
                                @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                                <!-- email -->
                            <div class="form-group">
                                <label for="email" class="text-white">{{ __('Email') }}</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email Address" >
                            
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                           </div>
                            <div class="form-group">
                                <label for="password-confirm" class="text-white">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                                <!-- pwd -->
                            <div class="col-md-12">
                                    <button class="btn btn-success" type="submit" id="to-login" name="action">Send</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           </div>
       </div>
    </div>
</div>
</body>
</html>