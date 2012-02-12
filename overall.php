<?php
include("auth/lock.php");
include("auth/config.php");
include("header.php");
include("lib/antixss.php");

?>
<div class="white-box">
  <h2>Overall Statistics</h2>
</div>

			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    			<script type="text/javascript">
      				google.load("visualization", "1", {packages:["corechart"]});
      				google.setOnLoadCallback(drawChart);
      
      				function drawChart() {
				        var data = new google.visualization.DataTable();
				        data.addColumn('string', 'Hour');
				        data.addColumn('number', 'Coffees');
				        data.addRows([

							<?php
	                			for ( $counter = 0; $counter <= 23; $counter += 1) {
	                  			
                                  $sql="SELECT '".$counter."' as hour, count(cid) as coffees 
                                    FROM cs_coffees 
                                    WHERE DATE_FORMAT(CURRENT_TIMESTAMP(),'%Y-%m-%d') = DATE_FORMAT(cdate,'%Y-%m-%d') 
                                    AND ( DATE_FORMAT(cdate,'%H') = '".$counter."' OR DATE_FORMAT(cdate,'%H') = '0".$counter."') ";
	                  			$result=mysql_query($sql);
	                  			$row=mysql_fetch_array($result);
	                  
	                  			echo ("\t\t['".$row['hour']."', ".$row['coffees']."],\n");
	                			}
	                			
                                  $sql="SELECT '24' as hour, count(cid) as coffees 
                                        FROM  cs_coffees 
                                        WHERE DATE_FORMAT(CURRENT_TIMESTAMP(),'%Y-%m-%d') = DATE_FORMAT(cdate,'%Y-%m-%d') 
                                        AND ( DATE_FORMAT(cdate,'%H') = '24' or DATE_FORMAT(cdate,'%H') = '24') ";
	                  			$result=mysql_query($sql);
	                  			$row=mysql_fetch_array($result);
	                  	
	                  			echo ("\t\t['".$row['hour']."', ".$row['coffees']."]");
							?>
        				]);

        				var options = {
          					width: 550, height: 240,
          					title: 'Overall coffees today',
          					hAxis: {title: 'Hour'}
        				};

				        var chart = new google.visualization.ColumnChart(document.getElementById('coffee_today'));
				        chart.draw(data, options);
      				}
    			</script>
    
    		<script type="text/javascript">
      			google.load("visualization", "1", {packages:["corechart"]});
      			google.setOnLoadCallback(drawChart);
      
      			function drawChart() {
			        var data = new google.visualization.DataTable();
			        data.addColumn('string', 'Month');
			        data.addColumn('number', 'Coffees');
			        data.addRows([
						<?php
	                		for ( $counter = 1; $counter <= 30; $counter += 1) {
                                $sql="SELECT '".$counter."' AS day, count(cid) AS coffees 
                                      FROM cs_coffees 
                                      WHERE DATE_FORMAT(CURRENT_TIMESTAMP(),'%Y-%m') = DATE_FORMAT(cdate,'%Y-%m') 
                                      AND ( DATE_FORMAT(cdate,'%d') = '".$counter."' or DATE_FORMAT(cdate,'%d') = '0".$counter."') ;";
		                  		$result=mysql_query($sql);
		                  		$row=mysql_fetch_array($result);
		                  		
		                  		echo ("\t\t['".$row['day']."', ".$row['coffees']."],\n");
	                		}
	                  
                                $sql="SELECT '31' AS day, count(cid) AS coffees 
                                      FROM cs_coffees 
                                      WHERE DATE_FORMAT(CURRENT_TIMESTAMP(),'%Y-%m') = DATE_FORMAT(cdate,'%Y-%m') 
                                      AND ( DATE_FORMAT(cdate,'%d') = '12' or DATE_FORMAT(cdate,'%d') = '12') ;";
	                  		$result=mysql_query($sql);
	                  		$row=mysql_fetch_array($result);
	                  
	                  		echo ("\t\t['".$row['day']."', ".$row['coffees']."]");
						?>
        			]);

        var options = {
          width: 550, height: 240,
          title: 'Overall coffees this month',
          hAxis: {title: 'Day'}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('coffee_month'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Day');
        data.addColumn('number', 'Coffees');
        data.addRows([
<?php
                for ( $counter = 1; $counter <= 11; $counter += 1) {
                  $sql="SELECT '".$counter."' AS year, count(cid) AS coffees 
                        FROM cs_coffees 
                        WHERE DATE_FORMAT(CURRENT_TIMESTAMP(),'%Y') = DATE_FORMAT(cdate,'%Y') 
                        AND ( DATE_FORMAT(cdate,'%m') = '".$counter."' or DATE_FORMAT(cdate,'%m') = '0".$counter."');";
                  $result=mysql_query($sql);
                  $row=mysql_fetch_array($result);
                  echo ("\t\t['".$row['year']."', ".$row['coffees']."],\n");
                }
                  $sql="SELECT '12' AS year, count(cid) AS coffees 
                        FROM cs_coffees 
                        WHERE DATE_FORMAT(CURRENT_TIMESTAMP(),'%Y') = DATE_FORMAT(cdate,'%Y') 
                        AND ( DATE_FORMAT(cdate,'%m') = '12' or DATE_FORMAT(cdate,'%m') = '12');";
                  $result=mysql_query($sql);
                  $row=mysql_fetch_array($result);
                  echo ("\t\t['".$row['year']."', ".$row['coffees']."]");
?>

        ]);

        var options = {
          chco: '#000000',
          width: 550, height: 240,
          title: 'Overall coffees this year',
          hAxis: {title: 'Year'}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('coffee_year'));
        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hour');
        data.addColumn('number', 'Coffees');
        data.addRows([
							<?php
	                			for ( $counter = 0; $counter <= 23; $counter += 1) {
	                  			
                                  $sql="SELECT '".$counter."' as hour, count(cid) as coffees 
                                    FROM cs_coffees 
                                    WHERE ( DATE_FORMAT(cdate,'%H') = '".$counter."' OR DATE_FORMAT(cdate,'%H') = '0".$counter."');  ";
	                  			$result=mysql_query($sql);
	                  			$row=mysql_fetch_array($result);
	                  
	                  			echo ("\t\t['".$row['hour']."', ".$row['coffees']."],\n");
	                			}
	                			
                                  $sql="SELECT '24' as hour, count(cid) as coffees 
                                        FROM  cs_coffees 
                                        WHERE ( DATE_FORMAT(cdate,'%H') = '24' or DATE_FORMAT(cdate,'%H') = '24'); ";
	                  			$result=mysql_query($sql);
	                  			$row=mysql_fetch_array($result);
	                  	
	                  			echo ("\t\t['".$row['hour']."', ".$row['coffees']."]");
							?>

        ]);

        var options = {
          width: 550, height: 240,
          title: 'Most Coffee by hour (alltime)',
          hAxis: {title: 'Hour'} 
        };

        var chart = new google.visualization.AreaChart(document.getElementById('coffee_hour'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Day');
        data.addColumn('number', 'Coffees');
        data.addRows([
			<?php
             $sql="SELECT DATE_FORMAT(cdate, '%a') as day, count(cid) as coffees 
                   FROM cs_coffees 
                   GROUP BY day
                   ORDER BY DATE_FORMAT(cdate, '%w'); ";
            $result=mysql_query($sql);
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	        echo ("\t\t['".$row[0]."', ".$row[1]."],\n");
            }
		    ?>

        ]);

        var options = {
          width: 550, height: 240,
          title: 'Most Coffee by day (alltime)',
          hAxis: {title: 'Hour'} 
        };

        var chart = new google.visualization.AreaChart(document.getElementById('coffee_mostday'));
        chart.draw(data, options);
      }

    </script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Coffees');
        data.addColumn('number', 'User');
        data.addRows([
			<?php
             $sql="SELECT cs_users.ulogin, COUNT(cs_coffees.cid) 
                    FROM  cs_coffees, cs_users
                    WHERE cs_users.uid = cs_coffees.cuid 
                    GROUP BY cs_coffees.cuid; ";
            $result=mysql_query($sql);
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	        echo ("\t\t['".$row[0]."', ".$row[1]."],\n");
            }
		    ?>
        ]);

        // Set chart options
        var options = {'title':'Coffees by user on coffeestats.org',
                       'width':600,
                       'height':240};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('coffees_by_user'));
        chart.draw(data, options);
      }
    </script>

		<div class="white-box">
          <div id="coffee_today"></div>
		</div>
		<div class="white-box">
          <div id="coffee_month"></div>
		</div>
		<div class="white-box">
          <div id="coffee_year"></div>
		</div>
		<div class="white-box">
          <div id="coffee_hour"></div>
		</div>
		<div class="white-box">
          <div id="coffee_mostday"></div>
		</div>
		<div class="white-box">
          <div id="coffees_by_user"></div>
		</div>

<?php
	include("footer.php");
?>
