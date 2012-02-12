<?php
	include("config.php");

	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from Form
		$myusername=mysql_real_escape_string($_POST['username']);
		$mypassword=crypt(mysql_real_escape_string($_POST['password']), '$2a$07$thisissomefuckingassholesaltforcoffeestats$');
		$sql="SELECT uid FROM cs_users WHERE ulogin='".$myusername."' and ucryptsum='".$mypassword."'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$count=mysql_num_rows($result);

		// if result matched $myusername and $mypassword, table row must be 1 row

		if($count==1) {
    		session_register("myusername");
    		$_SESSION['login_user']=$myusername;
    		$_SESSION['login_id']=$row['uid'];
    		header("location: ../index");
  		}

  		else {
    		$error="<center>Your username or password seems to be invalid :(</center>";
  		}
	}

	include("../preheader.php");
?>


	<div id="login">
		<div class="white-box">
			<h2>What is coffeestats.org?</h2>
				    <p>You like coffee, graphs and nerdy statistics? Well, we do too!</p>
                    <p>It's dead-simple: You enjoy your fix of coffee as usual and we keep track of it --
                    enabling us to present you with awesome statistics about your general coffee consumption.
                    Why? Just because, of course!</p>
		</div>

		<div class="white-box">
			<h2>Login</h2>
				<form action="" method="post">
					<input type="text" name="username" placeholder="Username" id="login_field_username" />
					<input type="password" name="password" placeholder="Password" id="login_field_password" />
					<input type="submit" name="submit" value="Login" id="login_button_submit" />
			        <p>Oh, you don't have an account yet? Simply register one <a href="register">here</a>.</p>
					<?php
						if (isset($error)) {
							echo("$error");
						}
					?>
				</form>
		</div>


		<div class="white-box">
			<h2>Charts!</h2>
    			<script type="text/javascript" src="https://www.google.com/jsapi"></script>

   				<script type="text/javascript">
      				google.load("visualization", "1", {packages:["corechart"]});
      				google.setOnLoadCallback(drawChart);

      				function drawChart() {
        				var data = new google.visualization.DataTable();

        				data.addColumn('string', 'Hour');
        				data.addColumn('number', 'noqqe');
        				data.addColumn('number', 'dreary');
        				data.addRows([
        				['6', 0, 1],
        				['7', 0, 1],
				        ['8', 2, 0],
				        ['9', 1, 0],
				        ['10', 0, 1],
				        ['11', 0, 1],
				        ['12', 3, 1],
				        ['13', 0, 0],
				        ['14', 0, 0],
				        ['15', 0, 2],
				        ['16', 0, 1],
				        ['17', 2, 0],
				        ['18', 0, 1],
				        ]);

            			var options = {
                    		width: 550, height: 240,
                            title: 'Coffees of dreary and noqqe (compared)',
                            hAxis: {
                            	title: 'Hour'}
                            };

            			var chart = new google.visualization.ColumnChart(document.getElementById('coffeeexample'));
            			chart.draw(data, options);
              		}
      			</script>

        	<div id="coffeeexample"> <!-- example chart --> </div>

		</div>
	</div>

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.n0q.org/" : "http://piwik.n0q.org/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
  try {
    var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 6);
    piwikTracker.trackPageView();
    piwikTracker.enableLinkTracking();
  } catch( err ) {}
    </script><noscript><p><img src="http://piwik.n0q.org/piwik.php?idsite=6" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->

<?
include('../footer.php');
?>
