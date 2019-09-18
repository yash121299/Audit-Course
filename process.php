<?php
	$msg = "";
	$msgClass = "";
	require ("database.php");
	$email = htmlspecialchars($_POST["email"]);
	$pswrd = htmlspecialchars($_POST["pswrd"]);
	$email=stripcslashes($email);
	$pswrd=stripcslashes($pswrd);
	session_start();
	$_SESSION["email"]=htmlentities($_POST["email"]);
	mysqli_select_db($conn,"audit_course");
	$result = mysqli_query($conn,"select * from login where EMAILID ='$email' and PASSWORD='$pswrd'")
	or die("Failed to query database");
	$row=mysqli_fetch_array($result);
	if($row['EMAILID']==$email && $row['PASSWORD']==$pswrd)
	{
		$_SESSION['role']=$row['ROLE'];
		header("Location: role.php");
	}
	else
	{
		$msg = 'Please use a valid Email ID and Password';
		$msgClass = 'alert-danger';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Invalid Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<div class = "row">
			<div class ="col-md-2">
				<img src="Somaiya.png" alt="Somaiya" width="250" height="100"/>
			</div>
			<div class ="col-md-8 offset-md-0">	
				<h2 align="center" style='color: white; font-size: 50px'>K.J. Somaiya College of Engineering</h2>
				<h4 align="center" style='font-size: 30px'><font color="white">(Autonomous College affiliated to University of Mumbai)</font></h4>
			</div>	
		</div>
		<meta charset = "utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="google-signin-client_id" content="444425785443-5mh44gn88jrf46t217t7i4m62r4ui1ro.apps.googleusercontent.com">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script type="text/javascript">
	
	function signOut() 
	{
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () 
	    {
	      alert('User signed out.');
	      document.location.href = 'index.php';

	    });
  	}
   function onLoad() 
   {
	      gapi.load('auth2', function() 
	      {
	        gapi.auth2.init();
	        
	      });
    }
	</script>
	</head>	
	<body>
  		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  			<a class="navbar-brand" href="#">Invalid Login Credentials</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="navbar-collapse collapse show" id="navbarColor01" style="">
    			<ul class="navbar-nav mr-auto">
	      			<li class="nav-item active">
	        			<a class="nav-link" href="index.php">Return <span class="sr-only"></span></a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="#">About</a>
	     			 </li>
    			</ul>
  			</div>
		</nav>
		<br><br>
		
		<footer id="footer" style="background-color: #24292e">
      		<p>Copyright KJSCE Audit, &copy; 2019</p>
		</footer>	
    </body>
</html>
<!--
<!DOCTYPE html>
<html>
	<head>
		<title>Inavlid</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
		<img src="collegeplate.jpg" alt="KJSCE" width='100%' height="200"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	</head>	
	<body>
		<nav class="navbar navbar-default">
		  <div class="container">
			<div class="navbar-header">    
			  <a class="navbar-brand">Invalid Login Credentials</a>
			</div>
		  </div>
		</nav>
		<div class="container">
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
		</div>
		<nav class="navbar navbar-default">
		  <div class="container">
			<div class="navbar-header">    
			  <a class="navbar-brand" href="index.php">Return</a>
			</div>
		  </div>
		</nav>
	</body>
</html>	
-->		