<?php
//kiem tra xem form co submit(add)

if (isset($_POST['Submit'])){
    $name = $_POST['name'];
    $email =$_POST['email'];
    $mobile = $_POST['mobile'];

    //load doi tuong connection
    include_once ("config.php");

    //them ban ghi
    $result = mysqli_query($mysqli,"INSERT INTO student(name,email,mobile)
VALUES ('$name','$email','$mobile')");

    //hien thi sau khi add thanh cong

    echo "User added successfully";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add student</title>
</head>
<body>
<a href="index.php">Go to Home</a>
<br><br>

<form action="create.php" method="post" name="form">
    <table width="25%" border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name="mobile"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>

</body>
</html>
