<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="F. Baumann, H. Winter" />
<meta name="description" content="CoffeeStats | All about coffee" />
<title>CoffeeStats</title>
<link rel="stylesheet" type="text/css" href="../css/caffeine.css" />
</head>
<body>

<div id="wrapper">

	<div id="header">
        <h1>coffeestats.org</h1>
        	<p>You drink it, we count!</p>
	</div>
	
	<div id="content"> <!-- end of header.php -->
	
		<div class="white-box">
			Welcome, <strong><?php echo $_SESSION['login_user']; ?></strong>!
		</div>
		
		<div class="white-box">
			<div id="navigation">
				<ul id="navigation">
					<li><a href="index.php">Home</a></li>
					<li><a href="plusone.php">Update</a></li>
					<li><a href="statistic.php">Statistics</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="auth/logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
