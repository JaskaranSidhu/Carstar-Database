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
                        View Employees
                </title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
        </div>
            <div class="taskbar">
                <a href="http://localhost/cpsc471/View_Bodyman.php"><img src="img/view-bodymen.png"></a>
                <a href="http://localhost/cpsc471/EmployeeDBConnection.php"><img src="img/insert-modify-del-emp.png"></a>
                <a href="http://localhost/cpsc471/View_Estimator.php"><img src="img/view-estimators.png"></a>
                <h2> Employee Information </h2>
                <form action ="View_Employees.php" method="GET">
                <input type="text" name="search" placeholder="Enter a value"/>
                <input type="submit" value="Search"/>
                </form>
            </div>
            <div class ="tableview">
                <table width="1200" border="1" cellpadding="1" cellspacing="1">
                        <tr>
                                <th>ID</th>
                                <th>SIN</th>
                                <th>F_Name</th>
                                <th>M_Init</th>
                                <th>L_Name</th>
                                <th>Sex</th>
                                <th>Birth_Date</th>
                                <th>Address</th>
                                <th>Start_Date</th>
                                <th>Phone_Num</th>
                        </tr>

                        <?php

                        //If the user performs a search
                        if(isset($_GET["search"]))
                        {
                                $search = $_GET["search"];
                                $search = mysqli_real_escape_string($link, $search);

                                $query = "SELECT * FROM employee WHERE ID = $search or SIN = $search or Phone_Num = $search";

                                $query2 = "SELECT * FROM employee WHERE F_Name = '$search' or M_Init = '$search'
                                or L_Name = '$search' or Sex = '$search' or Start_Date = '$search' or Birth_Date = '$search' 
                                or Address = '$search'";


                                //If there are results...
                                if(mysqli_query($link, $query))
                                {
                                        $result = mysqli_query($link, $query);

                                        while($employee=mysqli_fetch_assoc($result)) 
                                        {
                                                echo "<tr>";

                                                echo "<td>".$employee['ID']."</td>";

                                                echo "<td>".$employee['SIN']."</td>";

                                                echo "<td>".$employee['F_Name']."</td>";

                                                echo "<td>".$employee['M_Init']."</td>";

                                                echo "<td>".$employee['L_Name']."</td>";

                                                echo "<td>".$employee['Sex']."</td>";

                                                echo "<td>".$employee['Birth_Date']."</td>";

                                                echo "<td>".$employee['Address']."</td>";

                                                echo "<td>".$employee['Start_Date']."</td>";

                                                echo "<td>".$employee['Phone_Num']."</td>";

                                                echo "</tr>";
                                                //End While
                                        }
                                }
                                else if(mysqli_query($link, $query2))
                                {
                                        $result = mysqli_query($link, $query2);

                                        while($employee=mysqli_fetch_assoc($result)) 
                                        {
                                                echo "<tr>";

                                                echo "<td>".$employee['ID']."</td>";

                                                echo "<td>".$employee['SIN']."</td>";

                                                echo "<td>".$employee['F_Name']."</td>";

                                                echo "<td>".$employee['M_Init']."</td>";

                                                echo "<td>".$employee['L_Name']."</td>";

                                                echo "<td>".$employee['Sex']."</td>";

                                                echo "<td>".$employee['Birth_Date']."</td>";

                                                echo "<td>".$employee['Address']."</td>";

                                                echo "<td>".$employee['Start_Date']."</td>";

                                                echo "<td>".$employee['Phone_Num']."</td>";

                                                echo "</tr>";
                                                //End While
                                        }					
                                }	
                        }

                        else
                        {
                                $query="SELECT * FROM employee";
                                $result = mysqli_query($link, $query);

                                while($employee=mysqli_fetch_assoc($result)) 
                                {
                                        echo "<tr>";

                                        echo "<td>".$employee['ID']."</td>";

                                        echo "<td>".$employee['SIN']."</td>";

                                        echo "<td>".$employee['F_Name']."</td>";

                                        echo "<td>".$employee['M_Init']."</td>";

                                        echo "<td>".$employee['L_Name']."</td>";

                                        echo "<td>".$employee['Sex']."</td>";

                                        echo "<td>".$employee['Birth_Date']."</td>";

                                        echo "<td>".$employee['Address']."</td>";

                                        echo "<td>".$employee['Start_Date']."</td>";

                                        echo "<td>".$employee['Phone_Num']."</td>";

                                        echo "</tr>";
                                } //End While
                        }
                        ?>
                </table>
            </div>
        </body>
</html>
