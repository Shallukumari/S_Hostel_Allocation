





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home_page</title>
    <link rel="stylesheet" href="../style_page/css_style/admin_work.css" >
    <style>
        .ReallocateBtn{
    width: 7rem;
    height: 3rem;
    color: white;
    font-size: large;
    border-radius: 5px;
    border: 1px solid black;
    cursor: pointer;
    background:blue;
    
}
.vacate{
    color: red;
    font-size: x-large;
}
    </style>
</head>
<body>
<h1 class="heading">Application Recieved Page</h1>
<div class="search-bar">
        <input class="search" type="text" placeholder="Search By Roll Number..">
        <input type="submit" name="searchBtn" class="searchBtn" value="search">
    </div>
    <h1 style="font-weight:300">Application Recieved</h1>
    <div class="student-data">
        <table style="width:100%">
            <tbody><tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Hostel</th>
                <th>Room No</th>
                <th>Message</th>
                <th>Allocate</th>
            </tr>

           
            <?php

   include "../student_module/connection.php";
   $sql = "SELECT *FROM hostel_allocation.application";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
    
     while($row = mysqli_fetch_assoc($result)) {
        
        $message = $row['messages'];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        $roll = $row['roll_no'];
        $sql1 = "SELECT *FROM hostel_allocation.student WHERE roll_no ='$roll' ";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            
            while($row1 = mysqli_fetch_assoc($result1)) {
                $fullName = $row1['fname']." ".$row1['lname'];
                $hostel = $row1['hostel'];
                $room = $row1['room_no'];
              
                if($hostel ==null ){
                    echo "<form action='allocate.php' method='POST'><tr>
                    <td>$fullName</td>
                    <td>$roll</td>
                    <td>$hostel</td>
                    <td>$room</td>
                    <td>$message</td>
                    <td>
                    <input type='hidden' name='roll'  value=$roll>
                    <input type='submit' name='submit' class='allocateBtn' value='Allocate'/>
                    </td>
                    </tr></form>";
                }
                else if($row['apply_for']==1){
                    echo "<form action='allocate.php' method='POST'><tr>
                    <td>$fullName <span class='reallocation'>(Re-allocation)</span></td>
                    <td>$roll</td>
                    <td>$hostel</td>
                    <td>$room</td>
                    <td>$message</td>
                    <td>
                    <input type='hidden' name='roll'  value=$roll>
                    <input type='submit' name='submit' class='ReallocateBtn' value='Re-Allocate'/>
                    </td>
                    </tr></form>";
                }
                else if($row['apply_for']==2){
                    echo "<form action='allocate.php' method='POST'><tr>
                    <td>$fullName <span class='vacate'>(Vacate)</span></td>
                    <td>$roll</td>
                    <td>$hostel</td>
                    <td>$room</td>
                    <td>$message</td>
                    <td>
                    <input type='hidden' name='roll'  value=$roll>
                    <input type='submit' name='submit' class='ReallocateBtn' value='Vacate'/>
                    </td>
                    </tr></form>";
                }
            }
        }

     }
   } else {
     echo "0 results";
   }
   
   mysqli_close($conn);
   


?>
</tbody></table>

    </div>

</body>
</html>