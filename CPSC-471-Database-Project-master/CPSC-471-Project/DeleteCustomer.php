<?php
ob_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>
                Delete/Modify Customer
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "heading">
            <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
        </div>
        <div class ="estimate">
        <form name = "CustomerDeleteForm" action="" method="post">
                <table>
                    <h2> <center> Delete Customer </center> </h2>
                        <tr>
                                <td>Enter Customer Number</td>
                                <td><input type = "number" name = "CustID" placeholder = "ID" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>
                        <tr>
                                <td><input type = "submit" name = "deleteCustomer" value = "Delete"> </td>
                        </tr>
                </table>
        </form>
        
        <h2> <center> Modify Customer </center></h2>
        <form name = "CustomerModifyForm" action="" method="post">
            <table>
                    <tr>
                            <td>Enter Original Customer Number</td>
                            <td><input type = "number" name = "Old_Cust_Num" placeholder = "Customer Number" maxlength = "10" max = "9999999999" required = "required"></td>
                    </tr>

                    <tr>
                            <td>Enter New First Name</td>
                            <td><input type = "text" name = "New_F_Name" placeholder = "Name" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Middle Initial</td>
                            <td><input type = "text" name = "New_M_Init" maxlength = "3"></td>
                    </tr>

                    <tr>
                            <td>Enter New Last Name</td>
                            <td><input type = "text" name = "New_L_Name" placeholder = "Last Name" maxlength = "25"></td>
                    </tr>

                    <tr>
                            <td>Enter New Phone Number</td>
                            <td><input type = "number" name = "New_Phone_Num" placeholder = "4031234567" maxlength = "12"></td>
                    </tr>

                    <tr>
                            <td>Enter New Address</td>
                            <td><input type = "text" name = "New_Address" placeholder = "Address" maxlength = "200"></td>
                    </tr>

                    <tr>
                            <td>Enter New Rental</td>
                            <td><input type = "text" name = "New_Rental" placeholder = "Yes/No" maxlength = "3"></td>
                    </tr>
                    <tr>
                        <td><input type = "submit" name = "UpdateCustomerSubmit" value = "Update"> </td>
                    </tr>
            </table>
        </form>
        </div>
        <?php

        $query = "SELECT * FROM Customer";
        $result = mysqli_query($link, $query);


        if(isset($_POST["deleteCustomer"])) {
            mysqli_query($link, "DELETE FROM Customer WHERE Customer.Cust_Num = '$_POST[CustID]'");
        }
        
        if(isset($_POST["UpdateCustomerSubmit"])) {
            $flag = True;

            while($Cust = mysqli_fetch_assoc($result)) {
                if($Cust['Cust_Num'] == $_POST['Old_Cust_Num']) {
                    $flag = False;
                    if($_POST["New_F_Name"] != "") {
                        mysqli_query($link, "UPDATE Customer SET F_Name = '$_POST[New_F_Name]' WHERE Cust_Num ='$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_M_Init"] != "") {
                        mysqli_query($link, "UPDATE Customer SET M_Init = '$_POST[New_M_Init]' WHERE Cust_Num ='$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_L_Name"] != "") {
                        mysqli_query($link, "UPDATE Customer SET L_Name = '$_POST[New_L_Name]' WHERE Cust_Num ='$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_Phone_Num"] != "") {
                        mysqli_query($link, "UPDATE Customer SET Phone_Num = '$_POST[New_Phone_Num]' WHERE Cust_Num ='$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_Address"] != "") {
                        mysqli_query($link, "UPDATE Customer SET Address = '$_POST[New_Address]' WHERE Cust_Num ='$_POST[Old_Cust_Num]'");
                    }
                    if($_POST["New_Rental"] != "") {
                        mysqli_query($link, "UPDATE Customer SET Rental = '$_POST[New_Rental]' WHERE Cust_Num ='$_POST[Old_Cust_Num]'");
                    }
                }
            }
            if($flag == True) {
                header('Location: FailedCustomer.php');
            }
        }
        
        ?>
    </body>
</html>

