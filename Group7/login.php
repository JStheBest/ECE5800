<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>
<?php
	require "header.php";

?>
<body>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:800px;height:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:20rem">Login</h1>
					<br>
						<form action="login.inc.php" method="post">
							<div class="form-group" style="margin-left:18rem">
								<label for="emailinput">Email or Username</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="mail" id="emailinput" placeholder="Email or Username">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:18rem">
								<label for="passwordInput">Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="password" class="form-control" name="pwd" id="passwordInput" placeholder="Password">
									</div>

								</div>
							</div>
							<div class="form-group" style="margin-left:18rem">
							<?php
										if (isset($_GET['error']))
										{
											
											if ($_GET['error'] == "emptypwd&email")
											{
												echo '<small class="text-danger"> Fill in Email and Password! </small>';
											}
											else if ($_GET['error'] == "emptyemail")
											{
												echo '<small class="text-danger"> Fill in Email! </small>';
											}
											else if ($_GET['error'] == "emptypwd")
											{
												echo '<small class="text-danger"> Empty Password! </small>';
											}
											else if ($_GET['error'] == "sqlerror")
											{
												echo '<small class="text-danger"> Sorry, something went wrong with our database. Please contact us for assistance. </small>';
											}
											else if ($_GET['error'] == "wrongPWD")
											{
												echo '<small class="text-danger"> Wrong Password! </small>';
											}
											else if ($_GET['error'] == "nosuchuser")
											{
												echo '<small class="text-danger"> User Not Exist! </small>';
											}
										}
							?>
							</div>

							<div class="form-group" style="margin-left:20rem">
								<button type="submit" class="btn btn-lg btn-primary" name="login-submit">Login</button>
							</div>
							
						</form>
					<br>
				</section>
			</div>
		<br>
		<br>
		</div>
	</main>
</body>
</html>
<?php
    require "footer.php"
?>  