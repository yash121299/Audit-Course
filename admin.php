<?php

    $msg = "";
	$msgClass = "";
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "audit_course";
    $email=$_SESSION["email"];
$conn = new mysqli($servername, $username, $password, $dbname);
$msg=$_SESSION['message'];
if($_SESSION['message']=='Course Added')
$msgClass = 'alert-success';
else
	$msgClass = 'alert-danger';

//$msgClass = $_SESSION['messageclass'];

$_SESSION['message'] = null; 
$conn->close();
?>
<!DOCTYPE html>
    <html>
    	<head>
			<title>Admin</title>
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
		  	<a class="navbar-brand" href="#">Administrator</a>
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
<br>
<br>
<section id="main">
  <div class = "container">
    <div class="row">
          <div class="col-md-3">
		            <div class="list-group">
		              <a href="admin.php" class="list-group-item active main-color-bg">
		                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
		              </a>
		               <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true" class="active"></span>  Profile <span class="badge"></span></a>
		              <a href="add.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add Course <span class="badge"></span></a>
		              <a href="allocate.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Allocate Course <span class="badge"></span></a>
		              <a href="display.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Display Allocation<span class="badge"></span></a>
		            		
		    		</div>
					</div>
		 


				<div class="col-md-9">
				<div class="panel panel-default">
			          <div class="panel-heading main-color-bg">
			            <h3 class="panel-title">You are logged in as<b> <?php  print $email;?></b></h3>
			          </div>
			          <div class="panel-body">
			            <div class="col-md-9">
			              
			                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Name: <b>Admin</b>
			                </h2>
			                <?php if($msg != ''): ?>
				 <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
				<?php endif; ?>
			            </div>
			        </div>
			    </div>
			    </div>
    </div> 
 </div>
</section>
<footer id="footer" style="background-color:#24292e ">
      <p>Copyright KJSCE Audit, &copy; 2019</p>
</footer>
		
    </body>
</html>			
