<!-- Reference link : "https://developers.google.com/identity/sign-in/web/sign-in"-->
<?php
	$msg = "";
	$msgClass = "";
	if(filter_has_var(INPUT_POST, "submit"))
	{
		session_start();
	    $_SESSION["email"]=htmlentities($_POST["email"]);
		$email = htmlspecialchars($_POST["email"]);
		$pswrd = htmlspecialchars($_POST["pswrd"]);
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		{
			$msg = 'Please use a valid email';
			$msgClass = 'alert-danger';
		}
		else
		{
			$msg =  'Submitted';
			$msgClass = 'alert-success';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css?version=51">
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
	function onSignIn(googleUser) 
	{
		  var profile = googleUser.getBasicProfile();
		  name = profile.getName();
		  pic=profile.getImageUrl();
		  eid=profile.getEmail();
		  var email=profile.getEmail();
		  if(email.includes("somaiya.edu")) //domain constraint
		  {
		  var theForm, newInput1, newInput2, newInput3;
		  theForm = document.createElement('form');
		  theForm.action = 'verify.php';	//enter the page url you want to redirect the index page to after sign in
		  theForm.method = 'post';
		  newInput1 = document.createElement('input');
		  newInput1.type = 'hidden';
		  newInput1.name = 'user';
		  newInput1.value = name;
		  newInput2 = document.createElement('input');
		  newInput2.type = 'hidden';
		  newInput2.name = 'pic';
		  newInput2.value = pic;
		  newInput3 = document.createElement('input');
		  newInput3.type = 'hidden';
		  newInput3.name = 'eid';
		  newInput3.value = eid;
		  theForm.appendChild(newInput1);
		  theForm.appendChild(newInput2);
		  theForm.appendChild(newInput3);
		  document.getElementById('hidden_form_container').appendChild(theForm);
		  theForm.submit();
		  }
		  else
		  {
		 	window.location.href="http://localhost/phpsandbox/index.php";
			alert("Please login using Somaiya Mail ID");
		  }
	}
  	function signOut() 
  	{
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () 
    {
      alert('User signed out.');
    });
  	}
		</script>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  	<a class="navbar-brand" href="#">Audit Course</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  <div class="navbar-collapse collapse show" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>
<section id="main">
  <div class = "container">
    <div class="row">
    	<div class="col-md-4 col-xs-12">
    		<h1 style='color: white; font-size: 45px'>Audit Course</h1>
    		<br><br>
    		<p style='color: white; font-size: 22px'>Auditing a course allows a student to take a class without the benefit of a grade or credit for a course. An undergraduate student who audits a course does so for the purposes of self-enrichment and academic exploration. The course is offered ONLY on a space-availability basis.</p>
    	</div>
    	<div class="col-md-4 col-xs-12">
			<div class="panel panel-default" style="padding: 20px">
	 			<div class="panel-heading main-color-bg">
	 				<h3 class="panel-title"><span class="glyphicon glyphicon-circle-arrow-down"></span>  Sign In Via Google</h3>
				</div>
        	
        		<form method="post" action="process.php">
				<label for="gsign" align="middle">Google Sign In</label>
				<div class="g-signin2" data-onsuccess="onSignIn" align="middle">
				</div>
			</div>
        </div>

        <div class="col-md-4 col-xs-12">
        	<div class="panel panel-default" style="padding: 20px">
        		<div class="panel-heading main-color-bg">
	 				<h3 class="panel-title"><span class="glyphicon glyphicon-circle-arrow-down"></span>  Sign Into Account</h3>
				</div>
				<br>
        		<label id="abc" for="email"><b>Email:</b></label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email-ID" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required>			  
				<br><br>			
			    <label id="abc" for="pswrd"><b>Password:</b></label>
				<input type="password" name="pswrd" id="pswrd" class="form-control" placeholder="Enter Password" value="<?php echo isset($_POST['pswrd']) ? $pswrd : ''; ?>" required>			
				<br><br>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>	
				</form>
			</div>
        </div>
    </div>
  </div>
</section>
 <footer id="footer" style="background-color: #24292e">
  <p style="color:white">Copyright KJSCE &copy; 2019</p>
</footer>	
		<div id="hidden_form_container" style="display:none;"></div>
	</body>
</html>