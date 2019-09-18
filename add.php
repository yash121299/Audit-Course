<?php
	require("database.php");
	mysqli_select_db($conn,"audit_course");
	$msg = "";
	$msgClass = "";
	session_start();
	$email=$_SESSION["email"];
    $c;
	if(filter_has_var(INPUT_POST, "submit"))
	{
		$c_id = htmlspecialchars($_POST["c_id"]);
		$cname = htmlspecialchars($_POST["cname"]);
		$dept=htmlspecialchars($_POST["dept"]);
        $min = htmlspecialchars($_POST["min"]);
		$max = htmlspecialchars($_POST["max"]);
	$query = "INSERT INTO course(ID,NAME,DEPT,MIN,MAX) VALUES('$c_id','$cname','$dept','$min','$max')";
	if(mysqli_query($conn, $query))
			{

			$msg =  'Course Added';
			$msgClass = 'alert-success';
			$_SESSION['message'] = 'Course Added';
			$_SESSION['messageclass'] ="$msgclass";
			header("Location: admin.php");
			} 
			else 
			{
		    $error=	"Course " .$cname. " Already Exists";	
			$msg =  "$error";
			$msgClass = 'alert-danger';
			$_SESSION['message'] = "$msg";
			$_SESSION['messageclass'] ="$msgclass";
			header("Location: admin.php");	
			}
	}
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Add Course</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<div class = "row">
			<div class ="col-md-2">
				<img src="Somaiya.png" alt="Somaiya" width="250" height="100"/>
			</div>
			<div class ="col-md-8 offset-md-0">	
				<h2 align="center" style='color: white; font-size: 50px'>K.J. Somaiya College of Engineering</h2>
				<h4 align="center" style='font-size: 30px'><font color="white">(Autonomous College affiliated to University of Mumbai)</font>
				</h4>
			</div>	
		</div>
	</head>
    <body>
    	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  	<a class="navbar-brand" href="#">Add Course</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarColor01">
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
		<section id="main">
			<div class="container">
				<div class="row">
			       <div class="col-md-3">
					    <div class="list-group">
			              	<a href="admin.php" class="list-group-item active main-color-bg">
			                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
		              		</a>
			               	<a href="admin.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true" class="active"></span>  Profile <span class="badge"></span></a>
			              	<a href="#" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add Course <span class="badge"></span></a>
			              	<a href="allocate.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Allocate Course <span class="badge"></span></a>
			              	<a href="display.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Display Allocation<span class="badge"></span></a> 		
			    		</div>
					</div>
					<div class="col-md-8">
						<?php if($msg != ''): ?>
		    			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
			    		<?php endif; ?>	
						<form name=myForm method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class="panel panel-default form-panel" >
						 		<div class="panel-body">
							  		<fieldset>
							    		<div class="form-group">
							    			<div class="panel-heading main-color-bg" style="font-size: 24px; color: white">
								    		Enter Course Details
								    		</div>
							  				<label for="c_id">Course ID</label>
											<input type="text" name="c_id" id="c_id" class="form-control" value="<?php echo isset($_POST['c_id']) ? $c_id : ''; ?>" required>
											<br>
											<label for="cname">Course Name</label>
											<input type="text" name="cname" id="cname" class="form-control" value="<?php echo isset($_POST['cname']) ? $cname : ''; ?>" required>
											<br>
											<label for="dept">Department</label>
											<input type="text" name="dept" id="dept" class="form-control" value="<?php echo isset($_POST['dept']) ? $dept : ''; ?>" required>
											<br>
											<label for="min">Minimum Intake</label>
											<input type="text" name="min" id="min" class="form-control" value="<?php echo isset($_POST['min']) ? $min : ''; ?>" required>
											<br>
											<label for="max">Maximum Intake</label>
											<input type="text" name="max" id="max" class="form-control" value="<?php echo isset($_POST['max']) ? $max : ''; ?>" required>
											<br>
							    		</div>
							    		<button type="submit" name="submit" class="btn btn-primary" style="float:right !important">Submit</button>
							  		</fieldset>
				 				</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer" style="background-color:#24292e ">
				      <p>Copyright KJSCE Audit, &copy; 2019</p>
		</footer>
	</body>
</html>	