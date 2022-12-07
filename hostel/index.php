
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student_signup_page</title>
    <link rel="stylesheet" href="style_page/css_style/style.css"  >
    <style>
#sg{
    top:0px;
}
</style>
</head>
<body>
    <div class="sl" id="sg">
<form action="#"  method="POST">
  <div class="sr">
    <h1>Sign Up</h1> <hr>
  <label for="roll"><b>Roll No. :</b></label><br>
    <input type="text" placeholder="Enter Roll Number" name="roll" required><br>
    <label for="fname"><b>First Name :</b></label><br>
    <input type="text" placeholder="Enter First Name" name="fname" required><br>
    <label for="lname"><b>Last Name :</b></label><br>
    <input type="text" placeholder="Enter Last Name" name="lname" required><br>
    <label for="mob"><b>Mobile No. :</b></label><br>
    <input type="text" placeholder="Enter Mobile No." name="mob" required> <br>
    <label for="dept"><b>Department :</b></label><br>
    <input type="text" placeholder="Enter Department " name="dept" required><br>
    <label for="yos"><b>Year Of Study :</b></label><br>
    <input type="text" placeholder="Enter Year Of Study " name="yof" required><br>
   <label for="ss"><b>Session :</b></label><br>
    <input type="text" placeholder="Enter session " name="session" required><br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number 
    and one uppercase and lowercase letter, and at least 8 or more characters" 
    placeholder="Enter Password" name="psw" required><br>
    <label for="psw-repeat"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
<button type="submit" name="submit" class="a">Submit</button>
<a style="text-align:center"href="student_module/slogin.php">Login</a>
</div>
</form>
</div>
</body>
<?php
$showAlert=false;
if(isset($_POST['submit']) ){
  include 'student_module/connection.php';
  $roll = $_POST['roll'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mob'];
    $dept = $_POST['dept'];
    $year = $_POST['yof'];
    $ssession=$_POST['session'];
    $password = $_POST['psw'];
    $cnfpassword = $_POST['psw-repeat'];
    
    

    if(!preg_match("/^[a-zA-Z0-9]*$/",$roll)){
      header("Location: index.php?error=invalidroll");
      exit();
    }
    else if($password !== $cnfpassword ){
      header("Location: index.php?error=passwordcheck");
      exit();
    }
    else {
      $sql = "Select * from hostel_allocation.student where roll_no='$roll'";
      
      $result = mysqli_query($conn, $sql);
      
      $num = mysqli_num_rows($result);
      if($num==0){
        // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO hostel_allocation.student (roll_no, fname, lname, mob_no, pass,dept, year_of_study, ssession)
     VALUES ('$roll','$fname','$lname','$mobile','$password','$dept','$year','$ssession')";
    
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
            header("Location: student_module/slogin.php?signup=success");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            
          }
          
          
          
          
          
          
          //     else {
            // // mysqli_stmt_execute($stmt);
            //       exit();
            //     }
          }
          else{
            $exists="user exists";
            echo "<script>alert('Already ragistered')</script>";
            header("Location: index.php?");
  }
  
}}
?>

</html>