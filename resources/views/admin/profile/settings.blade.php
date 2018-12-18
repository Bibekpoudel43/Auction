@extends ('admin.layouts.admin-app')
@section ('content')
<div class="row">
    <div class="col-md-12">
        @if(Session::has('flash_error_message'))
        <div class="alert alert-danger" role="alert">
           <strong> {{ Session::get('flash_error_message') }}</strong>           
        </div>
        @endif
        @if(Session::has('flash_success_message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get('flash_success_message') }}</strong>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="card">
            <div class="card-body wizard-content">
                <h6 class="card-subtitle"></h6>
                <form id="updateForm" action="{{ route('admin.updatePassword')}}" method="POST" class="m-t-40">
                    @csrf
                        <h3>My Account</h3>
                            <label for="Cpassword">Current Password *</label>
                            <input id="Cpassword" name="current_password" type="password" class="required form-control" required>
                            <span id="chkPwd"></span>
                            <label for="Npassword">New Password *</label>
                            <input id="Npassword" name="new_password" type="password" class="required form-control" required>
                            <label for="confirm">Confirm Password *</label>
                            <input id="confirm" name="confirm" type="password" class="required form-control" required>
                </form>
                <button class="btn btn-success mt-4" type="submit" name="submit" class="form-control" required>Update</button>
            </div>
        </div>
    </div>
</div>
@endsection