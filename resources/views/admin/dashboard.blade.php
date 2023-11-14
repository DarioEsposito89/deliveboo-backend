@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 my-4 gold-text">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card gold-text">
                <div class="card-header login-head">{{ __('User Dashboard') }}</div>

                <div class="card-body login-body text-white">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
