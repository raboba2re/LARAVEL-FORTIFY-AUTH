@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">
                  @if (Session::has('errors'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('errors')->first() }}
                        </div>
                    @endif

                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                            Password reset was successful. Please login
                        </div>                        

                    @endif

                    @if(session('success'))
                        <div class="alert alert-info"> 
                            Your Verification code is <strong>{{session('success')}}</strong> 
                            Please answer the call and follow the intruction. Once you are verified, you can then login
                            <a class="btn  btn-primary mx-sm-3" href= "{{ route('reverify') }}">Try again</a>
                        </div>
                    @endif

                      <form action="{{ route('login') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="phone_number" class="col-md-4 col-form-label text-md-right">Email</label>
                              <div class="col-md-6">
                                  <input type="text" id="email" class="form-control" name="email" required autofocus>
                                 
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  
                              </div>
                          </div>

                          
                          <div class="col-md-6 offset-md-4">
                            <div>
                            Forgot password? <a class="" href="/forgot-password">Click here</a>
                            </div>
                          </div>
                          <div class="col-md-6 pt-2 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                          
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection