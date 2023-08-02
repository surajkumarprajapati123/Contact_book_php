<?php

include_once "common/header.php";

?>

<style>
.wrapper { padding-top:30px; }
</style>
<main role="main" class="container">
<div class="row justify-content-center wrapper">
<div class="col-md-6">

<!-- jb hum sign per click karete hai show pop messsage -->
	<?php
	if(!empty($_SESSION['success'])){
     ?>
	 <div class='alert alert-success text-center'>
		<?php echo $_SESSION['success']; ?>
	 </div>

	 <?php
	unset($_SESSION['success']);
	}
	?>

<!-- All errors show when ever nothing fill the any element -->
	<?php
	if(!empty($_SESSION['errors'])){
     ?>
<div class='alert alert-danger'>
	<ul>
		<?php
		 foreach($_SESSION['errors'] as $error)
		 {
		 print '<li>' . $error . '</li>';
		 }
		?>
	</ul>

</div>

	<?php
	unset($_SESSION['errors']);
	}
	?>

<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Sign up</h4>
</header>
<article class="card-body">
<form method="POST" action="<?php echo SITEURL.'actions/signup_action.php' ?>">
	<div class="form-row">
		<div class="col form-group">
			<label>First name </label>   
		  	<input type="text" name="fname" class="form-control" placeholder="First Name">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Last name</label>
		  	<input type="text" name="lname" class="form-control" placeholder="Last Name">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Email address</label>
		<input type="text" name="email" class="form-control" placeholder="">
		
	</div>
	<div class="form-group">
		<label>Password</label>
	    <input class="form-control" type="password" name="password">
	</div>  
	<div class="form-group">
		<label>Confirm Password</label>
	    <input class="form-control" type="password" name="cpassword">
	</div>  
    <div class="form-group">
        <button type="submit" name="register" class="btn btn-primary btn-block"> Register</button>
    </div>   
                                         
</form>
</article> 
<div class="border-top card-body text-center">Have an account? <a href="<?php echo SITEURL .'login.php' ?>">Log In</a></div>
</div> 
</div> 

</div>
</main>
<style>
   body { background-image: url("<?php echo SITEURL . "public/images/signin.jpg"; ?>");
    background-repeat: no-repeat; background-size:cover;
    }
</style>
<?php
include_once "common/fotter.php"; 
?>
</body>
</html>
