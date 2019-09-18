<?php
require("database.php");
mysqli_select_db($conn,"audit_course");
session_start();
$email=$_SESSION["email"];
$role=$_SESSION["role"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Allotments</title>
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
  	<a class="navbar-brand" href="#">Allotments</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  <div class="navbar-collapse collapse show" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<br>

<section id="main">
  <div class = "container">
    <div class="row">
          <div class="col-md-3">
		            <div class="list-group">
		              <a href="faculty.php" class="list-group-item active main-color-bg">
		                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
		              </a>
		                  	<form action="display.php" method="post">

		              <a href="export.php" class="list-group-item"><span class="glyphicon glyphicon-th-list"  name="export" value="export" aria-hidden="true"> Export<span class="badge"></span></a>
		            	
		            </form>
		    		</div>
					</div>
					<body>
    	<form action="display.php" method="post">
    	<select name='option1' id='option1' >
	    <?php 
	    if($role=="hod")
	    {
	    $depthod=$_SESSION["dept"];
	    $sql="SELECT NAME FROM course WHERE DEPT='$depthod' order by ID";
		}
	    else if ($role=="admin") 
	    {
	    $sql="SELECT NAME FROM course order by ID";   
	    }
	    else if($role=="student")
	    {
	    $sql="SELECT * FROM allotment WHERE EMAILID='$email' ";
	    $result=$conn->query($sql);
	    echo"<table border=3>";
	        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";
	        while ($row = $result->fetch_assoc())
	        {
	            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
	        }
	    }
	    elseif ($role=="faculty") 
	    {  $cname=$_SESSION['CNAME'];
	    	$sql="SELECT * FROM course WHERE NAME='$cname' ";
	    $result=$conn->query($sql);
	    echo"<table border=3>";
	        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";
	        while ($row = $result->fetch_assoc())
	        {
	            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
	        }
	    }
	     echo"</table>";

	
        echo "<label for='option1'>COURSE :</label>"; 
        echo"<option value= >None</option>";
        foreach ($conn->query($sql) as $row)
        {
        echo "<option name=$row[NAME] value=$row[NAME]>$row[NAME]</option>"; 
        }
        echo "</select>";
        ?>
        </select>
        <input type="submit" name="search" value="Go" class="btn btn-primary">
        <button input type="submit" name="submit" value="submit" class="btn btn-primary">Show All</button><br><br>
        <?php
			if($role=="admin")
				{
				if(isset($_POST['search']))
				{
				    $valueToSearch = $_POST['option1'];
				    $_SESSION["x"]=$valueToSearch;
				    $x=implode("",$_POST);
				    $query = "SELECT * FROM allotment WHERE CNAME='$valueToSearch'";
				    $search_result = filterTable($query);
				    $result=$conn->query($query);
				    $_SESSION["x"]=$search_result;
			        echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";$i=0;
			        while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
			        echo"</table>";
		    	}
				else if(isset($_POST['submit']))
				{
			        $query="SELECT * FROM allotment ORDER BY CID ASC";
			        $result = mysqli_query($conn,$query);
			        echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";
			        while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
			        echo"</table>";
				}
			}
			else if($role=="hod")
			{ 
		        if(isset($_POST['search']))
		        {
				    $valueToSearch = $_POST['option1'];
				    $_SESSION["x"]=$valueToSearch;
				    $x=implode("",$_POST);
				    $query = "SELECT * FROM allotment WHERE CNAME='$valueToSearch'";
				    $search_result = filterTable($query);
				    $result=$conn->query($query);
				    $_SESSION["x"]=$search_result;
			        echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";$i=0;
			        while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
			        echo"</table>";
		    	}
		 		else if(isset($_POST['submit']))
		 		{
			     	$sql="SELECT NAME FROM course WHERE dept='$depthod'";
			    	$result = mysqli_query($conn,$sql);
			    	$i=0;
			    	while($row = mysqli_fetch_array($result))
			    	{
			    	$courses[$i]=$row['NAME'];
			    	$i++;
			    	}
			    	foreach($courses as $c)
			    	{
			            echo"$c";
			            echo"<br><br>";
			            $query="SELECT * FROM allotment where CNAME='$c'";
			            $result = mysqli_query($conn,$query);
			            echo"<table border=3>";
			            echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";
				        while ($row = $result->fetch_assoc())
				        {
				            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
				        }
				        echo"</table>";
				        echo"<br>";
			        }
		   		}
			}
			else if($role=="student")
			{ 
		        if(isset($_POST['search']))
				{
				    $valueToSearch = $_POST['option1'];
				    $_SESSION["x"]=$valueToSearch;
				    $x=implode("",$_POST);
				    $query = "SELECT * FROM allotment WHERE CNAME='$valueToSearch'";
				    $search_result = filterTable($query);
				    $result=$conn->query($query);
				    $_SESSION["x"]=$search_result;
			        echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";$i=0;
			        while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
			        echo"</table>";
		    	}
		 		else if(isset($_POST['submit']))
		 		{
			     	$sql="SELECT * FROM allotment WHERE EMAILID='$email'";
			    	$result = mysqli_query($conn,$sql);
			    	$i=0;
			     	echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";
			            while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
		            echo"</table>";
		            echo"<br>";
		        }
			}


			else if($role=="faculty")
			{ 
		        if(isset($_POST['search']))
				{
				    //$valueToSearch = $_POST['option1'];
				    //$_SESSION["x"]=$valueToSearch;
				    //$x=implode("",$_POST);
				    $query = "SELECT * FROM allotment WHERE CNAME='$cname'";
				    $search_result = filterTable($query);
				    $result=$conn->query($query);
				    $_SESSION["x"]=$search_result;
			        echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";$i=0;
			        while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
			        echo"</table>";
		    	}
		 		else if(isset($_POST['submit']))
		 		{
			     	$sql="SELECT * FROM allotment WHERE CNAME='$cname'";
			    	$result = mysqli_query($conn,$sql);
			    	$i=0;
			     	echo"<table border=3>";
			        echo"<tr><td>FNAME</td><td>MNAME</td><td>LNAME</td><td>RNO</td><td>EMAILID</td><td>CID</td><td>CNAME</td></tr>";
			            while ($row = $result->fetch_assoc())
			        {
			            echo"<tr><td>{$row['FNAME']}</td><td>{$row['MNAME']}</td><td>{$row['LNAME']}</td><td>{$row['RNO']}</td><td>{$row['EMAILID']}</td><td>{$row['CID']}</td><td>{$row['CNAME']}</td></tr>";
			        }
		            echo"</table>";
		            echo"<br>";
		        }
			}


			function filterTable($query)
			{
		    $connect = mysqli_connect("localhost", "root", "123456", "audit_course");
		    $filter_Result = mysqli_query($connect, $query);
		    return $filter_Result;
			}














		?>
		</form>
	</body>
</html>

