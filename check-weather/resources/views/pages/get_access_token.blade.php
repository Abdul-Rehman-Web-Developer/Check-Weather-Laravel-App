@extends('layout.master')
@section('page-title')
 Get Access Token
@endsection
@section('page-content')

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="alert alert-success col-md-12 mt-4 d-none access_token_alert" role="alert">
            
    </div> 
    <div class="col-md-12">
      <h2 class="card-title  mt-5">Get Access Token</h2>
      <div class="card mb-4" >
        <div class="card-body">
          
          <form class="row" id='get_access_token_form' method='POST' action="{{ route('get_user_access_token') }}" data-parsley-validate>
            
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Email Address</label>
              <input type="text" class="form-control" name="email" placeholder="Enter your email address" required data-parsley-type="email">              
            </div>
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your password" required>              
            </div>
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success">Get Access Token</button>
            </div>            
            
          </form>
        </div>
        
      </div>
      <div class="text-center font-weight-bold">
        <a href="{{ route('forgot_password') }}" >Forgot Password?</a>
      </div>
      
      
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

@endsection

@section('page-scripts')
  <script src="{{ URL::to('public/assets/js/get_access_token.js') }}"></script>
@endsection