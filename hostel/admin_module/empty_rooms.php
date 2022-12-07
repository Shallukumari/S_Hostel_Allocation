<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empty Rooms</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa Slab One" >
    <link rel="stylesheet" href="../style_page/css_style/admin_work.css" >
    <style >
        .heading{
            font-family: 'Alfa Slab One';
            font-size:34px;
        }
    </style>
</head>
<body>
<h1 class="heading">Empty Rooms</h1>

    <h1 style="font-weight:300">Empty Rooms</h1>
    <div class="student-data">
        <table style="width:80rem;">
            <tbody><tr>
                <th>Hostel Name</th>
                <th>Number of Available Rooms</th>
                <th>vacant Room No </th>
                <th>Alloted Room No </th>
               
            </tr>
<?php  
     include "../student_module/connection.php";
     $str2 ="";
$sql1 = "SELECT *FROM hostel_allocation.hostel ";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {

while($row1 = mysqli_fetch_assoc($result1)) {
    $room = $row1['no_rooms'];
    $hostel = $row1['hostel_name'];
    // $hostel = strtoupper($hostel);

    $sql = "SELECT *from hostel_allocation.hostel where hostel_name ='$hostel'";
    $result=mysqli_query($conn,$sql);
  
  if (mysqli_num_rows($result) > 0) {
      $str="";
    $row = mysqli_fetch_assoc($result);
    
    if($row['alloted_room'] == NULL){
        for($x = 1;$x<=100;$x++){
            $str = $str.$x." , ";
            // if($x%20==0){
                //     $str =$str."\n";
                // }
            }
            $str2="";
        }
    else{
        
        $roomArr = (explode(",",$row['alloted_room']));
          $updateRoom  = [];
         for($x = 1;$x<=100;$x++){
                if(!in_array($x,$roomArr))
                $str = $str.$x." , ";

                
         }
         $str2="";
         for($x=0;$x<count($roomArr);$x++){
            $str2 = $str2.$roomArr[$x]." ";
         }
    }

  }
    echo "<tr>
    <td>$hostel</td>
    <td>$room</td>
    <td>$str</td>
    <td>$str2</td>
    </tr>";
}
}
?>


            <!-- DATA -->
             

            <!-- DATA -->

        </tbody></table>

    </div>
</body>
</html>