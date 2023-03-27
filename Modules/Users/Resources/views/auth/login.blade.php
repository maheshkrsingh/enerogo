@extends('users::layouts.auth')
@section('title')
 <title>Login</title>  
@endsection
@section('authentication')
 
     <div class="col-lg-2 col-md-2 col-sm-2 column">
        
     </div>
     <div class="col-lg-8 col-md-8 col-sm-8 column">
            <div class="login-inner">
                <h3 class="text-center">Login your account</h3>
                @if (Session::has('error'))
                <h5 class="alert alert-success" role="alert" >{{ Session::get('error') }}</h5>
                @endif
                <form action={{ route('users.login.post') }} method="post" class="login-form">
                      @csrf
                    <div class="form-group">
                        <i class="far fa-envelope"></i>
                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"   autofocus
                        placeholder="Enter username or email"/>
                        <span class='text-danger'>@error('username') {{ $message }}  @enderror</span>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock-open"></i>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter Password*" autofocus />
                        <span class='text-danger'>@error('password') {{ $message }}  @enderror</span>
                    </div>
                   
                    <div class="form-group btn-box">
                        <button type="submit" class="btn-success btn-sm-group form-control">Login</button>
                    </div>
                   
                    <div class="form-group">
                        {{-- 
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">Remember Me</span>
                            </label>
                        </div>
                         --}}
                    </div>
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <ul class="other-option clearfix">
                    <li><p>Or login with</p></li>
                    <li><a href="account.html"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="account.html"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="account.html"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
        </div>
       <div class="col-lg-2 col-md-2 col-sm-2 column">
        
     </div>
  

@endsection
