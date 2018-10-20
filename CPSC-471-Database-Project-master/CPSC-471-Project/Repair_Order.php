<?php
ob_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>



<!DOCTYPE HTML>
<html>
        <head>
                <title>
                        Parts and Repair Order
                </title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>

        <body>
                <center>
                     <div class = "heading">
                        <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
                    </div>
                    <div class="estimate">
                        <form name = "InsertRO" action="" method="post">

                                <table>
                                        <tr>
                                                <td>
                                                        <font size = "5">
                                                                <b>
                                                                        Insert Repair Order
                                                                </b>
                                                        </font>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td>Enter Repair Order Number</td>
                                                <td><input type = "number" name = "RO_RO_Num" placeholder = "123456789" maxlength = "9" required = "required"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter ID</td>
                                                <td><input type = "number" name = "RO_ID" placeholder = "ID" maxlength = "10" max = "9999999999" required = "required"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Estimate Number</td>
                                                <td><input type = "number" name = "RO_Est_Num" placeholder = "Estimate Number" maxlength = "10" max = "9999999999" required = "required"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Hours</td>
                                                <td><input type = "number" name = "RO_Hours" placeholder = "Hours" maxlength = "10" max = "9999999999"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Cost of Repair</td>
                                                <td><input type = "number" name = "RO_Cost" placeholder = "Cost of Repair. ($1000)" maxlength = "10" max = "9999999999"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Job Class</td>
                                                <td><input type = "text" name = "RO_Job_Class" placeholder = "Job Class" maxlength = "25"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Status of repair</td>
                                                <td><input type = "text" name = "RO_Status" placeholder = "Done/In shop" maxlength = "25"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Scheduled In</td>
                                                <td><input type = "date" name = "RO_Sch_In"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Scheduled Out</td>
                                                <td><input type = "date" name = "RO_Sch_Out"></td>
                                        </tr>

                                        <tr>
                                                <td><input type = "submit" name = "insertROSubmit" value = "Insert"> </td>
                                        </tr>

                                </table>
                        </form>


                        <form name = "UpdateRO" action="" method="post">

                                <table>
                                        <tr>
                                                <td>
                                                        <font size = "5">
                                                                <b>
                                                                        Update Repair Order
                                                                </b>
                                                        </font>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td>Enter Orignal Repair Order Number</td>
                                                <td><input type = "number" name = "Old_RO_Num" placeholder = "123456789" maxlength = "9" required = "required"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated ID</td>
                                                <td><input type = "number" name = "New_ID" placeholder = "ID" maxlength = "10" max = "9999999999"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Estimate Number</td>
                                                <td><input type = "number" name = "New_Est_Num" placeholder = "Estimate Number" maxlength = "10" max = "9999999999"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Hours</td>
                                                <td><input type = "number" name = "New_Hours" placeholder = "Hours" maxlength = "10" max = "9999999999"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Cost of Repair</td>
                                                <td><input type = "number" name = "New_Cost" placeholder = "Cost of Repair. ($1000)" maxlength = "10" max = "9999999999"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Job Class</td>
                                                <td><input type = "text" name = "New_Job_Class" placeholder = "Job Class" maxlength = "25"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Status of repair</td>
                                                <td><input type = "text" name = "New_Status" placeholder = "Done/In shop" maxlength = "25"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Scheduled In</td>
                                                <td><input type = "date" name = "New_Sch_In"></td>
                                        </tr>

                                        <tr>
                                                <td>Enter Updated Scheduled Out</td>
                                                <td><input type = "date" name = "New_Sch_Out"></td>
                                        </tr>

                                        <tr>
                                                <td><input type = "submit" name = "UpdateROSubmit" value = "Update"> </td>
                                        </tr>

                                </table>
                        </form>



                        <form name = "RODeleteForm" action="" method="post">
                                <table>
                                        <tr>
                                                <td>
                                                        <br>
                                                        <font size = "5">
                                                                <b>
                                                                        Delete Repair Order
                                                                </b>
                                                        </font>
                                                </td>
                                        </tr>


                                        <tr>
                                                <td>Enter Repair Order Number</td>
                                                <td><input type = "number" name = "Del_RO_Num" placeholder = "123456789" maxlength = "9" required = "required"></td>
                                        </tr>

                                        <tr>
                                                <td><input type = "submit" name = "deleteROSubmit" value = "Delete"> </td>
                                        </tr>
                                </table>
                            
                        </form>
                    </div>

                        <?php
                        $checking = False;
                        $checking1 = False;

                        $query1 = "SELECT * FROM employee";
                        $empResult = mysqli_query($link, $query1);

                        $query2 = "SELECT * FROM estimate";
                        $estResult = mysqli_query($link, $query2);

                        $query = "SELECT * FROM repair_order";
                        $result = mysqli_query($link, $query);

                        if(isset($_POST["insertROSubmit"])) {
                            while($RO = mysqli_fetch_assoc($result)) {
                                if($RO['RO_Num'] == $_POST['RO_RO_Num']) {
                                    header('Location: FailedRO.php');
                                }
                            }

                            while($emp = mysqli_fetch_assoc($empResult)) {
                                if($emp['ID'] == $_POST['RO_ID']) {
                                    $checking = True;
                                }
                            }

                            while($est = mysqli_fetch_assoc($estResult)) {
                                if($est['Est_Num'] == $_POST['RO_Est_Num']) {
                                    $checking1 = True;
                                }
                            }

                            if(checking == False || checking2 == False) {
                                header('Location: FailedRO.php');
                            }


                            mysqli_query($link, "INSERT into repair_order VALUES ('$_POST[RO_RO_Num]', '$_POST[RO_ID]', '$_POST[RO_Est_Num]', '$_POST[RO_Hours]', '$_POST[RO_Cost]', '$_POST[RO_Job_Class]', '$_POST[RO_Status]', '$_POST[RO_Sch_In]', '$_POST[RO_Sch_Out]')");

                            mysqli_query($link, "INSERT into works_on VALUES ('$_POST[RO_RO_Num]', '$_POST[RO_ID]')");
                        }

                        if(isset($_POST["deleteROSubmit"])) {
                            mysqli_query($link, "DELETE FROM repair_order WHERE repair_order.RO_Num = '$_POST[Del_RO_Num]'");
                        }

                        if(isset($_POST["UpdateROSubmit"])) {
                            $flag = True;
                            $check = True;
                            $check2 = True;

                            if($_POST["New_ID"] != "") {
                                while($emp = mysqli_fetch_assoc($empResult)) {
                                    if($emp['ID'] == $_POST['New_ID']) {
                                        $check = True;
                                        break;
                                    }
                                }
                                $check = False;
                            }

                            if($_POST["New_Est_Num"] != "") {
                                while($est = mysqli_fetch_assoc($estResult)) {
                                    if($est['Est_Num'] == $_POST['New_Est_Num']) {
                                        $check2 = True;
                                        break;
                                    }
                                }
                                $check2 = False;
                            }

                            if($check == False || $check2 == False) {
                                header('Location: FailedRO.php');
                            }

                            while($RO = mysqli_fetch_assoc($result)) {
                                if($RO['RO_Num'] == $_POST['Old_RO_Num']) {
                                    $flag = False;
                                    if($_POST["New_ID"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET ID = '$_POST[New_ID]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Est_Num"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET PartNum = '$_POST[New_Est_Num]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Hours"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET Type = '$_POST[New_Hours]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Cost"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET Status = '$_POST[New_Cost]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Job_Class"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET Description = '$_POST[New_Job_Class]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Status"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET Order_Date = '$_POST[New_Status]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Sch_In"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET Arrival_Date = '$_POST[New_Sch_In]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                    if($_POST["New_Sch_Out"] != "") {
                                        mysqli_query($link, "UPDATE repair_order SET Invoice_Num = '$_POST[New_Sch_Out]' WHERE RO_Num ='$_POST[Old_RO_Num]'");
                                    }
                                }
                            }
                            if($flag == True) {
                                header('Location: FailedRO.php');
                            }
                        }

                        ?>
                </center>
        </body>
</html>
