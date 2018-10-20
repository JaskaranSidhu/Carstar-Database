<?php
$link = mysqli_connect("localhost", "root", "", "cpsc471db");

if(!$link) {
	die('Unable to connect'. mysqli_error($link));
}

?>



<!DOCTYPE HTML>
<html>
        <head>
                <title>View Parts </title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
             <div class = "heading">
                <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            </div>
            <div class ="taskbar">
            <a href="http://localhost/cpsc471/Parts.php">
                    <img src="img/insert-modify-del-parts.png"> 
            </a>
                <h2> Parts </h2>
                <form action ="View_Parts.php" method="GET">
                <input type="text" name="search" placeholder="Enter a value"/>
                <input type="submit" value="Search"/>
                </form>
            </div>
            <div class ="tableview">
                <table width="1100" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>PO_Num</th>
                                <th>RO_Num</th>
                                <th>PartNum</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Order_Date</th>
                                <th>Arrival_Date</th>
                                <th>Invoice_Num</th>
                                <th>Returned</th>
                                <th>Cost</th>
                        </tr>

                        <?php

					//If the user performs a search
					if(isset($_GET["search"]))
					{
						$search = $_GET["search"];
						$search = mysqli_real_escape_string($link, $search);

						$query = "SELECT * FROM parts WHERE PO_Num = $search or RO_Num = $search or PartNum = $search
						or Cost = $search";

						$query2 = "SELECT * FROM parts WHERE Type = '$search' or Status = '$search' or Description = '$search'
						or Order_Date = '$search' or Arrival_Date = '$search' or Invoice_Num = '$search' or Returned = '$search'";
						
						//If there are results...
						if(mysqli_query($link, $query))
						{
							$result = mysqli_query($link, $query);
							while($parts=mysqli_fetch_assoc($result)) {
                                echo "<tr>";

                                echo "<td>".$parts['PO_Num']."</td>";

                                echo "<td>".$parts['RO_Num']."</td>";

                                echo "<td>".$parts['PartNum']."</td>";

                                echo "<td>".$parts['Type']."</td>";

                                echo "<td>".$parts['Status']."</td>";

                                echo "<td>".$parts['Description']."</td>";

                                echo "<td>".$parts['Order_Date']."</td>";

                                echo "<td>".$parts['Arrival_Date']."</td>";

                                echo "<td>".$parts['Invoice_Num']."</td>";

                                echo "<td>".$parts['Returned']."</td>";

                                echo "<td>".$parts['Cost']."</td>";

                                echo "</tr>";								
							}
						}
						
						else if(mysqli_query($link, $query2))
						{
							$result = mysqli_query($link, $query2);	
							while($parts=mysqli_fetch_assoc($result)) {
                                echo "<tr>";

                                echo "<td>".$parts['PO_Num']."</td>";

                                echo "<td>".$parts['RO_Num']."</td>";

                                echo "<td>".$parts['PartNum']."</td>";

                                echo "<td>".$parts['Type']."</td>";

                                echo "<td>".$parts['Status']."</td>";

                                echo "<td>".$parts['Description']."</td>";

                                echo "<td>".$parts['Order_Date']."</td>";

                                echo "<td>".$parts['Arrival_Date']."</td>";

                                echo "<td>".$parts['Invoice_Num']."</td>";

                                echo "<td>".$parts['Returned']."</td>";

                                echo "<td>".$parts['Cost']."</td>";

                                echo "</tr>";								
							}
						}		
					}											
						
						else
						{
							$query = "SELECT * FROM parts";
							$result = mysqli_query($link, $query);

							while($parts=mysqli_fetch_assoc($result)) {
									echo "<tr>";

									echo "<td>".$parts['PO_Num']."</td>";

									echo "<td>".$parts['RO_Num']."</td>";

									echo "<td>".$parts['PartNum']."</td>";

									echo "<td>".$parts['Type']."</td>";

									echo "<td>".$parts['Status']."</td>";

									echo "<td>".$parts['Description']."</td>";

									echo "<td>".$parts['Order_Date']."</td>";

									echo "<td>".$parts['Arrival_Date']."</td>";

									echo "<td>".$parts['Invoice_Num']."</td>";

									echo "<td>".$parts['Returned']."</td>";

									echo "<td>".$parts['Cost']."</td>";

									echo "</tr>";
							} //End While
						}
                        ?>
                </table>
            </div>
        </body>
</html>
