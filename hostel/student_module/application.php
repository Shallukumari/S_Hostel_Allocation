
<?php

include 'connection.php';


if(isset($_POST['submit'])){
    $roll=$_POST['roll'];
$hostel_name=$_POST['hname'];
$message=$_POST['message'];


$sql = "SELECT *from hostel_allocation.application where roll_no = '$roll'";
         
$result=mysqli_query($conn,$sql);
$check = false;
if (mysqli_num_rows($result) > 0){
    $check = true;
}

if($check){
    echo "<script>alert('cant apply with more than one applications')
    window.location.href='profile.php'</script>";
}
else{

  
  
  $sql1= "SELECT hostel FROM hostel_allocation.student WHERE roll_no='$roll'";
  
  $result = mysqli_query($conn, $sql1);
                   
                   if (mysqli_num_rows($result) > 0) {
                       
                  while($row = mysqli_fetch_assoc($result)) {
                        $hostel_name = $row['hostel'];
                     }   
                  
                  
                  }
              
      if($hostel_name ==null){
        // apply for column in application table
        //  0 means = new allocation
        //  1 means = re allocation
        //  2 means = Vacant
         
        
        $sql = "INSERT INTO hostel_allocation.application( roll_no,apply_for,messages) VALUES ('$roll','0','$message')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
            header("Location: hostel_services.php?application=success");
  
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
      else{
        echo "<script>alert('Already allocated')</script>";
      }
}


}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>application_form</title>
    <link rel="stylesheet" href="../style_page/css_style/style.css" >
   <style type="text/css">
     body{
        
        margin:0px;
        padding: 0px;
        position:absolute;
       
      width:100%;
        height:100%;
     }
     #navb a{
    margin: 2px 30px;
    color:black;
font-size: 20px;
cursor: pointer;
text-decoration: none;

}
#navbb a{
    margin: 2px 30px;
    color:rgb(67, 5, 5);
font-size: 19px;
cursor: pointer;
text-decoration: none;

}
.sl textarea{
width:300px;
margin:5px ;
height:200px
        }
        .sl{
            top:20%;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="left">
       <img src="../style_page/images/IITG_logo.png" alt="">
    </div>
    <div class="mid">
         <ul class="navbar" id="navb">
            <li><a href="home_page.php" >Home</a></li>
            <li><a href="hostel_services.php" >Hostels</a></li>
            <li><a href="contact.php" >Contact Us</a></li>
            <li ><a href="message_received.php">Message Received</a></li>
            <li><a href="profile.php" data-toggle="dropdown">Profile</a>
            
        </li>
         </ul>
    </div>
    </header>
    <div class="sl" id="sg">
<form action="application.php"  method="POST">
  <div class="sr">
    <h2>Form</h2>
   <label for="roll"><b>Roll No. :</b></label><br>
    <input type="text" placeholder="Enter Roll Number" name="roll" required>
<br>
    
   <label for="lname"><b> Apply For :</b></label><br>
    <input type="text" placeholder="Enter Hostel Name" name="hname" required>
    <br>
    

    
            <textarea name="message" placeholder="Message..." required=""></textarea>
            
  


<button type="submit" name="submit" class="a">Click to Apply</button>
</form>
</div>
</body>
</html>