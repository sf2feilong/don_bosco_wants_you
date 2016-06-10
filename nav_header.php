<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Mega Man X Vault</title>
<link rel="stylesheet" href="includes/web_style.css" type="text/css" />
</head>

<body>	
     <div id="wrapper">
        <div id="menu">
        	<nav id="nav_wrap">
            	<div id="navigation">
                	<ul class="top-level">
                        <li>
                        <?php
                        if(isset($_SESSION['user'])){
                    echo 'Welcome '; echo $_SESSION['user']; echo ' <a href="logout.php">Logout</a> ';
                }else{
                    echo 'You are not logged in.';
                }
            ?>
        </li>
           
                    	<li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="#">Annoucements</a>
                        	<ul class="sub-level">
                            	<li><a href="#">Student Affairs Office</a></li>
                                <li><a href="#">Guidance Office</a></li>
                                <li><a href="#">Dean's Office</a></li>
                                <li><a href="#">Faculty</a></li>
                                <li><a href="#">Rector's Office</a></li>
                                <li><a href="#">BSECE</a></li>
                                <li><a href="#">BSIE</a></li>
                                <li><a href="#">BSIT</a></li>
                                <li><a href="#">BSME</a></li>
                                <li><a href="#">BSTE</a></li>
                            </ul>
                        </li>
                     </ul>
                </div>
            </nav>
        </div>
        <div id="content">
