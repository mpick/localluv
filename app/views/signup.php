<div class="container">
 <div class='col-lg-8 col-lg-offset-2'>
    <h2>Create Account</h2>
    <form action='' method='post' data-validate="parsley">
    
<fieldset>
<p><label for='username'>Username</label></p>
<p><input type='text' name='username' class='form-control col-lg-4' style="width:300px" data-type='alphanum' data-required='true' data-error-message='Invalid username'></p>
</fieldset>
<fieldset>
<p><label for='email'>Email</label></p>
<p><input type='email' name='email' data-required='true' data-remote="/ajax/checkEmail" class='form-control' style="width:300px" placeholder='Email'></p>
</fieldset>
<fieldset>
<p><label for='password'>Password</label></p>
<p><input type='password' id='tpassword' data-required='true' name='password' class='form-control' style="width:300px"></p>
<p><label for='password_confirm'>Confirm Password</label></p>
<p><input type='password' id='password_confirm' name='password_confirm' class='form-control' style="width:300px" data-required='true' data-equalto='#tpassword' data-error-message='Passwords must match.'></p>
</fieldset>
<fieldset>
<p><label for='firstName'>Name</label></p>
<p><input type='text' name='firstName' class='form-control' style="width:300px" data-required='true' placeholder='First'></p><p><input type='text' class='form-control' name='lastName' style="width:300px" data-required='true' placeholder='Last'></p>



</fieldset>
<fieldset class='input-xlarge'>
  <p><button type='submit' class='btn' style="width:300px">Sign Up</button></p>
</fieldset>
</form>

  </div>
</div>
