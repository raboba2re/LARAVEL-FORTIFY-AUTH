@extends('layout')
  
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two Factor Authentication') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST",  action="user/two-factor-authentication">
                        @csrf
                      @if (auth()->user()->two_factor_secret)
                            @method('DELETE')
                            <div>
                                {!! auth()->user()->twofactorQrCodeSvg()!!}
                            </div>
                           
                        <button class="btn btn-danger">Disable Two Factor Authentication</button>
                        @else
                        
                            <button class="btn btn-primary">Enable Two Factor Authentication</button>
                        @endif 
                    </form>

                    Welocome <strong>{{auth()->user()->name}}</strong> You are Logged In
                </div>
            </div>
        </div>
    </div>
</div>
@endsection