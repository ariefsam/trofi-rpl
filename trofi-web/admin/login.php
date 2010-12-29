<?php
session_start();
require "fungsi.php";
require "../dbconfig.php";
if($_POST['submit']){
    $login = login($_POST['username'], $_POST['password']);
    if ($login) header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8;charset=utf-8" />
	
	<title>Login Admin::Trofi-Webs</title>
	
    <style type="text/css" media="all">
		@import url("login_files/style000.css");
		@import url("login_files/jquery00.css");
		@import url("login_files/facebox0.css");
		@import url("login_files/visualiz.css");
		@import url("login_files/date_inp.css");
    </style>
	
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=7" /><![endif]-->
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->
	<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
	
	<script type="text/javascript" src="login_files/jquery00.js"></script>
	<script type="text/javascript" src="login_files/jquery01.js"></script>
	<script type="text/javascript" src="login_files/jquery02.js"></script>
	<script type="text/javascript" src="login_files/jquery03.js"></script>
	<script type="text/javascript" src="login_files/jquery04.js"></script>
	<script type="text/javascript" src="login_files/facebox0.js"></script>
	<script type="text/javascript" src="login_files/jquery05.js"></script>
	<script type="text/javascript" src="login_files/jquery06.js"></script>
	<script type="text/javascript" src="login_files/jquery07.js"></script>
	<script type="text/javascript" src="login_files/ajaxuplo.js"></script>
	<script type="text/javascript" src="login_files/jquery08.js"></script>
	<script type="text/javascript" src="login_files/custom00.js"></script>

</head>




<body>
	
	<div id="hld">
	
		<div class="wrapper">		<!-- wrapper begins -->
		
		
		
		
		
		
			
			
			
			
			
			
			
			<div class="block small center login">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Login</h2>
					<ul>
						<li><a href="../">Ke Halaman Depan</a></li>
					</ul>
				</div>		<!-- .block_head ends -->
				
				
				
				
				<div class="block_content">
					
					<div class="message info"><p>Just click login, this is an example.</p></div>
					
					<form action="" method="post">
						<p>
							<label>Username:</label> <br />
							<input name="username" type="text" class="text" value="" />
						</p>
						
						<p>
							<label>Password:</label> <br />
							<input name="password" type="password" class="text" value="" />
						</p>
						
						<p>
							<input name="submit" type="submit" class="submit" value="Login" /> &nbsp;
							<input type="checkbox" class="checkbox" checked="checked" id="rememberme" /> <label for="rememberme">Remember me</label>
						</p>
					</form>
					
				</div>		<!-- .block_content ends -->
					
				<div class="bendl"></div>
				<div class="bendr"></div>
								
			</div>		<!-- .login ends -->
			
			
			
			
			
			
			
			
			
			
			
		
		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	
</body>
</html>
<!-- This document saved from http://enstyled.com/adminus/original/ -->
