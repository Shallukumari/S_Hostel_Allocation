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
        .head{
          font-size:x-large;
        }
        .msg{
             font-size:large;
             margin:4rem;
             width:auto;
             height:5rem;
             border:2px solid black;
        }
        .date{
            font-size:small;
            font-weight:bold;

        }
        .time{
            font-size:small;
            font-weight:50;
        }
    </style>
</head>
<body>
    <table style="width:100%">
            <tbody><tr>
                <th class="head"><h1>Messages</h1></th>
            </tr>
    <?php
    session_start();
    $roll=$_SESSION['roll'];
    include "connection.php";
     $sql = "SELECT *FROM hostel_allocation.admin_reply WHERE roll_no='$roll' order by reply_date and reply_time desc ";
     $result = mysqli_query($conn, $sql); 
     
    while($row = mysqli_fetch_assoc($result)) {
        $msg = $row['messages'];
        $date = $row['reply_date'];
        $time = $row['reply_time'];

      echo "<tr>
      <th>
      <div class='date'>$date</div>
      <div class='msg'>$msg
      <div class='time'>$time</div>
      </div>
      </th>
     
      </tr>";
        
    
    }
    ?>
    
</body>
</html>