<?php

use App\View\RegisterView;

include('./template/navbar.php'); 
require_once('./app/view/RegisterView.php');
 $registerView = new RegisterView();
 $registerView->validateUserPost();
 $userExist = $registerView->checkIfUserExisted();
 var_dump($userExist);
 if(!$userExist)
 {
  
  $registerView->register();
 }
?>

<h1>Register</h1>
<div class="card flex m-5 p-5 bg-secondary">

<form  method="post" target="_self">
<?=$registerView->component?>
  <div class="form-group">

    <label for="exampleInputEmail1">Email address</label>
    <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" minlength="4">
  </div>

  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


<?php include('./template/footer.php'); ?>