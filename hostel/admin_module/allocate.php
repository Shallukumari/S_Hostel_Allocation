


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alloacte</title>
    <link rel="stylesheet" href="../style_page/css_style/admin_work.css" >
    <style>
      
    </style>
</head>
<body>
<a href="empty_rooms.php" style="font-weight:300;text-decoration:none;">Available Rooms </a>
<h1 style="font-weight:300">Student Details</h1>
<div class="student-data">
    <table style="width:100%">
        <tbody><tr style='color:blue'>
            <th>Name</th>
            <th>Roll No</th>
            <th>Department</th>
            <th>Year Of Study</th>
            <th>Session</th>
        
           
           
        </tr>

  <?php 
     include "../student_module/connection.php";
     
     
     
     
     session_start();
     if(isset($_POST['submit'])){
       $roll= $_POST['roll'];
       $_SESSION['roll'] = $roll;
       $sql="SELECT * FROM hostel_allocation.student WHERE roll_no='$roll'";
       $result = mysqli_query($conn, $sql);
       
       if (mysqli_num_rows($result) > 0) {
         
         while($row = mysqli_fetch_assoc($result)) {
           $name =$row['fname']." ". $row['lname'];
           $roll= $row['roll_no'];
           $dept=$row['dept'];
           $yof=$row['year_of_study'];
           $sn=$row['ssession'];
           
           
           echo "<tr >
           <th>$name</th>
           <th>$roll</th>
           <th>$dept</th>
           <th>$yof</th>
                  <th>$sn</th>
                  </tr>";
                  
                }   
              }
            }
         echo" </tbody></table></div>
         <div>
          <form method='POST' action='handle_allocation.php'>
         <input type='text' name='hostel'  placeholder='Hostel'/>
         <input type='text' name='room'  placeholder='Room No'/>";
         
         $sql = "SELECT *from hostel_allocation.application where roll_no = '$roll'";
         
       $result=mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          $apply_for = $row['apply_for'];
      }
    

        if($apply_for == 0)
         echo "
         <input type='submit' name='allocate' class='allocateBtn' value='Allocate'/>";
        else if($apply_for == 1)
         echo "
         <input type='submit' name='allocate' class='allocateBtn' value='Reallocate'/>";
        else 
         echo "
         <input type='submit' name='vacate' class='allocateBtn' value='vacate'/>";
       
       echo "</form>
     </div>
     </body>";
  ?>

 
</html>
