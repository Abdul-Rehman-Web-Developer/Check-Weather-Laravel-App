@extends('layout.master')
@section('page-title')
 Recover Account
@endsection
@section('page-content')

<!-- Page Content -->
<div class="container">
  <div class="row">
   
    <div class="col-md-6">

      <h2 class="card-title  mt-5">Recover Your Account</h2>
      <div class="card mb-4" id='account_recovery_form_container'>
        <div class="card-body">
          
          <form class="row" id='account_recovery_form' method="POST" action="{{ route('recover_account') }}" data-parsley-validate>
                       
            <div class="form-group col-md-12">
              <label class="font-weight-bold">Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email address" required data-parsley-type="email" data-parsley-maxlength="1000"  >              
            </div>
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success">Send Account Recovery Email</button>
            </div>            
            
          </form>
        </div>
        
      </div>
 
      <div class="alert alert-info" role="alert">
        Make sure you provide the same Email Address that you provided at the time of registration.
      </div>
      
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

@endsection

@section('page-scripts')
  <script src="{{ URL::to('public/assets/js/forgot_password.js') }}"></script>
@endsection