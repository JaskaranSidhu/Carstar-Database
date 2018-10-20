<?php
ob_start();
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Employee Table </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <center>
            <div class = "heading">
                <a href="http://localhost/cpsc471/Home.php"><img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png"></a>
            </div>
            <div class="estimate">
                <form name = "EmployeeInsertForm" action="" method="post">
                    <table>
                        <tr>
                            <td>
                                <font size = "5">
                                    <b>
                                        Insert Employee
                                    </b>
                                </font>
                            </td>
                        </tr>

                        <tr>
                            <td>Enter ID</td>
                            <td><input type = "number" name = "Emp_ID" placeholder = "ID" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>

                            <tr>
                                <td>Enter SIN</td>
                                <td><input type = "number" name = "Emp_SIN" placeholder = "123456789" maxlength = "9" required = "required"></td>
                        </tr>

                        <tr>
                            <td>Enter Username</td>
                            <td><input type = "text" name = "Emp_Username" placeholder = "Username" maxlength = "25" required = "required"></td>
                        </tr>

                        <tr>
                            <td>Enter Password</td>
                            <td><input type = "password" name = "Emp_Password" placeholder = "Password" maxlength = "25" required = "required"></td>
                        </tr>

                        <tr>
                            <td>Enter First Name</td>
                            <td><input type = "text" name = "Emp_F_Name" placeholder = "First Name" maxlength = "25" required = "required"></td>
                        </tr>

                        <tr>
                            <td>Enter Middle Initial</td>
                            <td><input type = "text" name = "Emp_M_Init" placeholder = "Middle Initial" maxlength = "5"></td>
                        </tr>

                        <tr>
                            <td>Enter Last Name</td>
                            <td><input type = "text" name = "Emp_L_Name" placeholder = "Last Name" maxlength = "25" required = "required"></td>
                        </tr>

                        <tr>
                            <td>Enter Sex</td>
                            <td><input type = "text" name = "Emp_Sex" placeholder = "Sex" maxlength = "10"></td>
                        </tr>

                        <tr>
                            <td>Enter Birth Date</td>
                            <td><input type = "date" name = "Emp_Birth_Date"></td>
                        </tr>

                        <tr>
                            <td>Enter Address</td>
                            <td><input type = "text" name = "Emp_Address" placeholder = "Address" maxlength = "200"></td>
                        </tr>

                        <tr>
                            <td>Enter Start Date</td>
                            <td><input type = "date" name = "Emp_Start_Date"></td>
                        </tr>

                        <tr>
                            <td>Enter Phone Number</td>
                            <td><input type = "number" name = "Emp_Phone_Num" placeholder = "4031234567" ></td>
                        </tr>
                        <tr>
                            <td>Select One</td>
                        </tr>
                        <tr>
                            <td>
                                <label><input type="radio" value="Emp_Bodyman" name="Emp_type" required="required">Bodyman</label>
                                 <input type="number" name="BM_Hourly_Wage" placeholder="hourly wage in $ (ex. 15)">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label><input type="radio" value="Emp_Estimator" name="Emp_type">Estimator</label>
                                <input type="number" name="Est_Salary" placeholder="Salary in $ (ex. 40000)">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label><input type="radio" value="Emp_Neither" name="Emp_type">Neither</label>
                            </td>
                        </tr>
                        <tr>
                            <td><input type = "submit" name = "insertEmployeeSubmit" value = "Insert"> </td>
                        </tr>
                    </table>
                </form>

                <form name = "EmployeeModifyForm" action="" method="post">
                    <table>
                        <tr>
                            <td>
                                <font size = "5">
                                    <b>
                                        Modify Employee
                                    </b>
                                </font>
                            </td>
                        </tr>

                        <tr>
                            <td>Enter Old Username</td>
                            <td><input type = "text" name = "Emp_Old_Username" placeholder = "Username" maxlength = "25" required="
                                required"></td>
                        </tr>

                        <tr>
                            <td>Enter Old Password</td>
                            <td><input type = "password" name = "Emp_Old_Password" placeholder = "Password" maxlength = "25" required = "required"></td>
                        </tr>

                        <tr>
                            <td>Enter New SIN</td>
                            <td><input type = "number" name = "Emp_New_SIN" placeholder = "123456789" maxlength = "9"></td>
                        </tr>

                        <tr>
                            <td>Enter New Username</td>
                            <td><input type = "text" name = "Emp_New_Username" placeholder = "Username" maxlength = "25"></td>
                        </tr>

                        <tr>
                            <td>Enter New Password</td>
                            <td><input type = "password" name = "Emp_New_Password" placeholder = "Password" maxlength = "25"></td>
                        </tr>

                        <tr>
                            <td>Enter New First Name</td>
                            <td><input type = "text" name = "Emp_New_F_Name" placeholder = "First Name" maxlength = "25"></td>
                        </tr>

                        <tr>
                            <td>Enter New Middle Initial</td>
                            <td><input type = "text" name = "Emp_New_M_Init" placeholder = "Middle Initial" maxlength = "5"></td>
                        </tr>

                        <tr>
                            <td>Enter New Last Name</td>
                            <td><input type = "text" name = "Emp_New_L_Name" placeholder = "Last Name" maxlength = "25"></td>
                        </tr>

                        <tr>
                            <td>Enter New Sex</td>
                            <td><input type = "text" name = "Emp_New_Sex" placeholder = "Sex" maxlength = "10"></td>
                        </tr>

                        <tr>
                            <td>Enter New Birth Date</td>
                            <td><input type = "date" name = "Emp_New_Birth_Date"></td>
                        </tr>

                        <tr>
                            <td>Enter New Address</td>
                            <td><input type = "text" name = "Emp_New_Address" placeholder = "Address" maxlength = "200"></td>
                        </tr>

                        <tr>
                            <td>Enter New Start Date</td>
                            <td><input type = "date" name = "Emp_New_Start_Date"></td>
                        </tr>

                        <tr>
                            <td>Enter New Phone Number</td>
                            <td><input type = "number" name = "Emp_New_Phone_Num" placeholder = "4031234567" ></td>
                        </tr>

                        <tr>
                            <td>Select Updated position</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" value="Emp_New_Bodyman" name="Emp_New_type">
                                <label for="Emp_New_Bodyman">Bodyman</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="number" name="BM_New_Hourly_Wage" placeholder="new hourly wage in $ (ex. 15)">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="radio" value="Emp_New_Estimator" name="Emp_New_type">
                                <label for="Emp_New_Estimator">Estimator</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="number" name="Est_New_Salary" placeholder="New Salary in $ (ex. 40000)">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="radio" value="Emp_New_Neither" name="Emp_New_type">
                                <label for="Emp_New_Estimator">Neither</label>
                            </td>
                        </tr>

                        <tr>
                            <td><input type = "submit" name = "modifyEmployeeSubmit" value = "Modify"> </td>
                        </tr>

                    </table>
                </form>

                <form name = "EmployeeDeleteForm" action="" method="post">
                    <table>
                        <tr>
                            <td>
                                <br>
                                <font size = "5">
                                    <b>
                                        Delete Employee
                                    </b>
                                </font>
                            </td>
                        </tr>


                        <tr>
                            <td>Enter ID</td>
                            <td><input type = "number" name = "Emp_ID_Delete" placeholder = "ID" maxlength = "10" max = "9999999999" required = "required"></td>
                        </tr>

                        <tr>
                            <td><input type = "submit" name = "deleteEmployeeSubmit" value = "Delete"> </td>
                        </tr>
                    </table>
                </form>

                <?php
                $query = "SELECT * FROM employee";
                $result = mysqli_query($link, $query);

                if(isset($_POST["insertEmployeeSubmit"])) {
                    while($emp = mysqli_fetch_assoc($result)) {
                        if($emp['SIN'] == $_POST['Emp_SIN']) {
                            header('Location: FailedEmp.php');
                        } 
                        if($emp['Username'] == $_POST['Emp_Username']) {
                            header ('Location: FailedEmp.php');
                        } 
                    }

                    mysqli_query($link, "insert into Employee values('$_POST[Emp_ID]', '$_POST[Emp_SIN]', '$_POST[Emp_Username]', '$_POST[Emp_Password]', '$_POST[Emp_F_Name]', '$_POST[Emp_M_Init]', '$_POST[Emp_L_Name]', '$_POST[Emp_Sex]', '$_POST[Emp_Birth_Date]', '$_POST[Emp_Address]', '$_POST[Emp_Start_Date]', '$_POST[Emp_Phone_Num]')");

                    switch($_POST['Emp_type']) {
                    case "Emp_Bodyman":
                        mysqli_query($link, "insert into Bodyman values('$_POST[Emp_ID]', '$_POST[BM_Hourly_Wage]')");
                        break;
                    case "Emp_Estimator":
                        mysqli_query($link, "insert into Estimator values('$_POST[Emp_ID]', '$_POST[Est_Salary]')");
                        break;
                    case "Emp_Neither":
                        break;
                    default:
                        echo "error";
                        break;
                    }
                }

                if(isset($_POST["deleteEmployeeSubmit"])) {
                    mysqli_query($link, "DELETE FROM employee WHERE employee.ID = '$_POST[Emp_ID_Delete]'");
                }

                if(isset($_POST["modifyEmployeeSubmit"])) {
                    $flag = True;
                    $check = True;
                    $check2 = True;

                    if($_POST["Emp_New_SIN"] != "") {
                        while($emp = mysqli_fetch_assoc($result)) {
                            if($emp['SIN'] == $_POST['New_SIN']) {
                                $check = False;
                                break;
                            }
                        }
                    }

                    if($_POST["Emp_New_Username"] != "") {
                        while($emp = mysqli_fetch_assoc($result)) {
                            if($emp['Est_Num'] == $_POST['Emp_New_Username']) {
                                $check2 = False;
                                break;
                            }
                        }
                    }

                    if($check == False || $check2 == False) {
                        header('Location: FailedEmp.php');
                    }


                    while($employee=mysqli_fetch_assoc($result)) {
                        if($employee['Username'] == $_POST['Emp_Old_Username'] && $employee['Password'] == $_POST['Emp_Old_Password']) {
                            $flag = False;
                            if($_POST["Emp_New_SIN"] != "") {
                                mysqli_query($link, "UPDATE employee SET SIN = '$_POST[Emp_New_SIN]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Password"] != "") {
                                mysqli_query($link, "UPDATE employee SET Password = '$_POST[Emp_New_Password]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_F_Name"] != "") {
                                mysqli_query($link, "UPDATE employee SET F_Name = '$_POST[Emp_New_F_Name]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_M_Init"] != "") {
                                mysqli_query($link, "UPDATE employee SET M_Init = '$_POST[Emp_New_M_Init]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_L_Name"] != "") {
                                mysqli_query($link, "UPDATE employee SET L_Name = '$_POST[Emp_New_L_Name]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Sex"] != "") {
                                mysqli_query($link, "UPDATE employee SET Sex = '$_POST[Emp_New_Sex]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Birth_Date"] != "") {
                                mysqli_query($link, "UPDATE employee SET Birth_Date = '$_POST[Emp_New_Birth_Date]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Address"] != "") {
                                mysqli_query($link, "UPDATE employee SET Address = '$_POST[Emp_New_Address]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Start_Date"] != "") {
                                mysqli_query($link, "UPDATE employee SET Start_Date = '$_POST[Emp_New_Start_Date]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Phone_Num"] != "") {
                                mysqli_query($link, "UPDATE employee SET Phone_Num = '$_POST[Emp_New_Phone_Num]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            if($_POST["Emp_New_Username"] != "") {
                                mysqli_query($link, "UPDATE employee SET Username = '$_POST[Emp_New_Username]' WHERE Username ='$_POST[Emp_Old_Username]'");
                            }
                            switch($_POST['Emp_New_type']) {
                                case "Emp_New_Bodyman":
                                    if($_POST["BM_New_Hourly_Wage"] != "") {
                                        mysqli_query($link, "DELETE FROM Bodyman WHERE Bodyman.ID = $employee[ID]");
                                        mysqli_query($link, "DELETE FROM Estimator WHERE Estimator.ID = $employee[ID]");
                                        mysqli_query($link, "INSERT into Bodyman values($employee[ID], '$_POST[BM_New_Hourly_Wage]')");
                                        break;
                                    }
                                    mysqli_query($link, "DELETE FROM Estimator WHERE Estimator.ID = $employee[ID]");
                                    mysqli_query($link, "INSERT into Bodyman values($employee[ID], '$_POST[BM_New_Hourly_Wage]')");
                                    break;
                                case "Emp_New_Estimator":
                                    if($_POST["Est_New_Salary"] != "") {
                                        mysqli_query($link, "DELETE FROM Bodyman WHERE Bodyman.ID = $employee[ID]");
                                        mysqli_query($link, "DELETE FROM Estimator WHERE Estimator.ID = $employee[ID]");
                                        mysqli_query($link, "INSERT into Estimator values($employee[ID], '$_POST[Est_New_Salary]')");
                                        break;
                                    }
                                    mysqli_query($link, "DELETE FROM Bodyman WHERE Bodyman.ID = $employee[ID]");
                                    mysqli_query($link, "INSERT into Estimator values($employee[ID], '$_POST[Est_New_Salary]')");
                                    break;
                                case "Emp_New_Neither":
                                    mysqli_query($link, "DELETE FROM Bodyman WHERE Bodyman.ID = $employee[ID]");
                                    mysqli_query($link, "DELETE FROM Estimator WHERE Estimator.ID = $employee[ID]");
                                    break;
                                default:
                                    break;
                            }

                        }
                    }
                    if($flag == True) {
                        header ('Location: FailedEmp.php');
                    }
                }

                ?>
            </div>
        </center>
    </body>
</html>
