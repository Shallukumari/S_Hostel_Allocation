<?php
session_start();
include "../student_module/connection.php";
$old_room =0;
if(isset($_POST['vacate'])){
   $roll = $_SESSION['roll'];
  $sql = "SELECT *FROM hostel_allocation.student WHERE roll_no='$roll'";

  $result=mysqli_query($conn,$sql);
  $old_hostel = null;
  if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    $hostel = $row['hostel'];
    $room = $row['room_no'];
  }
  
  strtoupper($hostel);
  
  $sql = "SELECT *from hostel_allocation.hostel where hostel_name ='$hostel'";
  $result=mysqli_query($conn,$sql);
  
  if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    $availRoom = (explode(",", $row['alloted_room']));
    $no_of_rooms = $row['no_rooms']+1;
    $no_of_std = $row['no_students']-1;
    $str = "";
    for($x = 0;$x<count($availRoom);$x++){
         if($availRoom[$x] != $room){
            $str = $str.$availRoom[$x].",";
         }
    }

    $sql = "UPDATE hostel_allocation.hostel SET alloted_room = '$str',no_rooms = '$no_of_rooms',no_students='$no_of_std' WHERE hostel_name='$hostel'";
          if(mysqli_query($conn,$sql)){
           
            $sql = "DELETE from hostel_allocation.student where roll_no = '$roll'";
            if(mysqli_query($conn,$sql)){

              $sql = "DELETE FROM hostel_allocation.application WHERE roll_no='$roll'";
              mysqli_query($conn,$sql);

              echo "<script>alert('Vacated room')
              window.location.href='allocate_room.php'</script>";
            }
            else{
              echo mysqli_error($conn);
            }

          }
          else{
            echo mysqli_error($conn);
          }

  }
  else{
    echo mysqli_error($conn);
  }
  
 
}
if(isset($_POST['allocate'])){
  
  
  //  Reallocation 
  
  $roll = $_SESSION['roll'];
  
  $sql = "SELECT *FROM hostel_allocation.student WHERE roll_no='$roll'";

  $result=mysqli_query($conn,$sql);
  $old_hostel = null;
  if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    $old_hostel = $row['hostel'];
    $old_room = $row['room_no'];


  }
  
  $room = $_POST['room'];
  $hostel = $_POST['hostel'];
  $no_of_rooms = 0;
  $no_of_std = 0;
  
  strtoupper($hostel);
  
  $sql = "SELECT *from hostel_allocation.hostel where hostel_name ='$hostel'";
  $result=mysqli_query($conn,$sql);
  
  if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    $availRoom = (explode(",", $row['alloted_room']));
    $no_of_rooms = $row['no_rooms']-1;
    $no_of_std = $row['no_students']+1;
    
  }
  else{
    echo mysqli_error($conn);
  }
  
  
  if($old_hostel != null){
    
    if(in_array($room,$availRoom)){
      echo "<script>alert('already Allocated !')</script>";
      
      // page redirect to be handle 
      // header("Location: allocate.php");
    }
    else{
      $str ="";
      for($x = 0;$x<count($availRoom);$x++){
        $str = $str.$availRoom[$x].",";
          }
          echo "db".$str;
          $str = $str.$room;
          echo "change".$str;
         
          $sql = "UPDATE hostel_allocation.hostel SET alloted_room = '$str',no_rooms = '$no_of_rooms',no_students='$no_of_std' WHERE hostel_name='$hostel'";
          if(mysqli_query($conn,$sql)){
            echo "inserted";
            
            // update student table
            $sql = "UPDATE hostel_allocation.student SET hostel = '$hostel',room_no='$room' WHERE roll_no='$roll'";
            if(mysqli_query($conn,$sql)){
              echo "inserted student detail";
              
              // reallocate handle
              // dlt  room from previous hostel
              $sql = "SELECT *from hostel_allocation.hostel where hostel_name='$old_hostel'";
              $result = mysqli_query($conn,$sql);
              if (mysqli_num_rows($result) > 0) {
                
                $row = mysqli_fetch_assoc($result);
                $old_hostel_rooms =(explode(",",$row['alloted_room']));
                $oh_no_of_rooms = $row['no_rooms']+1;
                $Oh_no_of_std = $row['no_students']-1;
                
                $str2 = "";
                for($x =0;$x<count($old_hostel_rooms);$x++){
                  if($old_hostel_rooms[$x] != $old_room){
                    $str2 = $str2.$old_hostel_rooms[$x].",";
                               }
                          }
                          
                                              $sql = "UPDATE hostel_allocation.hostel SET alloted_room='$str2',no_rooms='$oh_no_of_rooms',no_students='$Oh_no_of_std' WHERE hostel_name='$old_hostel'";
                                                 if(mysqli_query($conn,$sql)){
                                                  echo "dlt old hostel room";
                                                    }
                                                 else{
                                                   echo mysqli_error($conn);
                                                 }

                    }
  
                }
                else{
                  echo mysqli_error($conn);
                }
                
              }
              else{
                echo mysqli_error($conn);
              }
            }
            
            
          }
          else{
            
            // new allocation 
            $str ="";
            for($x=0;$x<count($availRoom);$x++){
              $str = $str.$availRoom[$x].",";
            }
            $str = $str.$room;
            

            // hostel upadte
            $sql = "UPDATE hostel_allocation.hostel SET alloted_room = '$str',no_rooms = '$no_of_rooms',no_students='$no_of_std' WHERE hostel_name='$hostel'";
            if(mysqli_query($conn,$sql)){
              echo "inserted";
            }
            else{
            echo mysqli_error($conn);
            }
            
            // student  details update
            $sql = "UPDATE hostel_allocation.student SET hostel = '$hostel',room_no='$room' WHERE roll_no='$roll'";
            if(mysqli_query($conn,$sql)){
              echo "inserted student detail";
            }
            else{
            echo mysqli_error($conn);
            }

        }
        
      }
    //  now delete  from application table who have been alloted !

      $sql = "DELETE FROM hostel_allocation.application WHERE roll_no='$roll'";
      mysqli_query($conn,$sql);

      echo "<script>alert('Alloted');
      window.location.href='allocate_room.php';
      </script>";
      
      ?>
  <script>
    function msg(text){
      alert(text);
    }
    </script>