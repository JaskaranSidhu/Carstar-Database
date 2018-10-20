<?php
$link = mysqli_connect("localhost", "root", "", "cpsc471db");

if(!$link) {
	die('Unable to connect'. mysqli_error($link));
}

?>



<!DOCTYPE HTML>
<html>
	<head>
                <title>Repair Orders and RO Assignments </title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
             <div class = "heading">
                <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            </div>
            <div class ="taskbar">
                <a href="http://localhost/cpsc471/Repair_Order.php"><img src="img/ins-mod-del-ro.png"></a>
                <h2> Repair Orders </h2>
			<form action ="View_Repair_Order.php" method="GET">
			<input type="text" name="search" placeholder="Enter a value"/>
			<input type="submit" value="Search"/>
			</form>
            </div>
            <div class ="tableview">
		<table width="900" border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>RO_Num</th>
				<th>ID</th>
				<th>Est_Num</th>
				<th>Hours</th>
				<th>Cost</th>
				<th>Job_Class</th>
				<th>Status</th>
				<th>Scheduled_In</th>
				<th>Scheduled_Out</th>
			</tr>

			<?php

			//If the user performs a search
            if(isset($_GET["search"]))
            {
                $search = $_GET["search"];
                $search = mysqli_real_escape_string($link, $search);

                $query = "SELECT * FROM repair_order WHERE RO_Num = $search or ID = $search or Est_Num = $search
                or Hours = $search or Cost = $search";

                $query2 = "SELECT * FROM repair_order WHERE Job_Class = '$search' or Status = '$search' 
                or Scheduled_In = '$search' or Scheduled_Out = '$search'";
                
                //If there are results...
                if(mysqli_query($link, $query))
                {
					$result = mysqli_query($link, $query);
					while($RO=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$RO['RO_Num']."</td>";

						echo "<td>".$RO['ID']."</td>";

						echo "<td>".$RO['Est_Num']."</td>";

						echo "<td>".$RO['Hours']."</td>";

						echo "<td>".$RO['Cost']."</td>";

						echo "<td>".$RO['Job_Class']."</td>";

						echo "<td>".$RO['Status']."</td>";

						echo "<td>".$RO['Scheduled_In']."</td>";

						echo "<td>".$RO['Scheduled_Out']."</td>";

						echo "</tr>";
					} //End While					
				}
				else if(mysqli_query($link, $query2))
				{
					$result = mysqli_query($link, $query2);	
					while($RO=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$RO['RO_Num']."</td>";

						echo "<td>".$RO['ID']."</td>";

						echo "<td>".$RO['Est_Num']."</td>";

						echo "<td>".$RO['Hours']."</td>";

						echo "<td>".$RO['Cost']."</td>";

						echo "<td>".$RO['Job_Class']."</td>";

						echo "<td>".$RO['Status']."</td>";

						echo "<td>".$RO['Scheduled_In']."</td>";

						echo "<td>".$RO['Scheduled_Out']."</td>";

						echo "</tr>";
					} //End While									
				}
			}

			else
			{
				$query="SELECT * FROM repair_order";
				$result = mysqli_query($link, $query);
					
				while($RO=mysqli_fetch_assoc($result)) {
					echo "<tr>";

					echo "<td>".$RO['RO_Num']."</td>";

					echo "<td>".$RO['ID']."</td>";

					echo "<td>".$RO['Est_Num']."</td>";

					echo "<td>".$RO['Hours']."</td>";

					echo "<td>".$RO['Cost']."</td>";

					echo "<td>".$RO['Job_Class']."</td>";

					echo "<td>".$RO['Status']."</td>";

					echo "<td>".$RO['Scheduled_In']."</td>";

					echo "<td>".$RO['Scheduled_Out']."</td>";

					echo "</tr>";
				} //End While
			}
			?>
		</table>

		<br>
		    <div class ="taskbar">
                        <h2> Repair Order Assignments </h2>
			<form action ="View_Repair_Order.php" method="GET">
			<input type="text" name="search2" placeholder="Enter a value"/>
			<input type="submit" value="Search"/>
			</form>
		    </div>
		<table width="200" border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>RO_Num</th>
				<th>ID</th>
			</tr>

			<?php

			//If the user performs a search
            if(isset($_GET["search2"]))
            {
				$search = $_GET["search2"];
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM works_on WHERE RO_Num = $search or ID = $search";
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	
					
					while($WO=mysqli_fetch_assoc($result)) 
					{
						echo "<tr>";

						echo "<td>".$WO['RO_Num']."</td>";

						echo "<td>".$WO['ID']."</td>";

						echo "</tr>";
					} //End While					
				}					
			}

			else
			{
				$query4 ="SELECT * FROM works_on";
				$result4 = mysqli_query($link, $query4);
					
				while($WO=mysqli_fetch_assoc($result4)) {
					echo "<tr>";

					echo "<td>".$WO['RO_Num']."</td>";

					echo "<td>".$WO['ID']."</td>";

					echo "</tr>";
				} //End While
			}
			?>
		</table>
	</body>
</html>
