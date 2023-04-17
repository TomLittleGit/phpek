<?php
session_start();
require_once('./app/controller/UserController.php');
use App\Controller\UserController;

$email = "";
$error = "";
if (isset($_POST['email'])) {
  $controller = new UserController();
  $result = $controller->login($_POST['email'], $_POST['password']);
  if($result)
  {
    header('location:profile.php');
  }
  else
  {
   $error =  "user pass wrong";
  }
 
}
include('./template/navbar.php');

?>
<div class="m-3">
  <h1>Login</h1>
  
  <div class="card flex m-5 p-5 bg-secondary bg-opacity-10">
  <?= $email ?>
    <form method="post" class="">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
<?php include('./template/footer.php'); ?>