<?php
    $msg = "";
	$msgClass = "";
    require ("database.php");
	session_start();
	$sql="SELECT * FROM hod WHERE EMAILID ='{$_SESSION['email']}'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) 
    {
        $email= $row['EMAILID'];
        $dept=$row['DEPT']; 
        $_SESSION['dept']=$row['DEPT'];
    }
	$query="SELECT NAME,ID FROM course WHERE DEPT='$dept'";
    $result = mysqli_query($conn,$query);
    $i=0;
    while($row = mysqli_fetch_array($result))
    {   
        $id[$i]=$row['ID'];
        $courses[$i]=$row['NAME'];
        $i++;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HOD</title>
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
            <a class="navbar-brand" href="#">Head of Department</a>
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
            <div class="collapse navbar-collapse" id="navbarColor01">
                <button onclick="window.location.href='index.php'"  type="submit" name="logout" class="btn btn-default ml-auto mr-1">Log Out</button>
            </div>
        </nav>
        <br><br>
        <section id="main">
            <div class = "container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="hod.php" class="list-group-item active main-color-bg">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                            </a>
                            <a href="hod.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true" class="active"></span>  Profile <span class="badge"></span></a>
                            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Display Departmental Courses<span class="badge"></span></a>
                            <a href="display.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Display Allocated Courses<span class="badge"></span></a>      
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-heading main-color-bg">
                                <h3 class="panel-title">You are logged in as<b> <?php  print $email;?></b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-9">
                                    <h3><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> 
                                        Audit Courses :</h3><h4> <b> <?php $i="1";
                                        echo "<br>";
                                        echo "&nbsp&nbsp&nbsp Code&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName";
                                        echo "<br><br>";
                                        foreach($courses as $c)
                                        {
                                            echo $i.". ".$id[$i-1]." : ".$c."<br><br>";
                                            $i++;            
                                        }
                                        ?></b>
                                    </h4>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <footer id="footer" style="background-color: #24292e">
            <p>Copyright KJSCE Audit, &copy; 2019</p>
        </footer>   
    </body>
</html>