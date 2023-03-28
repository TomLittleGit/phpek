<?php include('./template/navbar.php'); ?>
<div class="m-3">
<h1>Login</h1>
<div class="card flex m-5 p-5 bg-secondary bg-opacity-10">
<form action="" class="">
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
<?php include('./template/footer.php'); ?>