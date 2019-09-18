<?php
	require("database.php");
	mysqli_select_db($conn,"audit_course");
    $msg = "";
	$msgClass = "";
	session_start();
	$email=$_SESSION["email"];
	$rno=$_SESSION["rno"];
	$fname=$_SESSION["fname"];
	$mname=$_SESSION["mname"];
	$lname=$_SESSION["lname"];
	if(filter_has_var(INPUT_POST, "submit"))
	{
		$pref1 = htmlspecialchars($_POST["pref1"]);
		$pref2 = htmlspecialchars($_POST["pref2"]);
		$pref3 = htmlspecialchars($_POST["pref3"]);
		if ($pref1 == $pref2 || $pref1 == $pref3 || $pref2 == $pref3)
		{
			$msg = 'Duplicate Entries';
			$msgClass = 'alert-danger';
		}
		else
		{
			$query = "INSERT INTO student(FNAME,MNAME,LNAME,RNO,PREF1,PREF2,PREF3,EMAILID) VALUES ('$fname','$mname','$lname','$rno','$pref1','$pref2','$pref3','$email')";
		
			if(mysqli_query($conn, $query))
			{
			$msg =  'Submitted';
			$_SESSION['message']="$msg";
			$msgClass = 'alert-success';
			header("Location: student.php");
			} 
			else 
			{
			$msg =  'Form Already Submitted';
			$_SESSION['message']="$msg";
            $msgClass = 'alert-danger';
			header("Location: student.php");
			}	
		}	
	}
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Student</title>
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
		</script>
	</head>
    <body>
    	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  			<a class="navbar-brand" href="#">Student</a>
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
		  	<div class="collapse navbar-collapse" id="navbarColor02">
		      	<button onclick="window.location.href='index.php'"  type="submit" name="logout" class="btn btn-default ml-auto mr-1">Log Out</button>
		  	</div>
		</nav>
		<br>
		<br>
		<section id="main">
		  	<div class = "container">
		    	<div class="row">
		          	<div class="col-md-3 ">
				        <div class="list-group">
				            <a href="student.php" class="list-group-item active main-color-bg">
				            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
				            </a>
				            <a href="student.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile<span class="badge"></span></a>
				             <a href="#" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Fill Option Form <span class="badge"></span></a>
				            <a href="display.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Display Allocation<span class="badge"></span></a>		            		
				    	</div>
					</div>
				 	<div class="col-md-8">
				 		<form name=myForm method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="panel panel-default form-panel" >
					        <div class="panel-body">
					        	<fieldset>
					            	<div class="form-group">
						    			<div class="panel-heading main-color-bg" style="font-size: 24px; color: white">
							    		Fill Option Form
							    		</div>
							    		<?php if($msg != ''): ?>
					 					<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
										<?php endif; ?>
										<?php
											$sql="SELECT NAME,ID FROM course order by ID";
											echo "<label for=preference1><b>Preference1:</b></label>				  
										  	<select name=pref1  id=preference1 class=form-control required> "; 
										  	echo"<option value= >None</option>";
											foreach ($conn->query($sql) as $row)
											{
												echo "<option value=$row[ID]>$row[NAME]</option>"; 
											}
											echo "</select>";
										?>
										<br><br>
										<?php
											$sql="SELECT NAME,ID FROM course order by ID"; 
											echo "<label for=preference2>Preference2:</label>
												  <select name=pref2  id=preference2 class=form-control required> "; 
												  echo"<option value= >None</option>";
											foreach ($conn->query($sql) as $row)
											{
												echo "<option value=$row[ID]>$row[NAME]</option>"; 
											}
											echo "</select>";
										?>
										<br><br>
										<?php
											$sql="SELECT NAME,ID FROM course order by ID"; 
											echo "<label for=preference3>Preference3:</label>
												  <select name=pref3  id=preference3 class=form-control required> "; 
												  echo"<option value= >None</option>";
											foreach ($conn->query($sql) as $row)
											{
												echo "<option value=$row[ID]>$row[NAME]</option>"; 
											}
											echo "</select>";
										?>
									</div>
									<br>
									<button type="submit" name="submit" class="btn btn-primary" style="float:right !important">Submit</button>
								</fieldset>
							</div>
						</div>
						</form>
					</div>	
				</div>
			</div>
		</section>
		<footer id="footer" style="background-color: #24292e">
      		<p>Copyright KJSCE Audit, &copy; 2019</p>
		</footer>
	</body>
</html>	
