@extends('layouts.app')

@section('main')
    <div class="mt-5 mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        A freshverification linkhas beensent to your email
                    </div>
                @endif

                Before proceeding, please check your email for verification.
                Or
                <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
                    @csrf

                    <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">{{ __('Click here to request another') }}</button>
                    .
                </form>
            </div>
        </div>
    </div>
@endsection
