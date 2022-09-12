<?php
/*$dataHost = 'localhost';
$dataName = 'student_db';
$dataUserName = 'root';
$dataPassWord = '';

$mysqli = mysqli_connect($dataHost,$dataUserName,$dataPassWord,$dataName);*/
include_once ("config.php");


//doc toan bo ban ghi
$result =mysqli_query($mysqli,"SELECT * FROM student ORDER BY id DESC");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student management</title>
</head>
<body>
<a href="create.php">Add new student</a><br/><br/>

    <table width='90%' border=1>
        <tr>
            <th>Name</th> <th>Mobile</th> <th>Email</th> <th>Update</th>
        </tr>
        <?php
        while ($student_data = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$student_data['name']."</td>";
            echo "<td>".$student_data['mobile']."</td>";
            echo "<td>".$student_data['email']."</td>";
            echo "<td><a href='edit.php?id=$student_data[id]'>Edit</a> |
                <a href = 'delete.php?id=$student_data[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>
