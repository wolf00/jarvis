<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="search_contractor/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="search_contractor/css/style.css"> <!-- Gem style -->
		<link rel="stylesheet" href="search_contractor/css/site_info_css.css">
		<script src="search_contractor/js/modernizr.js"></script> <!-- Modernizr -->
	    <!--<link rel="stylesheet" href="css/style.css"> <!-- CSS reset -->
		<script type="text/javascript" src="search_contractor/js/jquery.cycle.all.js"></script> 
		<title>Converge: Contractor's group</title>
		
		
	</head>
<body>
	<header role="converge">
	<div align="left"><a href="admin_home.html"><h1 class="toptitle">CONVERGE</h1><!img src="logo.png" id="main-logo"></a></div>
	</header>
		<div class="nav-bar">
		<nav class="main-nav">
		<div class="greeting">
			Hello Admin
		</div>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="logout.php">Logout</a></li>
			</ul>
		</div>
		</nav>
	</div>	
	<div id="box">
	<div class="search-bar" align="center">
	<form action=""  method="POST" class="search-form frame inbtn rlarge">
		<input type="text" name="search" class="search-input" placeholder="Search for Contractor .." />
		<input class="search-btn" type="submit" name="Submit" value="Go" />        
	</form>
	</div>
	<footer class="footer-distributed">
		<div class="footer-left">
			<p class="footer-links" align="right">
					<a href="#">Home</a>
					�	
					<a href="#">Advertising</a>
					�
					<a href="try.php">Contact</a>
					�
					<a href="aboutus.html">About us</a>
			</p>
			<p>Company Name &copy; 2015</p>
		</div>
		</footer>

</body>
<?php

  mysql_connect('localhost','root','')OR die('Could not connect to MySQL: ' .mysqli_connect_error());
  mysql_select_db('jarvis');
  session_start();
 

    if(isset($_POST["Submit"]))
      {
		$c_email=$_POST['search'];
		$_SESSION['c_email']=$c_email;
		
           if( empty($c_email))
              {
                  echo "<script>alert( 'Please provide Contractor's Valid Email ID!' ); </script>";
               }
	       else
	          {    
		         $query=mysql_query("SELECT * FROM users WHERE EMAIL='$c_email'") or die("Invalid Query".mysql_error());
		         $row=mysql_fetch_array($query);
		         $_SESSION['email']=$row['EMAIL'];
		         if(mysql_num_rows($query)!=0)
				 {
		           if(isset($_SESSION['email']))
			          header("Location:admin_contractor_profile.php");
				 }
				 else
					 echo '<script> alert("Invalid Contractor Email Entered. Enter Again");</script>';
	           }
       }

 ?>
 </html>