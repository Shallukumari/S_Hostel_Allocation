<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $hname=$_POST['hostel_name'];
    $room_no=$_POST['room'];
    $message=$_POST['message'];
    $today = date("Y/m/d");   
    $sql = "INSERT INTO hostel_allocation.contact(roll_no,hostel_name,room_no,message_date,messages) VALUES ('$roll','$hname','$room_no','$today','$message')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message Sent')</script>";
       
            header("Location: home_page.php?application=success");

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body{
            margin :0px;
            padding:0px;
            background: url('../style_page/images/sunset-g156ca74dc_1920.jpg');
            text-align:center;
            height:100%;
            background-repeat: no-repeat;
background-size: cover;
        }
        
        .rrow input{
width:300px;
margin:5px ;
height:30px
        }
        .rrow textarea{
width:300px;
margin:5px ;
height:200px

        }
        .row input{
            width: 90px;
            height: 30px;
            cursor: pointer;
            
        }
</style>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="" method="Post">
        
        <div class="rrow">
            <input type="text" name="name" placeholder="Name" required="required">
            </div>
            <div class="rrow">
            <input type="text" name="roll" placeholder="Roll Number" required="required">
            </div>
            <div class="rrow">
            <input type="text" name="hostel_name" placeholder="Hostel Name" required="required">
            </div>
            <div class="rrow">
            <input type="text" name="room" placeholder="Room Number" required="required">
            </div>
            <div class="rrow">
            <textarea name="message" placeholder="Message..." required=""></textarea>
            </div>
            <div class="row">
            <input type="submit" name="submit" value="submit">
    </div>
    </form>
</body>
</html>