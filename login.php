<?php 
include_once "./common/header.php";
require_once "./includes/config.php";
 ?>
<style>
.wrapper { padding-top:30px; }
</style>
<main role="main" class="container">
<div class="row justify-content-center wrapper">
<div class="col-md-6">
<?php
if (!empty($_SESSION['errors'])) {
    ?>
<div class="alert alert-danger">
<!-- <p>There were following error(s) found:</p> -->
<ul>
    <?php

 foreach ($_SESSION['errors'] as $error) {
        print '<li>' . $error . '</li>';
    }
    ?>
</ul>
</div>
<?php
unset($_SESSION['errors']);
}
?>
<div class="card mt-5">
<header class="card-header">
	<h4 class="card-title mt-3">Sign In</h4>
</header>
<article class="card-body">
<form method="POST" action="<?php echo SITEURL . "actions/login_action.php";?>">
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email">
	</div> 
	<div class="form-group">
		<label>Password</label>
	    <input class="form-control" type="password" name="password" placeholder="password">
	</div>   
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-success btn-block"> Login  </button>
    </div>       
</form>
</article>
<div class="border-top card-body text-center">Haven't an account? <a href="<?php echo SITEURL . "signup.php";?>">Sign Up</a></div>
</div>
</div>

</div>
</main>
<style>
   body { background-image: url("<?php echo SITEURL . "public/images/login.jpg"; ?>");
    background-repeat: no-repeat; background-size:cover;
    }
</style>
<?php
include_once "./common/fotter.php"; 
 ?>