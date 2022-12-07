<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href='https://fonts.googleapis.com/css?family=Bungee Shade' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa Slab One" >
    <link rel="stylesheet" href="../style_page/css_style/style.css" > 
<link rel="stylesheet" href="../style_page/css_style/admin_style.css" >
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
 
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <style type="text/css">
        body{
        
            margin:0px;
        padding: 0px;
        position:absolute;
        background: url('../style_page/images/green-g3930d652b_1920.jpg' );
      width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);
        background-repeat: no-repeat;
background-size: cover;
     }
    .sl{
font-family: 'Bungee Shade';
color: rgb(128, 29, 128);
font-size:70px;
}
.dropdown-menu a{
    font-size:large;
    border:5px;
    color:rgb(100, 25, 100);
}
.info{
        display:block;
        width:600px;
        margin:150px 500px;
        font-style:italic;
        font-weight:bold;
        font-size:30px;
       background-color:rgba(86, 58, 39, 0.3);
       border-radius:20px;
     }
     .info h2{
        text-align:center;
        font-style:italic;
        color:rgb(450, 80, 80);
     }
     .address li {
padding:10px;
text-decoration:none;
list-style-type:none;
color:white;
     }
    </style>
</head>
<body>

<header class="header">
    <div class="left">
       </div>
    <div class="mid1">
         <ul class="navbar1">
            <li><img style="width:3rem; "  src="../style_page/images/IITG_logo.png" opacity= 0.5; alt=""></li>
            <li><a href="admin_homepage.php" >Home</a></li>
            <li><a href="allocate_room.php" >Allocate Rooms</a></li>
            <li><a href="message_hostel_admin.php" >Messages Received</a></li>
            
            <li class="dropdown">

            <a href="#" class="btn btn-primary" id="dropDownButton" aria-expanded="false" data-toggle="dropdown">Rooms
							<b class="caret"></b>
						</a>
                        <ul class="dropdown-menu" aria-labelledby="dropDownButton">
							<li>
								<a href="allocated_rooms.php">Allocated Rooms</a>
							</li>
							<li>
								<a href="empty_rooms.php">Empty Rooms</a>
							</li>
						</ul>
            </li>
            
            <li class="dropdown">
						<a href="#" class="btn btn-primary" aria-expanded="false"  data-toggle="dropdown">Profile
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu "aria-labelledby="dropDownButton">
							<li>
								<a href="admin_profile.php">My Profile</a>
							</li>
							<li>
								<a href="alogin.php">Logout</a>
							</li>
						</ul>
					</li>
         </ul>
    </div>
   
    </header>
    
<form action="#" method="post" class="frm">
    <div class="info">
<h2 >PERSONAL INFO</h2>

        <?php

   include "../student_module/connection.php";
   $sql = "SELECT *FROM hostel_allocation.admin";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result) ;
        $fullName = $row['fname']." ".$row['lname'];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        $email = $row['admin_id'];
        $mob = $row['mob_no'];
        
            }
else {
     echo "0 results";
   }
   
   mysqli_close($conn);
   ?>
    <ul class="address" >
		<li><b>Username: <span><?php echo $fullName?></span></b></li>
		 <li><b>Phone No.: <span><?php echo $email ?></span></b></li>
        <li><b>Email Id: <span><?php echo $mob?></span></b></li>
    
        </ul>



    </div>
    </form>
</body>
</html>