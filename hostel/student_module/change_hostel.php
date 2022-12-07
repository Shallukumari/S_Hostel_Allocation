<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Hostel</title>
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
    <h2>Apply for Change Hostel</h2>
    <form action="" method="Post">
        
        <div class="rrow">
            <input type="text" name="name" placeholder="Name" required="required">
            </div>
            <div class="rrow">
            <input type="text" name="roll" placeholder="Roll Number" required="required">
            </div>
            <div class="rrow">
            <input type="text" name="hname" placeholder="Hostel Name" required="required">
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
<?php

include 'connection.php';
if(isset($_POST['submit'])){
    $roll=$_POST['roll'];
$hostel_name=$_POST['hname'];
$message=$_POST['message'];
$sql1= "SELECT hostel FROM hostel_allocation.student WHERE roll_no='$roll'";


$result = mysqli_query($conn, $sql1);
                 
                 if (mysqli_num_rows($result) > 0) {
                     
                while($row = mysqli_fetch_assoc($result)) {
                      $hostel_name = $row['hostel'];
                   }   
                
                
                }
            
    if($hostel_name !=null){

      $sql = "INSERT INTO hostel_allocation.application( roll_no,apply_for,messages) VALUES ('$roll','1','$message')";
      if ($conn->query($sql) === TRUE) {
      
        echo "<script>alert('Apply for new Hostel');
        window.location.href='hostel_services.php'
        </script>";
           

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
    else{
      echo "<script>alert('No hostel allocated')</script>";
    }


}
?>
</html>