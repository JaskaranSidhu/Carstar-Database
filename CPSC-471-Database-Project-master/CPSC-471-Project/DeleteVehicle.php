<?php
ob_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>
                Delete/Modify Vehicle
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
        </div>
        <div class ="estimate">
        <form name = "VehicleDeleteForm" action="" method="post">
                <table>
                    <h2> <center> Delete Vehicle </center> </h2>
                        <tr>
                                <td>Enter Plate Number</td>
                                <td><input type = "text" name = "Plate_Num" placeholder = "ABC123" maxlength = "10" required = "required"></td>
                        </tr>
                        <tr>
                                <td><input type = "submit" name = "deleteVehicle" value = "Delete"> </td>
                        </tr>
                </table>
        </form>
        
        <h2> <center> Modify Vehicle </center></h2>
        <form name = "VehicleModifyForm" action="" method="post">
            <table>
                    <tr>
                            <td>Enter Original Plate Number</td>
                            <td><input type = "text" name = "Old_Plate_Num" placeholder = "ABC123" maxlength = "10" required = "required"></td>
                    </tr>

                    <tr>
                            <td>Enter New Plate Number</td>
                            <td><input type = "text" name = "New_Plate_Num" placeholder = "ABC123" maxlength = "10"></td>
                    </tr>

                    <tr>
                            <td>Enter New Customer ID</td>
                            <td><input type = "number" name = "New_ID" placeholder = "ID" maxlength = "10" max = "9999999999"></td>
                    </tr>

                    <tr>
                            <td>Enter New Color</td>
                            <td><input type = "text" name = "New_Color" placeholder = "Ex. Blue" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Type</td>
                            <td><input type = "text" name = "New_Type" placeholder = "Type" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Make</td>
                            <td><input type = "text" name = "New_Make" placeholder = "Make" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New VIN</td>
                            <td><input type = "text" name = "New_VIN" placeholder = "VIN" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Year</td>
                            <td><input type = "Year" name = "New_Year"></td>
                    </tr>

                    <tr>
                            <td>Enter New Mileage</td>
                            <td><input type = "number" name = "New_Mileage" maxlength = "10"></td>
                    </tr>

                    <tr>
                        <td><input type = "submit" name = "UpdateVehicleSubmit" value = "Update"> </td>
                    </tr>
            </table>
        </form>
        </div>
        <?php

        $query = "SELECT * FROM vehicle";
        $vehResult = mysqli_query($link, $query);

        $query2 = "SELECT * FROM customer";
        $custResult = mysqli_query($link, $query2);


        if(isset($_POST["deleteVehicle"])) {
            mysqli_query($link, "DELETE FROM vehicle WHERE vehicle.Plate_Num = '$_POST[Plate_Num]'");
            header('Location: View_CustomerInfo.php');
        }
        
        if(isset($_POST["UpdateVehicleSubmit"])) {
            $flag = True;
            $check = True;

            if($_POST["New_ID"] != "") {
                $check = False;
                while($cust = mysqli_fetch_assoc($custResult)) {
                    if($cust['Cust_Num'] == $_POST['New_ID']) {
                        $check = True;
                        break;
                    }
                }
            }

            if($_POST["New_Plate_Num"] != "") {
                while($veh = mysqli_fetch_assoc($vehResult)) {
                    if($veh['Plate_Num'] == $_POST['New_Plate_Num']) {
                        header('Location: FailedVehicle.php');
                    }
                }
            }

            if($check == False) {
                header('Location: FailedVehicle.php');
            }

            while($veh = mysqli_fetch_assoc($vehResult)) {
                if($veh['Plate_Num'] == $_POST['Old_Plate_Num']) {
                    $flag = False;
                    if($_POST["New_Plate_Num"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Plate_Num = '$_POST[New_Plate_Num]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_ID"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Cust_Num = '$_POST[New_ID]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Color"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Color = '$_POST[New_Color]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Type"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Type = '$_POST[New_Type]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Make"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Make = '$_POST[New_Make]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_VIN"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET VIN = '$_POST[New_VIN]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Year"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Year = '$_POST[New_Year]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Mileage"] != "") {
                        mysqli_query($link, "UPDATE vehicle SET Mileage = '$_POST[New_Mileage]' WHERE Plate_Num ='$_POST[Old_Plate_Num]'");
                    }
                }
            }
            if($flag == True) {
                header('Location: FailedVehicle.php');
            }
        }
        
        ?>
    </body>
</html>

