<?php
include_once ("config.php");
//tra ve true neu nguoi dung nhan submit(update)
if (isset($_POST['update'])){
    $id =$_POST['id'];

    $name =$_POST['name'];
    $mobile= $_POST['mobile'];
    $email =$_POST['email'];

    $result = mysqli_query($mysqli,"UPDATE student SET name ='$name',email ='$email',
    mobile='$mobile' WHERE id = $id");

    //quay ve trang chu neu cap nhat xong
    header("Location: index.php");
}
?>
<?php
//lay id tu URL
$id = $_GET['id'];
//Fetech du lieu theo id
$result = mysqli_query($mysqli,"SELECT * FROM student WHERE id = $id");

while ($user_data = mysqli_fetch_array($result)){
    $name = $user_data['name'];
    $email =$user_data['email'];
    $mobile=$user_data['mobile'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
</head>
<body>
<a href="index.php">Home</a>
<br/><br/>
<form name ="update_student" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value=<?php echo $name;?>></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value=<?php echo $email;?>></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>