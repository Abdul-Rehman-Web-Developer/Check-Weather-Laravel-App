@extends('layout.master')
@section('page-title')
 Register
@endsection
@section('page-content')

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="alert alert-success col-md-12 mt-4 d-none registration_alert" role="alert">
            
    </div> 
    <div class="col-md-6">

      <h2 class="card-title  mt-5">Register Your Account</h2>
      <div class="card mb-4" id='get_access_token_form_container'>
        <div class="card-body">
          
          <form class="row" id='registration_form' method="POST" action="{{ route('register_user') }}" data-parsley-validate>
                       
            <div class="form-group col-md-12">
              <label class="font-weight-bold">Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email address" required data-parsley-type="email" data-parsley-maxlength="1000"  >              
            </div>
            <div class="form-group col-md-12">
              <label class="font-weight-bold">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required data-parsley-minlength="8" data-parsley-maxlength="200">              
            </div>
            <div class="form-group col-md-12">
              <label class="font-weight-bold">Re-type Password</label>
              <input type="password" class="form-control" name="retype-password" placeholder="Re-type your password" data-parsley-equalto="#password" required data-parsley-equalto-message='** Password are not matching'>              
            </div>
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success">Register</button>
            </div>            
            
          </form>
        </div>
        
      </div>
      <div class="text-center font-weight-bold mb-5">
        <a href="{{ route('forgot_password') }}" >Forgot Password?</a>
      </div>
      
      
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

@endsection

@section('page-scripts')
  <script src="{{ URL::to('public/assets/js/register.js') }}"></script>
@endsection