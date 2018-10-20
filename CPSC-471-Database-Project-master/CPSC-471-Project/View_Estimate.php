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
                    View Estimate
            </title>
            <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
             <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
        </div>
        <div class="taskbar">
            <a href="http://localhost/cpsc471/NewEstimate.php"><img src="img/insert-estimate.png"></a>
            <a href="http://localhost/cpsc471/DeleteEstimate.php">
                <img src="img/delete-modify-estimate.png">
            </a>
            <h2> Estimates </h2>
            <form action ="View_Estimate.php" method="GET">
                <input type="text" name="search" placeholder="Search Estimates"/>
                <input type="submit" value="Search"/>
            </form>
        </div>
        <div class="tableview">
        <table width="700" border="1" cellpadding="1" cellspacing="1">
            <tr>
                    <th>Est_Num</th>
                    <th>ID</th>
                    <th>Plate_Num</th>
                    <th>Job_Class</th>
                    <th>Hours</th>
                    <th>Status</th>
                    <th>Cost</th>
            </tr>
                    <?php

                    //If the user performs a search
                    if(isset($_GET["search"]))
                    {
                            $search = $_GET["search"];
                            $search = mysqli_real_escape_string($link, $search);

                            $query = "SELECT * FROM estimate WHERE Est_Num = $search or ID = $search or Hours = $search or Cost = $search";

                            $query2 = "SELECT * FROM estimate WHERE Job_Class = '$search' or Plate_Num = '$search' or Status = '$search'";		

                            //If there are results...
                            if(mysqli_query($link, $query))
                            {
                                    $result = mysqli_query($link, $query);	

                                    while($estimate=mysqli_fetch_assoc($result)) 
                                    {
                                            echo "<tr>";

                                            echo "<td>".$estimate['Est_Num']."</td>";

                                            echo "<td>".$estimate['ID']."</td>";

                                            echo "<td>".$estimate['Plate_Num']."</td>";

                                            echo "<td>".$estimate['Job_Class']."</td>";

                                            echo "<td>".$estimate['Hours']."</td>";

                                            echo "<td>".$estimate['Status']."</td>";

                                            echo "<td>".$estimate['Cost']."</td>";

                                            echo "</tr>";
                                    } //End While

                            }
                            else if(mysqli_query($link, $query2))
                            {
                                    $result = mysqli_query($link, $query2);

                                    while($estimate=mysqli_fetch_assoc($result)) {
                                            echo "<tr>";

                                            echo "<td>".$estimate['Est_Num']."</td>";

                                            echo "<td>".$estimate['ID']."</td>";

                                            echo "<td>".$estimate['Plate_Num']."</td>";

                                            echo "<td>".$estimate['Job_Class']."</td>";

                                            echo "<td>".$estimate['Hours']."</td>";

                                            echo "<td>".$estimate['Status']."</td>";

                                            echo "<td>".$estimate['Cost']."</td>";

                                            echo "</tr>";
                                    } //End While					
                            }
                    }			

                    else
                    {
                            $query="SELECT * FROM estimate";
                            $result = mysqli_query($link, $query);

                            while($estimate=mysqli_fetch_assoc($result)) {
                                    echo "<tr>";

                                    echo "<td>".$estimate['Est_Num']."</td>";

                                    echo "<td>".$estimate['ID']."</td>";

                                    echo "<td>".$estimate['Plate_Num']."</td>";

                                    echo "<td>".$estimate['Job_Class']."</td>";

                                    echo "<td>".$estimate['Hours']."</td>";

                                    echo "<td>".$estimate['Status']."</td>";

                                    echo "<td>".$estimate['Cost']."</td>";

                                    echo "</tr>";
                            } //End While
                    }
                    ?>
            </table>
        </div>
    </body>
</html>
