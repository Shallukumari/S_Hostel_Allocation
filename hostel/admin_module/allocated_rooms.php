<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocated Rooms</title>
    <link rel="stylesheet" href="../style_page/css_style/admin_work.css" >
</head>
<body>
<h1 class="heading">Allocated Rooms</h1>
<div class="search-bar">
        <input class="search" type="text" placeholder="Search By Roll Number..">
        <input type="submit" name="searchBtn" class="searchBtn" value="search">
    </div>
    <h1 style="font-weight:300">Rooms Alloted</h1>
    <div class="student-data">
        <table style="width:100%">
            <tbody><tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Phone No.</th>
                <th>Hostel</th>
                
                <th>Room No.</th>
               
            </tr>
<?php
include "../student_module/connection.php";

$sql="SELECT * from hostel_allocation.student where hostel is not null";
$result=mysqli_query($conn,$sql);
  
  if (mysqli_num_rows($result) > 0) {
    while( $row=mysqli_fetch_assoc($result)){
        $fullname=$row['fname']." " .$row['lname'];
echo" <tr>
<td>$fullname</td>
<td>$row[roll_no]</td>
<td>$row[mob_no]</td>
<td>$row[hostel]</td>
<td>$row[room_no]</td>

</tr>";
    }
}
    
?>
           


            

            <!-- DATA -->

        </tbody></table>

    </div>
</body>
</html>