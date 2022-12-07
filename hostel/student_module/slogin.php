<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student login</title>
    <link rel="stylesheet" href="../style_page/css_style/style.css"  >
</head>

<body>
    <div class="sl">
    <h2>Student Login</h2>
    <form action="#" method="POST">
        <div class="sr">
        <label class="required"> Roll No.:</label><br>
       
        <input type="text" class="student" name="username" placeholder="ROLL NUMBER " required="required">
        <br>
        <label class="required">Password:</label><br>
        <input type="password" class="student" name="password" placeholder="Password" required="required">
           <br>
         <button type="submit" name="submit" class="a">Login</button>

</form>
<p class="admin_register">Login as  <a href="../admin_module/alogin.php" class="">admin </a></p>
<p class="noaccount">Don't have account  <a href="../index.php" class="" >Sign Up </a></p>
</div>
</div>
</body>
<?php
session_start();
if(isset($_POST['submit'])){
  include 'connection.php';
  $roll = $_POST['username'];
  $pass= $_POST['password'];
  // echo $roll." ".$pass;
  $_SESSION['roll'] = $roll;
  if (empty($roll) || empty($password)) {
    header("Location: slogin.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT *FROM hostel_allocation.student WHERE roll_no = '$roll'";
   
    $result = mysqli_query($conn, $sql);
    //$result->execute();
    $num = mysqli_num_rows($result);
  
    $actualPass =0;
    while($row = mysqli_fetch_assoc($result)) {
        $actualPass = $row['pass'];
      }
if($num == 1 && $pass==$actualPass){
    echo $roll." ".$pass;
   $login=true;
$_session['loggedin']=true;
$_SESSION['fname'] = $row['fname'];
$_SESSION['lname'] = $row['lname'];
$_SESSION['mob_no'] = $row['Mob_no'];
$_SESSION['department'] = $row['dept'];
$_SESSION['year_of_study'] = $row['year_of_study'];
$_SESSION['hostel_name'] = $row['hostel_name'];
$_SESSION['room_id'] = $row['room_id'];
$_SESSION['session'] = $row['session'];
$_SESSION['room_no'] = $row['room_no'];
header("Location: home_page.php?login=success");
}
   else{
    $showError="Something wrong";
    echo "<script>alert('wrong password')</script>";
   }
}
   
          
     
  }
 
?>
</html>