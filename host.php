<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

session_start();
if(!isset($_SESSION["sess_id"])){
	header("location:allEvents.php");
} else {}
if(!isset($_SESSION["sess_name"])){
	header("location:allEvents.php");
} else {}

$id = $_SESSION['sess_id'];
$name = $_SESSION['sess_name'];

$today = date("Y-m-d");






     $query = "SELECT * FROM events"; //You don't need a ; like you do in SQL
     $result = mysqli_query($connect,$query);

?>

<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>Hosted events and Guest List</title>
</head>
<body>

<h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li class="active"> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>  

 <h4> Choose the event for which you would like to see the participants</h4>
       
 <form action="" method="POST">
        <select name="eventlist">

            <?php 
            
            while($row1 = mysqli_fetch_array($result)):;
            if ($id==$row1['userid']):;
            
            ?>

            <option value="
                           <?php 
                           echo $row1[0];
                           ?>">
                <?php 
                echo $row1[1];
                
                ?>
            </option>

            <?php 
            
          endif;
            endwhile;
            ?>
            

        </select>
    
       <input type="submit" value="go" name="submit"> 
  
<?php     
if(isset($_POST["submit"]))
{
    $event =$_POST['eventlist'];
    
    
    
    
     $query11 = "SELECT * FROM ticket "; //You don't need a ; like you do in SQL
     $result2 = mysqli_query($connect,$query11);
     
     while($rowk = mysqli_fetch_array($result2)){   //Creates a loop to loop through results
  {
      if ($event == $rowk ['eventid']) {
  
          $memberid = $rowk['memberidattending'];
          
    

     $query2 = "SELECT * FROM members WHERE id='".$memberid."'"; //You don't need a ; like you do in SQL
     $result3 = mysqli_query($connect,$query2);
          
          
     
     while($rowk1 = mysqli_fetch_array($result3)){   //Creates a loop to loop through results
  {
     
   echo  "<br /><br />" ."First Name: ". $rowk1['fname'] . "<br/> </td> <td>" ."Last Name: ".$rowk1['lname'] . "<br /></td> <td>" ."Email : ". $rowk1['email']."</td> <td>" . "</td><br /></tr>" ;  
 }

          
 }
     

 }

    
}
 }
}
     




?>

</form>

    </body>

</html>
