<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../style_page/css_style/style.css" >
    <link rel="stylesheet" href="../style_page/css_style/admin_style.css" >
    <style type="text/css">
     body{
        
        margin:0px;
        padding: 0px;
        position:absolute;
        background: url('../style_page/images/study-room-g2f3d06822_1920.jpg');
      width:100%;
        height:100%;
        background-repeat: no-repeat;
background-size: cover;
     }
     .info{
        display:block;
        width:600px;
        margin:250px 600px;
        font-style:italic;
        font-size:20px;
       background-color:rgba(86, 58, 39, 0.3);
       border-radius:20px;
     }
     .info h2{
        text-align:center;
        font-style:italic;
        color:rgb(200, 100, 100);
     }
     .address li {
padding:10px;
text-decoration:none;
     }
     .header{
       position:absolute;
       top:0;
       
     }
     .address{
      color:white;
     }
    </style>
</head>
<body>
  <form action="#" method="post" class="frm">
    <div class="info">
      <h2>PERSONAL INFO</h2>
      
      
      <?php

include "connection.php";
session_start();
$roll = $_SESSION['roll']; 


$sql="SELECT * FROM hostel_allocation.student WHERE roll_no='$roll'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);

$_SESSION['hostel_status'] = $row['hostel'];
$name = $row['fname']." ".$row['lname'];

echo"<ul class='address'>
<li><b>Name: </b>$name</li>
<li><b>Roll No: </b>$row[roll_no]</li>
<li><b>Dept: </b>$row[dept]</li>

<li><b>Session: </b>$row[ssession]</li>

<li><b>Phone No.:</b>$row[mob_no]</li>

<li><b>Hostel: </b>$row[hostel]</li>

<li><b>Room No.: </b>$row[room_no]</li>

</ul>";




?>
	 
  </div>
</form>
<header class="header">
    <div class="left">
       <img src="../style_page/images/IITG_logo.png" alt="">
    </div>
    <div class="mid">
         <ul class="navbar1">
            <li><a href="home_page.php" >Home</a></li>
            <li><a href="hostel_services.php" >Hostel</a></li>
            <li><a href="contact.php" >Contact Us</a></li>
            <li><a href="slogin.php" data-toggle="dropdown">Logout</a>
            <?php 
             
             if($_SESSION['hostel_status'] != null)
             echo "<li><a href='change_hostel.php'>Change Hostel</a>
             <li><a href='vacate_rooms.php' data-toggle='dropdown'>Vacate Room</a>
                </li>";
            ?>
         </ul>
    </div>
    </header>
</body>
</html>