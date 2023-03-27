@extends('users::layouts.auth')
@section('title')
 <title>Register</title>  
@endsection
@section('authentication')
  <div class="col-lg-2 col-md-2 col-sm-2 column" >
   </div>
  <div class="col-lg-8 col-md-8 col-sm-8 column">
    <div class="register-inner">
        <h3 class="text-center" >Register your account</h3>
        @if (Session::has('message'))
        <h5 class="alert alert-success" role="alert" >{{ Session::get('message') }}</h5>
        @endif
        <form action={{ route('users.register.post') }} method="post">
            @csrf
            <div class="form-group">
                <i class="far fa-envelope"></i>
                <input type="email" name="email" placeholder="Emai Address*" />
                <span class='text-danger'>@error('email') {{ $message }}  @enderror</span>
            </div>
          
            <div class='row'>
                <div class="col-lg-6 col-md-6 col-sm-6 column">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="firstname" placeholder="Enter your firstname *" />
                        <span class='text-danger'>@error('firstname') {{ $message }}  @enderror</span>
                    </div>
                </div>
             
                <div class="col-lg-6 col-md-6 col-sm-6 column">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="middlename" placeholder="Enter your middlename *" />
                        <span class='text-danger'>@error('middlename') {{ $message }}  @enderror</span>
                    </div>
                </div>
            </div>
            <br/>
            <div class='row'>
                <div class="col-lg-6 col-md-6 col-sm-6 column">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lastname" placeholder="Enter your lastname *" />
                        <span class='text-danger'>@error('lastname') {{ $message }}  @enderror</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 column">
                    <div class="form-group">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="mobile_number" placeholder="Enter your mobile number *" />
                        <span class='text-danger'>@error('mobile_number') {{ $message }}  @enderror</span>
                    </div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <i class="fas fa-lock-open"></i>
                <input type="password" name="password" placeholder="Enter Password*" />
                <span class='text-danger'>@error('password') {{ $message }}  @enderror</span>
            </div>
            <div class="form-group">
                <i class="fas fa-lock-open"></i>
                <input type="password" name="confirmpassword" placeholder="Enter Confirm Password*" />
                <span class='text-danger'>@error('confirmpassword') {{ $message }}  @enderror</span>
            </div>
            <div class="form-group btn-box">
                <button type="submit" class="btn-sm-group btn-success form-control">Register</button>
            </div>
        </form>
        <br/>
        <br/>
        <div class="text-center">
            <p><span>You have already account. <a class='' href={{ route('users.login') }}>Sign in</a></span></p>
        </div>
  </div>
 <div class="col-lg-2 col-md-2 col-sm-2 column">
  </div>

@endsection