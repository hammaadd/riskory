@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{URL::route('adminProfile')}}">Profile</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit password</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
     <div class="card shadow">
         <div class="card-header text-center">
         <span class="text-center">Update admin password</span>
         </div>
         <div class="card-body">
         <form method="POST" action="{{URL::route('updateAdminPassword')}}">
            @csrf
            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
         @endforeach 
         <label for="old_password">Old password</label>
                <div class="input-group mb-3">
                    
                    
                  <input type="password" class="form-control shadow-sm" id="old_password" name="old_password" required>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary shadow-sm" type="button" id="oldPasswordView" onclick="showPassword('old_password')"><i class="fas fa-eye"></i></button>
                  </div>
                </div>
                <label for="new_password">New password</label>
                <div class="input-group mb-3">
                   
                  <input type="password" class="form-control shadow-sm" id="new_password" name="new_password" required oninput="Validate()">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary shadow-sm" type="button" id="newPasswordView" onclick="showPassword('new_password')"><i class="fas fa-eye"></i></button>
                  </div>
                </div>
                <label for="confirm_password">Confirm</label>
                <div class="input-group mb-3">
                    
                  <input type="password" class="form-control shadow-sm" id="confirm_password" name="confirm_password" required oninput="Validate()">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary shadow-sm" type="button" id="confirmPasswordView" onclick="showPassword('confirm_password')"><i class="fas fa-eye"></i></button>
                  </div>
                </div>
                
                <button type="submit" id="submit" class="float-right btn btn-outline-secondary">Update</button>
              </form>
               
         </div>
       </div>
    </div>
 </div>



@endsection

@section('scripts')

<script>
function showPassword(id){
    if('password' == $('#'+id).attr('type')){
         $('#'+id).prop('type', 'text');
    }else{
         $('#'+id).prop('type', 'password');
    }
}

    function Validate() {
          var password = document.getElementById("new_password").value;
          var confirmPassword = document.getElementById("confirm_password").value;
          var value = document.getElementById('confirm_password').value;

          if (password != confirmPassword) {
              document.getElementById("confirm_password").classList.remove('is-invalid');
              document.getElementById("confirm_password").classList.remove('is-valid');
              document.getElementById("confirm_password").classList.add('is-invalid');
              document.getElementById("submit").style.visibility = "hidden";
              
              
          }else if(value.length < 8){
            document.getElementById("confirm_password").classList.remove('is-invalid');
            document.getElementById("confirm_password").classList.remove('is-valid');
            document.getElementById("confirm_password").classList.add('is-invalid');
            document.getElementById("submit").style.visibility = "hidden";

            
          }else{
               document.getElementById("confirm_password").classList.remove('is-invalid');
              document.getElementById("confirm_password").classList.remove('is-valid');
              document.getElementById("confirm_password").classList.add('is-valid');
              document.getElementById("submit").style.visibility = "visible";
          }
      }
  
  </script>
@endsection