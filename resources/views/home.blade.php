@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
    </div>
</div>
@endsection
