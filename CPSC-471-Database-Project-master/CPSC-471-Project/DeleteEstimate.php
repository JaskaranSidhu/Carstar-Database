<?php
ob_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>
                Delete/Modify Estimate
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
        </div>
        <div class ="estimate">
        <form name = "EstimateDeleteForm" action="" method="post">
                <table>
                    <h2> <center> Delete Estimate </center> </h2>
                        <tr>
                                <td>Enter Estimate Number</td>
                                <td><input type = "number" name = "EstID" placeholder = "ID" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>
                        <tr>
                                <td><input type = "submit" name = "deleteEstimate" value = "Delete"> </td>
                        </tr>
                </table>
        </form>
        
        <h2> <center> Modify Estimate </center></h2>
        <form name = "EstimateModifyForm" action="" method="post">
            <table>
                    <tr>
                            <td>Enter Original Estimate Number</td>
                            <td><input type = "number" name = "Old_Est_Num" placeholder = "Estimate Number" maxlength = "10" max = "9999999999" required = "required"></td>
                    </tr>

                    <tr>
                            <td>Enter New Estimator ID</td>
                            <td><input type = "number" name = "New_ID" placeholder = "ID" maxlength = "10" max = "9999999999"></td>
                    </tr>

                    <tr>
                            <td>Enter New Plate Number</td>
                            <td><input type = "text" name = "New_Plate_Num" placeholder = "ABC 1234" maxlength = "9"></td>
                    </tr>

                    <tr>
                            <td>Enter New Job Class</td>
                            <td><input type = "text" name = "New_Job_Class" placeholder = "Light? Medium? Heavy?" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Hours</td>
                            <td><input type = "number" name = "New_Hours" placeholder = "Number Hours" maxlength = "5"></td>
                    </tr>

                    <tr>
                            <td>Enter New Status</td>
                            <td><input type = "text" name = "New_Status" placeholder = "Assigned" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Cost</td>
                            <td><input type = "number" name = "New_Cost" placeholder = "$$$" maxlength = "10"></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "UpdateEstimateSubmit" value = "Update"> </td>
                    </tr>
            </table>
        </form>
        </div>
        <?php

        $query1 = "SELECT * FROM employee";
        $empResult = mysqli_query($link, $query1);

        $query2 = "SELECT * FROM vehicle";
        $vehResult = mysqli_query($link, $query2);

        $query = "SELECT * FROM estimate";
        $result = mysqli_query($link, $query);


        if(isset($_POST["deleteEstimate"])) {
            mysqli_query($link, "DELETE FROM estimate WHERE estimate.Est_Num = '$_POST[EstID]'");
            header('Location: View_Estimate.php');
        }
        
        if(isset($_POST["UpdateEstimateSubmit"])) {
            $flag = True;
            $check = True;
            $check2 = True;

            if($_POST["New_ID"] != "") {
                $check = False;
                while($emp = mysqli_fetch_assoc($empResult)) {
                    if($emp['ID'] == $_POST['New_ID']) {
                        $check = True;
                        break;
                    }
                }
            }

            if($_POST["New_Plate_Num"] != "") {
                $check2 = False;
                while($veh = mysqli_fetch_assoc($vehResult)) {
                    if($veh['Plate_Num'] == $_POST['New_Plate_Num']) {
                        $check2 = True;
                        break;
                    }
                }
            }

            if($check == False || $check2 == False) {
                header('Location: FailedEstimate.php');
            }

            while($est = mysqli_fetch_assoc($result)) {
                if($est['Est_Num'] == $_POST['Old_Est_Num']) {
                    $flag = False;
                    if($_POST["New_ID"] != "") {
                        mysqli_query($link, "UPDATE estimate SET ID = '$_POST[New_ID]' WHERE Est_Num ='$_POST[Old_Est_Num]'");
                    }
                    if($_POST["New_Plate_Num"] != "") {
                        mysqli_query($link, "UPDATE estimate SET Plate_Num = '$_POST[New_Plate_Num]' WHERE Est_Num ='$_POST[Old_Est_Num]'");
                    }
                    if($_POST["New_Job_Class"] != "") {
                        mysqli_query($link, "UPDATE estimate SET Job_Class = '$_POST[New_Job_Class]' WHERE Est_Num ='$_POST[Old_Est_Num]'");
                    }
                    if($_POST["New_Hours"] != "") {
                        mysqli_query($link, "UPDATE estimate SET Hours = '$_POST[New_Hours]' WHERE Est_Num ='$_POST[Old_Est_Num]'");
                    }
                    if($_POST["New_Status"] != "") {
                        mysqli_query($link, "UPDATE estimate SET Status = '$_POST[New_Status]' WHERE Est_Num ='$_POST[Old_Est_Num]'");
                    }
                    if($_POST["New_Cost"] != "") {
                        mysqli_query($link, "UPDATE estimate SET Cost = '$_POST[New_Cost]' WHERE Est_Num ='$_POST[Old_Est_Num]'");
                    }
                }
            }
            if($flag == True) {
                header('Location: FailedEstimate.php');
            }
        }
        
        ?>
    </body>
</html>

