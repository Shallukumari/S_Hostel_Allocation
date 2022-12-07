
<?php
   include 'connection.php';
   if(isset($_POST['vacate'])){
       $roll=$_POST['roll'];
       $msg=$_POST['message'];
      
   // Trigger lagana hai yaha !
// application table me 

$sql = "SELECT *from hostel_allocation.application where roll_no = '$roll'";
         
$result=mysqli_query($conn,$sql);
$check = false;
if (mysqli_num_rows($result) > 0){
    $check = true;
}

if($check){
    echo "<script>alert('cant apply with more than one applications')
    window.location.href='profile.php'</script>";
}
else{

    $sql= "INSERT into hostel_allocation.application (roll_no,apply_for,messages) VALUES ('$roll','2','$msg')";  // 2 means vacate room
    if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
    } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    echo "<script>alert('Application Submitted!')
    window.location.href='profile.php'</script>";

}


}           
             
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacate Rooms</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa Slab One" >
    <link rel="stylesheet" href="../style_page/css_style/admin_work.css" >
    <style >
        .heading{
            font-family: 'Alfa Slab One';
            font-size:34px;
        }
        form{
            display:flex;
            justify-content:center;
            flex-direction:column;
        }
        .rrow textarea{
width:300px;
margin:5px ;
height:200px;
resize: none;
display:block;
        }
        .vacateBtn{
            width: 9rem;
    height: 3rem;
    background-color: #2196f3;
    font-size: large;
    border-radius: 5px;
    color: white;
    border: 1px solid black;
    cursor: pointer;
        }
      
    </style>
</head>
<body>
<h1 class="heading">Vacate Rooms</h1>
<form action="" method="post">
<input class="search"  name = 'roll' required type="text" placeholder="Roll Number">
<input class="search"  name = 'name'  type="text" placeholder="Name">
<div class="rrow">
            <textarea name="message"  placeholder="Message..." required=""></textarea>
            </div>
<input type="submit" name="vacate" class="vacateBtn" value="Apply">
</form>
</body>
</html>