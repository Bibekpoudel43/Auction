@include ('admin.inc.header')
<body class="bg-dark">
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto" style="margin-top: 155px;">
            <div class="row">
                <div class="col-md-12">
                       @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                       @endif
                </div>
            </div>
           <div class="row border-top border-secondary ">
                <div class="col-md-12 mt-3">
                    <form method="POST" action="{{ route('admin.password.email') }}">
                                    @csrf
                                    <div class="row">
                        <h5 class="lead text-white text-center">Enter your e-mail address below</h5>
                        <!-- email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                        <input type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- pwd -->
                            <div class="col-md-12 mt-3 border-top border-secondary">
                                <a class="btn btn-success mx-2 mt-3" href="{{ route('admin.login') }}" id="to-login" name="action">Back To Login</a>
                                <button class="btn btn-info float-right mt-3" type="submit" name="action">{{ __('Send Password Reset Link') }}</button>
                            </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
</div>
</body>
</html>