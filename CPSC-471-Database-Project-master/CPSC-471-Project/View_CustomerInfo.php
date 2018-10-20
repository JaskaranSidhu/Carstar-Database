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
                        Customer, Vehicle, Insurance Info
                </title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
			
            <div class = "heading">
                <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            </div>   
            <div class="tableview">
                <table width="700" border="1" cellpadding="1" cellspacing="1">
                    <div class="taskbar"> 
                    <a href="http://localhost/cpsc471/DeleteCustomer.php"><img src="img/mod-del-cust.png"></a>
                    <a href="http://localhost/cpsc471/DeleteVehicle.php"><img src="img/mod-del-vehicle.png"></a>
                    <a href="http://localhost/cpsc471/DeleteInsurance.php"><img src="img/mod-del-ins.png"></a>
                    <h2> Customer Information </h2> 
                    <form action ="View_CustomerInfo.php" method="GET">
					<input type="text" name="search" placeholder="Enter a value"/>
					<input type="submit" value="Search"/>
					</form>  
                    </div>
                    <tr>
                                <th>Cust_Num</th>
                                <th>F_Name</th>
                                <th>M_Init</th>
                                <th>L_Name</th>
                                <th>Phone_Num</th>
                                <th>Address</th>
                                <th>Rental</th>
                        </tr>

                        <?php
			//If the user performs a search
			if(isset($_GET["search"]))
			{
				$search = $_GET["search"];
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM Customer WHERE Cust_Num = $search or Phone_Num = $search";
				
				$query2 = "SELECT * FROM Customer WHERE F_Name = '$search' or M_Init = '$search'
				or L_Name = '$search' or Address = '$search' or Rental = '$search'";
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	

					while($Customer=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$Customer['Cust_Num']."</td>";

						echo "<td>".$Customer['F_Name']."</td>";

						echo "<td>".$Customer['M_Init']."</td>";

						echo "<td>".$Customer['L_Name']."</td>";

						echo "<td>".$Customer['Phone_Num']."</td>";

						echo "<td>".$Customer['Address']."</td>";

						echo "<td>".$Customer['Rental']."</td>";

						echo "</tr>";
					} //End While					
				}
				else if(mysqli_query($link, $query2))
				{
					$result = mysqli_query($link, $query2);	

					while($Customer=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$Customer['Cust_Num']."</td>";

						echo "<td>".$Customer['F_Name']."</td>";

						echo "<td>".$Customer['M_Init']."</td>";

						echo "<td>".$Customer['L_Name']."</td>";

						echo "<td>".$Customer['Phone_Num']."</td>";

						echo "<td>".$Customer['Address']."</td>";

						echo "<td>".$Customer['Rental']."</td>";

						echo "</tr>";
					} //End While					
				}				
			}
			
			else
			{
				$query="SELECT * FROM Customer";
				$result = mysqli_query($link, $query);
					
				while($Customer=mysqli_fetch_assoc($result)) {
					echo "<tr>";

					echo "<td>".$Customer['Cust_Num']."</td>";

					echo "<td>".$Customer['F_Name']."</td>";

					echo "<td>".$Customer['M_Init']."</td>";

					echo "<td>".$Customer['L_Name']."</td>";

					echo "<td>".$Customer['Phone_Num']."</td>";

					echo "<td>".$Customer['Address']."</td>";

					echo "<td>".$Customer['Rental']."</td>";

					echo "</tr>";
				} //End While
			}
                        ?>
                </table>

                <br>
                <h2> Vehicle Information </h2>
                <div class="taskbar">
                <form action ="View_CustomerInfo.php" method="GET">
				<input type="text" name="search2" placeholder="Enter a value"/>
				<input type="submit" value="Search"/>
				</form>
                </div>
                <table width="800" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>Plate_Num</th>
                                <th>Cust_Num</th>
                                <th>Color</th>
                                <th>Type</th>
                                <th>Make</th>
                                <th>VIN</th>
                                <th>Year</th>
                                <th>Mileage</th>
                        </tr>

                        <?php

			//If the user performs a search
			if(isset($_GET["search2"]))
			{
				$search = $_GET["search2"];				
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM vehicle WHERE Cust_Num = $search or Year = $search or Mileage = $search";
				
				$query2 = "SELECT * FROM vehicle WHERE Plate_Num = '$search' or Color = '$search'
				or Type = '$search' or Make = '$search' or VIN = '$search'";		
				
				//echo $query2;
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	
					
					while($Vehicle=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$Vehicle['Plate_Num']."</td>";

						echo "<td>".$Vehicle['Cust_Num']."</td>";

						echo "<td>".$Vehicle['Color']."</td>";

						echo "<td>".$Vehicle['Type']."</td>";

						echo "<td>".$Vehicle['Make']."</td>";

						echo "<td>".$Vehicle['VIN']."</td>";

						echo "<td>".$Vehicle['Year']."</td>";

						echo "<td>".$Vehicle['Mileage']."</td>";

						echo "</tr>";
					} //End While					
				}	
				
				else if(mysqli_query($link, $query2))
				{
					$result = mysqli_query($link, $query2);	
					
					while($Vehicle=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$Vehicle['Plate_Num']."</td>";

						echo "<td>".$Vehicle['Cust_Num']."</td>";

						echo "<td>".$Vehicle['Color']."</td>";

						echo "<td>".$Vehicle['Type']."</td>";

						echo "<td>".$Vehicle['Make']."</td>";

						echo "<td>".$Vehicle['VIN']."</td>";

						echo "<td>".$Vehicle['Year']."</td>";

						echo "<td>".$Vehicle['Mileage']."</td>";

						echo "</tr>";
					} //End While					
				}							
						
			}

			else
			{
				$query4 = "SELECT * FROM vehicle";
				$result4 = mysqli_query($link, $query4);
					
				while($Vehicle=mysqli_fetch_assoc($result4)) {
					echo "<tr>";

					echo "<td>".$Vehicle['Plate_Num']."</td>";

					echo "<td>".$Vehicle['Cust_Num']."</td>";

					echo "<td>".$Vehicle['Color']."</td>";

					echo "<td>".$Vehicle['Type']."</td>";

					echo "<td>".$Vehicle['Make']."</td>";

					echo "<td>".$Vehicle['VIN']."</td>";

					echo "<td>".$Vehicle['Year']."</td>";

					echo "<td>".$Vehicle['Mileage']."</td>";

					echo "</tr>";
				} //End While
			}
                        ?>
                </table>

                <br>
                <h2> Insurance Information </h2>
                <div class="taskbar">
				<form action ="View_CustomerInfo.php" method="GET">
				<input type="text" name="search3" placeholder="Enter a value"/>
				<input type="submit" value="Search"/>
				</form>           
                </div>
                <table width="300" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>ID_Num</th>
                                <th>Name</th>
                                <th>Phone_Num</th>
                        </tr>

                        <?php

 			//If the user performs a search
			if(isset($_GET["search3"]))
			{
				$search = $_GET["search3"];				
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM insurance WHERE ID_Num = $search or Phone_Num = $search";
				
				$query2 = "SELECT * FROM insurance WHERE Name = '$search'";
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	
					
					while($insurance=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$insurance['ID_Num']."</td>";

						echo "<td>".$insurance['Name']."</td>";

						echo "<td>".$insurance['Phone_Num']."</td>";

						echo "</tr>";
					} //End While					
				}
				
				else if(mysqli_query($link, $query2))
				{
					$result = mysqli_query($link, $query2);		
					
					while($insurance=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$insurance['ID_Num']."</td>";

						echo "<td>".$insurance['Name']."</td>";

						echo "<td>".$insurance['Phone_Num']."</td>";

						echo "</tr>";
					} //End While								
				}				
			}

			else
			{
				$query1="SELECT * FROM insurance";
				$result1 = mysqli_query($link, $query1);
					
				while($insurance=mysqli_fetch_assoc($result1)) {
					echo "<tr>";

					echo "<td>".$insurance['ID_Num']."</td>";

					echo "<td>".$insurance['Name']."</td>";

					echo "<td>".$insurance['Phone_Num']."</td>";

					echo "</tr>";
				} //End While
			}
                        ?>
                </table>

                <br>
                <h2> Vehicle-Insurance Information </h2>
                <div class="taskbar">
				<form action ="View_CustomerInfo.php" method="GET">
				<input type="text" name="search4" placeholder="Enter a value"/>
				<input type="submit" value="Search"/>
				</form>  
                </div>
                <table width="300" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>ID_Num</th>
                                <th>Plate_Num</th>
                                <th>Claim_Num</th>
                        </tr>

                        <?php

		//If the user performs a search
			if(isset($_GET["search4"]))
			{
				$search = $_GET["search4"];				
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM insured_by WHERE ID_Num = $search";
				
				$query2 = "SELECT * FROM insured_by WHERE Plate_Num = '$search' or Claim_Num = '$search'";	
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	

					while($insuredBy=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$insuredBy['ID_Num']."</td>";

						echo "<td>".$insuredBy['Plate_Num']."</td>";

						echo "<td>".$insuredBy['Claim_Num']."</td>";

						echo "</tr>";
					} //End While					
				}
				else if(mysqli_query($link, $query2))
				{
					$result = mysqli_query($link, $query2);	
					
					while($insuredBy=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$insuredBy['ID_Num']."</td>";

						echo "<td>".$insuredBy['Plate_Num']."</td>";

						echo "<td>".$insuredBy['Claim_Num']."</td>";

						echo "</tr>";
					} //End While					
				}											
			}
			
			else
			{
				$query2="SELECT * FROM insured_by";
				$result2 = mysqli_query($link, $query2);
					
				while($insuredBy=mysqli_fetch_assoc($result2)) {
					echo "<tr>";

					echo "<td>".$insuredBy['ID_Num']."</td>";

					echo "<td>".$insuredBy['Plate_Num']."</td>";

					echo "<td>".$insuredBy['Claim_Num']."</td>";

					echo "</tr>";
				} //End While
			}
                        ?>
                </table>

                <h2> Customer-Insurance Information </h2>
                <div class="taskbar">
				<form action ="View_CustomerInfo.php" method="GET">
				<input type="text" name="search5" placeholder="Enter a value"/>
				<input type="submit" value="Search"/>
				</form>          
                </div>
                <br>

                <table width="300" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>ID_Num</th>
                                <th>Cust_Num</th>
                                <th>Deductible</th>
                        </tr>

                        <?php

			//If the user performs a search
			if(isset($_GET["search5"]))
			{
				$search = $_GET["search5"];				
				$search = mysqli_real_escape_string($link, $search);
				
				$query = "SELECT * FROM insured_with WHERE ID_Num = $search or Cust_Num = $search or Deductible = $search";		
				
				//If there are results...
				if(mysqli_query($link, $query))
				{
					$result = mysqli_query($link, $query);	
				
					while($insuredWith=mysqli_fetch_assoc($result)) {
						echo "<tr>";

						echo "<td>".$insuredWith['ID_Num']."</td>";

						echo "<td>".$insuredWith['Cust_Num']."</td>";

						echo "<td>".$insuredWith['Deductible']."</td>";

						echo "</tr>";
					} //End While				
				}
			}
			
			else
			{
				$query3="SELECT * FROM insured_with";
				$result3 = mysqli_query($link, $query3);
					
				while($insuredWith=mysqli_fetch_assoc($result3)) {
					echo "<tr>";

					echo "<td>".$insuredWith['ID_Num']."</td>";

					echo "<td>".$insuredWith['Cust_Num']."</td>";

					echo "<td>".$insuredWith['Deductible']."</td>";

					echo "</tr>";
				} //End While
			}
                        ?>
                </table>
            </div>
        </body>
</html>
