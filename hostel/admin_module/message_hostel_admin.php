<?php
include '../student_module/connection.php';
if(isset($_POST['send'])){
    
   $roll=$_POST['roll'];
    $message=$_POST['msg'];
    date_default_timezone_set('Asia/Kolkata');
    $date= date("Y/m/d");   
    $time= date('H:i:s');
    $sql = "INSERT INTO hostel_allocation.admin_reply(roll_no,messages,reply_date,reply_time) VALUES ('$roll','$message','$date','$time')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message Sent')</script>";

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
    <title>messages</title>
    <style>
        .msg{
            font-weight:bold;
            color:blue;
        }
        .std{
            margin-top:1rem;
        }
        .std>th{
            font-weight: 100;
           
        }
        .txt{
            display: flex;
            justify-content: center;
            align-items:center;
        }
        .txt>button{
            width:5rem;
            height:2rem;
        }
        textarea{
            width:200px;
            height:70px;
            resize: none;
display:block;
        }
    </style>
</head>
<body>

    <h1 class="msg">Queries From Students</h1>
    <table style="width:100%">
            <tbody><tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Hostel</th>
                <th>Dept</th>
                <th>Message</th>
                <th>Date</th>
                <th>Reply</th>
            </tr>

     <?php
    include "../student_module/connection.php";
    $sql1 = "SELECT *FROM hostel_allocation.contact ";
          $result1 = mysqli_query($conn, $sql1);
          if (mysqli_num_rows($result1) > 0) {
              
              while($row1 = mysqli_fetch_assoc($result1)) {
                     $roll = $row1['roll_no'];

                    $sql = "SELECT *FROM hostel_allocation.student WHERE roll_no='$roll' ";
                      $result = mysqli_query($conn, $sql); 
                     
                     while($row = mysqli_fetch_assoc($result)) {
                         $fullName = $row['fname']." ".$row['lname'];
                         $hostel  = $row['hostel'];
                         $date  = $row1['message_date'];
                         $message  = $row1['messages'];
                         $room_no  = $row['room_no'];
                         $dept  = $row['dept'];
                         
                         echo "<form action='' method='post'><tr class='std'>
                         <th>$fullName</th>
                         <th>$roll</th>
                         <th>$hostel</th>
                         <th>$dept</th>
                         <th>$message</th>
                         <th>$date</th>
                         <th class='txt'><textarea type='text' name='msg'></textarea>
                         <input type='hidden' name='roll' value=$roll>
                         <button type='submit' name='send'>send</button>
                         
                         </th>
                         </tr></form>";

                     }

              }
          }
  
     ?>
</body>
</html>