@extends('layout.master')
@section('page-title')
 Update Password
@endsection
@section('page-content')

<!-- Page Content -->
<div class="container">
  <div class="row">
     
    <div class="col-md-6">

      <h2 class="card-title  mt-5">Update Your Password</h2>
      <div class="card mb-4">
        <div class="card-body">
          
          <form class="row" id='update_password_form' method="POST" action="{{ route('update_user_password') }}" data-parsley-validate>
                       
            <div class="form-group col-md-12">
              <label class="font-weight-bold">New Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required data-parsley-minlength="8" data-parsley-maxlength="200">              
            </div>
            <div class="form-group col-md-12">
              <label class="font-weight-bold">Re-type Password</label>
              <input type="password" class="form-control" name="retype-password" placeholder="Re-type your password" data-parsley-equalto="#password" required data-parsley-equalto-message='** Password are not matching'>              
            </div>
            <input type="hidden" name="access_token" value="{{ $access_token }}">
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success">Update Password</button>
            </div>            
            
          </form>
        </div>
        
      </div>
       
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

@endsection

@section('page-scripts')
  <script src="{{ URL::to('public/assets/js/update_password.js') }}"></script>
@endsection