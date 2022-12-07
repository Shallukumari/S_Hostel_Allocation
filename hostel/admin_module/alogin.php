<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="../style_page/css_style/style.css" >
</head>
<body>
<div class="sl">
    <h2>Admin Login</h2>
    <form action="#" method="POST">
        <div class="sr">
        <label class="required"> Admin ID..</label><br>
       
        <input type="email" class="student" name="username" placeholder="abc@iitg.ac.in " required="required">
        <br>
        <label class="required">Password..</label><br>
        <input type="password" class="student" name="password" placeholder="Password" required="required">
           <br>
         <button type="submit" name="submit" class="a">Login</button>
</div>
</form>
</div>
</body>
<?php
if(isset($_POST['submit'])){
    include '../student_module/connection.php';
    $user = $_POST['username'];
     $pass= $_POST['password'];
    // echo $roll." ".$pass;
     if (empty($user) || empty($pass)) {
       header("Location: alogin.php?error=emptyfields");
       exit();
     }
     else{
        if (($pass == 'Admin@123') && ($user == 'shallu@iitg.ac.in')) {
			header("Location: admin_homepage.php");
			exit;
			 
		} else {
			echo "Login unsuccessfull!!";
		}
     }
    }
?>
</html>