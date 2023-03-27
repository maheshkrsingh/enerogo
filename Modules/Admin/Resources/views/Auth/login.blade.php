@extends('users::layouts.auth')
@section('title')
 <title>Login</title>  
@endsection
@section('authentication')
 
     <div class="col-lg-2 col-md-2 col-sm-2 column">
        
     </div>
     <div class="col-lg-8 col-md-8 col-sm-8 column">
            <div class="login-inner">
                <h3 class="text-center">Admin</h3>
                @if (Session::has('error'))
                <h5 class="alert alert-success" role="alert" >{{ Session::get('error') }}</h5>
                @endif
                <form action={{ route('admin.login.post') }} method="post" class="login-form">
                      @csrf
                    <div class="form-group">
                      
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   
                         placeholder="Enter your email *"/>
                        <span class='text-danger'>@error('email') {{ $message }}  @enderror</span>
                    </div>
                    <div class="form-group">
                     
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter your password *" autofocus />
                        <span class='text-danger'>@error('password') {{ $message }}  @enderror</span>
                    </div>
                   
                    <div class="form-group btn-box">
                        <button type="submit" class="btn-success btn-sm-group form-control">Login</button>
                    </div>
                   
                    <div class="form-group">
                       
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