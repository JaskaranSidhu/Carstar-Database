<?php
ob_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>
                Delete/Modify Insurance
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
        </div>
        <div class ="estimate">
        <form name = "InsuranceDeleteForm" action="" method="post">
                <table>
                    <h2> <center> Delete Insurance </center> </h2>
                        <tr>
                                <td>Enter Insurance Number</td>
                                <td><input type = "number" name = "InsID" placeholder = "Insurance Number" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>

                        <tr>
                                <td><input type = "submit" name = "deleteInsurance" value = "Delete"> </td>
                        </tr>
                </table>
        </form>

        <form name = "InsuredByDeleteForm" action="" method="post">
                <table>
                    <h2> <center> Delete Insured By </center> </h2>
                        <tr>
                                <td>Enter Insurance Number</td>
                                <td><input type = "number" name = "InsByID" placeholder = "Insurance Number" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>

                        <tr>
                                <td>Enter Plate Number</td>
                                <td><input type = "text" name = "Ins_Plate_Num" placeholder = "Plate Number" maxlength = "10" required = "required"></td>
                        </tr>

                        <tr>
                                <td><input type = "submit" name = "deleteInsuredBy" value = "Delete"> </td>
                        </tr>
                </table>
        </form>

        <h2> <center> Delete Insured With </center></h2>
        <form name = "InsuredWithDeleteForm" action="" method="post">
                <table>
                        <tr>
                                <td>Enter Insurance Number</td>
                                <td><input type = "number" name = "InsWithID" placeholder = "Insurance Number" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>

                        <tr>
                                <td>Enter Customer Number</td>
                                <td><input type = "number" name = "Ins_Cust_Num" placeholder = "Customer Number" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>

                        <tr>
                                <td><input type = "submit" name = "deleteInsuredWith" value = "Delete"> </td>
                        </tr>
                </table>
        </form>
        
        <h2> <center> Modify Insurance </center></h2>
        <form name = "InsuranceModifyForm" action="" method="post">
            <table>
                    <tr>
                            <td>Enter Original Insurance ID</td>
                            <td><input type = "number" name = "Old_InsID_Num" placeholder = "Insurance Number" maxlength = "10" max = "9999999999" required = "required"></td>
                    </tr>

                    <tr>
                            <td>Enter New Name</td>
                            <td><input type = "text" name = "New_Name" placeholder = "Name" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Phone Number</td>
                            <td><input type = "number" name = "New_Number" placeholder = "4031234567" maxlength = "12"></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "UpdateInsuranceSubmit" value = "Update"> </td>
                    </tr>
            </table>
        </form>

        <h2> <center> Modify Insured By </center></h2>
        <form name = "InsuredByModifyForm" action="" method="post">
            <table>
                    <tr>
                            <td>Enter Original Insurance ID</td>
                            <td><input type = "number" name = "Old_InsByID_Num" placeholder = "Insurance Number" maxlength = "10" max = "9999999999" required = "required"></td>
                    </tr>

                    <tr>
                            <td>Enter Original Plate Number</td>
                            <td><input type = "text" name = "Old_Plate_Num" placeholder = "Plate Number" maxlength = "10" required="required"></td>
                    </tr>

                    <tr>
                            <td>Enter New Insurance ID</td>
                            <td><input type = "number" name = "New_InsByID_Num" placeholder = "Insurance Number" maxlength = "10" max = "9999999999"></td>
                    </tr>

                    <tr>
                            <td>Enter New Plate Number</td>
                            <td><input type = "text" name = "New_Plate_Num" placeholder = "Plate_Num" maxlength = "10"></td>
                    </tr>

                    <tr>
                            <td>Enter New Claim Number</td>
                            <td><input type = "number" name = "New_Claim" placeholder = "Claim number" maxlength = "10"></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "UpdateInsuredBySubmit" value = "Update"> </td>
                    </tr>
            </table>
        </form>

        <h2> <center> Modify Insured With </center></h2>
        <form name = "InsuredWithModifyForm" action="" method="post">
            <table>
                    <tr>
                            <td>Enter Original Insurance ID</td>
                            <td><input type = "number" name = "Old_InsWithID_Num" placeholder = "Insurance Number" maxlength = "10" max = "9999999999" required = "required"></td>
                    </tr>

                    <tr>
                            <td>Enter Original Customer Number</td>
                            <td><input type = "number" name = "Old_Cust_Num" placeholder = "Customer Number" maxlength = "10" max = "9999999999" required="required"></td>
                    </tr>

                    <tr>
                            <td>Enter New Insurance ID</td>
                            <td><input type = "number" name = "New_InsWithID_Num" placeholder = "Insurance Number" maxlength = "10" max = "9999999999"></td>
                    </tr>

                    <tr>
                            <td>Enter New Customer Number</td>
                            <td><input type = "number" name = "New_Cust_Num" placeholder = "Customer Number" maxlength = "10" max = "9999999999"></td>
                    </tr>

                    <tr>
                            <td>Enter New Deductible</td>
                            <td><input type = "number" name = "New_Deduct" placeholder = "$$$" maxlength = "10" max = "9999999999"></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "UpdateInsuredWithSubmit" value = "Update"> </td>
                    </tr>
            </table>
        </form>

        </div>
        <?php

        $query1 = "SELECT * FROM Customer";
        $custResult = mysqli_query($link, $query1);

        $query2 = "SELECT * FROM vehicle";
        $vehResult = mysqli_query($link, $query2);

        $query = "SELECT * FROM Insurance";
        $result = mysqli_query($link, $query);

        $query3 = "SELECT * FROM Insured_By";
        $byResult = mysqli_query($link, $query3);

        $query4 = "SELECT * FROM Insured_With";
        $withResult = mysqli_query($link, $query4);


        if(isset($_POST["deleteInsurance"])) {
            mysqli_query($link, "DELETE FROM Insurance WHERE Insurance.ID_Num = '$_POST[InsID]'");
        }

        if(isset($_POST["deleteInsuredBy"])) {
            mysqli_query($link, "DELETE FROM Insured_By WHERE Insured_By.ID_Num = '$_POST[InsByID]' AND Insured_By.Plate_Num = '$_POST[Ins_Plate_Num]'");
        }

        if(isset($_POST["deleteInsuredWith"])) {
            mysqli_query($link, "DELETE FROM Insured_With WHERE Insured_With.ID_Num = '$_POST[InsWithID]' AND Insured_With.Cust_Num = '$_POST[Ins_Cust_Num]'");
        }

        
        if(isset($_POST["UpdateInsuranceSubmit"])) {
            $flag = True;
            $check = True;
            $check2 = True;


            while($ins = mysqli_fetch_assoc($result)) {
                if($ins['ID_Num'] == $_POST['Old_InsID_Num']) {
                    $flag = False;
                    if($_POST["New_InsID_Num"] != "") {
                        mysqli_query($link, "UPDATE Insurance SET ID_Num = '$_POST[New_InsID_Num]' WHERE ID_Num ='$_POST[Old_InsID_Num]'");
                    }
                    if($_POST["New_Name"] != "") {
                        mysqli_query($link, "UPDATE Insurance SET Name = '$_POST[New_Name]' WHERE ID_Num ='$_POST[Old_InsID_Num]'");
                    }
                    if($_POST["New_Number"] != "") {
                        mysqli_query($link, "UPDATE Insurance SET Phone_Num = '$_POST[New_Number]' WHERE ID_Num ='$_POST[Old_InsID_Num]'");
                    }
                }
            }
            if($flag == True) {
                header('Location: FailedInsurance.php');
            }
        }



        if(isset($_POST["UpdateInsuredBySubmit"])) {
            $flag = True;
            $check = True;
            $check2 = True;

            if($_POST["New_InsByID_Num"] != "") {
                $check = False;
                while($Ins = mysqli_fetch_assoc($result)) {
                    if($Ins['ID_Num'] == $_POST['New_InsByID_Num']) {
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
                header('Location: FailedInsurance.php');
            }

            while($inss = mysqli_fetch_assoc($byResult)) {
                if($inss['ID_Num'] == $_POST['Old_InsByID_Num'] && $inss['Plate_Num'] == $_POST['Old_Plate_Num']) {
                    $flag = False;
                    if($_POST["New_InsByID_Num"] != "") {
                        mysqli_query($link, "UPDATE Insured_By SET ID_Num = '$_POST[New_InsByID_Num]' WHERE ID_Num ='$_POST[Old_InsByID_Num]' AND Plate_Num = '$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Plate_Num"] != "") {
                        mysqli_query($link, "UPDATE Insured_By SET Plate_Num = '$_POST[New_Plate_Num]' WHERE ID_Num ='$_POST[Old_InsByID_Num]' AND Plate_Num = '$_POST[Old_Plate_Num]'");
                    }
                    if($_POST["New_Claim"] != "") {
                        mysqli_query($link, "UPDATE Insured_By SET Claim_Num = '$_POST[New_Claim]' WHERE ID_Num ='$_POST[Old_InsByID_Num]' AND Plate_Num = '$_POST[Old_Plate_Num]'");
                    }
                }
            }
            if($flag == True) {
                header('Location: FailedInsurance.php');
            }
        }
        
        if(isset($_POST["UpdateInsuredWithSubmit"])) {
            $flag = True;
            $check = True;
            $check2 = True;

            if($_POST["New_InsWithID_Num"] != "") {
                $check = False;
                while($Ins = mysqli_fetch_assoc($result)) {
                    if($Ins['ID_Num'] == $_POST['New_InsWithID_Num']) {
                        $check = True;
                        break;
                    }
                }
            }

            if($_POST["New_Cust_Num"] != "") {
                $check2 = False;
                while($cust = mysqli_fetch_assoc($custResult)) {
                    if($cust['Cust_Num'] == $_POST['New_Cust_Num']) {
                        $check2 = True;
                        break;
                    }
                }
            }

            if($check == False || $check2 == False) {
                header('Location: FailedInsurance.php');
            }

            while($inss = mysqli_fetch_assoc($withResult)) {
                if($inss['ID_Num'] == $_POST['Old_InsWithID_Num'] && $inss['Cust_Num'] == $_POST['Old_Cust_Num']) {
                    $flag = False;
                    if($_POST["New_InsWithID_Num"] != "") {
                        mysqli_query($link, "UPDATE Insured_With SET ID_Num = '$_POST[New_InsWithID_Num]' WHERE ID_Num ='$_POST[Old_InsWithID_Num]' AND Cust_Num = '$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_Cust_Num"] != "") {
                        mysqli_query($link, "UPDATE Insured_With SET Cust_Num = '$_POST[New_Cust_Num]' WHERE ID_Num ='$_POST[Old_InsWithID_Num]' AND Cust_Num = '$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_Deduct"] != "") {
                        mysqli_query($link, "UPDATE Insured_With SET Deductible = '$_POST[New_Deduct]' WHERE ID_Num ='$_POST[Old_InsWithID_Num]' AND Cust_Num = '$_POST[Old_Cust_Num]'");
                    }
                }
            }
            if($flag == True) {
                header('Location: FailedInsurance.php');
            }
        }
        
        ?>
    </body>
</html>

