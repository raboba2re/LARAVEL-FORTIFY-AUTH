@extends('layout')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welocome <strong>{{auth()->user()->name}}</strong> You are Logged In</div>

                <div class="card-body">
                    @if (session('status') == "two-factor-authentication-disabled")
                        <div class="alert alert-success" role="alert">
                            Two factor Authentication has been disabled.
                        </div>
                    @endif

                    @if (session('status') == "two-factor-authentication-enabled")
                        <div class="alert alert-success" role="alert">
                            Two factor Authentication has been enabled.
                        </div>
                    @endif


                    <form method="POST" action="/user/two-factor-authentication">
                        @csrf

                        @if (auth()->user()->two_factor_secret)
                            @method('DElETE')

                            <div class="pb-3">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>

                            <button class="btn btn-danger">Disable Two Factor Authentication</button>
                            @else

                                <button class="btn btn-primary">Enable Two Factor Authentication</button>
                            @endif
                        </form>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
