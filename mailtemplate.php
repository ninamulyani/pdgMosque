<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<style>
		#container{
			width: 800px;
			margin: 0 auto;
			height: 100px;
		}
		#header{
			background-color: #26a69a;
			color: white;
			text-align: center
		}
		#badan{
			font-family: arial;
			text-align: center;
		}
		#kaki{
			margin-top:10px;
			background-color: #26a69a;
			color: white;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h2>VERIFY YOUR EMAIL</h2>
		</div>
		<div id="badan">
			<p >Click the link below to verify your account</p>
			<a href="https://gissurya.org/pdg_tourism/tourism_pdg/admin/pages/verifikasi.php?token=<?php echo $_GET['token']?>&user=<?php echo $_GET['user']?>">Click on this link to confirm your email</a> <!-- EDIT UNTUK HOSTING -->
		</div>
		<div id="kaki">
			<h3>end of discusion</h3>
		</div>
	</div>
</body>
</html>