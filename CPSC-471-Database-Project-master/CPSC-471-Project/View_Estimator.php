<?php
$link = mysqli_connect("localhost", "root", "", "cpsc471db");

if(!$link) {
	die('Unable to connect'. mysqli_error($link));
}

?>



<!DOCTYPE HTML>
<html>
	<head>
		<title>
			View Estimator
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
            <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            <h1> Estimator Information </h1>
        </div>
            <div class="taskbar">
		<form action ="View_Estimator.php" method="GET">
		<input type="text" name="search" placeholder="Enter a value"/>
		<input type="submit" value="Search"/>
		</form>
            </div>
                <div class="tableview">
		<table width="200" border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>ID</th>
				<th>Salary</th>
			</tr>

			<?php
			//If the user performs a search
			if(isset($_GET["search"]))
			{
				$search = $_GET["search"];
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM estimator WHERE ID = $search or Salary = $search";
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	

					while($estimator=mysqli_fetch_assoc($result)) 
					{
						echo "<tr>";

						echo "<td>".$estimator['ID']."</td>";

						echo "<td>".$estimator['Salary']."</td>";

						echo "</tr>";
					} //End While					
				}				
			}

			else
			{
				$query="SELECT * FROM estimator";
				$result = mysqli_query($link, $query);
					
				while($estimator=mysqli_fetch_assoc($result)) 
				{
					echo "<tr>";

					echo "<td>".$estimator['ID']."</td>";

					echo "<td>".$estimator['Salary']."</td>";

					echo "</tr>";
				} //End While
			}
			?>
		</table>
            </div>
	</body>
</html>
