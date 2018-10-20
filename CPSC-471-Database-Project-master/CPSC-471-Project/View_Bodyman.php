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
			View Bodyman
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
            <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            <h1>  Bodymen Information </h1>
        </div>
            <div class ="taskbar">
		<form action ="View_Bodyman.php" method="GET">
		<input type="text" name="search" placeholder="Enter a value"/>
		<input type="submit" value="Search"/>
		</form>
            </div>
                <div class ="tableview">
		<table width="200" border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>ID</th>
				<th>Hourly_Rate</th>
			</tr>

			<?php
			
			//If the user performs a search
			if(isset($_GET["search"]))
			{
				$search = $_GET["search"];
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM Bodyman WHERE ID = $search or Hourly_Rate = $search";
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);
					
					//Print search results
					while($bodyman=mysqli_fetch_assoc($result)) 
					{
						echo "<tr>";

						echo "<td>".$bodyman['ID']."</td>";

						echo "<td>".$bodyman['Hourly_Rate']."</td>";

						echo "</tr>";
					}
					//End While		
				}
			}

			//Else user does not perform a search
			else 
			{
				$query="SELECT * FROM Bodyman";
				$result = mysqli_query($link, $query);
		
				while($bodyman=mysqli_fetch_assoc($result)) {
					echo "<tr>";

					echo "<td>".$bodyman['ID']."</td>";

					echo "<td>".$bodyman['Hourly_Rate']."</td>";

					echo "</tr>";
				} //End While
			}
			
			?>
		</table>
            </div>
	</body>
</html>
