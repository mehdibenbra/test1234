<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);



session_start();
$id = $_SESSION['sess_id'];
?> 

<!doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title>Browse by Category</title>
</head>
<body>

 <h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="home.html">Home</a></li>
    <li><a href="myevents.php">My events</a></li>
    <li><a href="allEvents.php">All events</a></li>
    <li><a href="createEvent.php">Create an event</a></li>
    <li class="active"><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browseByDate.php">Browse (date)</a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li><a href=ticket.php> Book ticket</a> </li>
    <li><a href="logout.php">Logout</a></li>
  </ul>

<form action="" method="POST">
 Categorisation:   <select name="categorisation">
  <option value="Tennis">Tennis event</option>
  <option value="Football">Football event</option>
  <option value="Basket">Basket-ball event</option>
  <option value="Tournament">Tournament</option>
</select> 
    
<input type="submit" name="submit" value="submit">
    </form>
    
<?php  if(isset($_POST["submit"])):;
    
$categorisation=$_POST['categorisation'];   
    
$sql="SELECT * FROM events WHERE categorisation='$categorisation'";  
    
$result=mysqli_query($connect,$sql);
       
$numrows=mysqli_num_rows($result);
    
  if ($numrows==0){
      
        echo "No events in the category ";
      
    } else{

while($row = mysqli_fetch_array($result)){ 
 
        
   echo "<tr><td>" . $row['title'] . "" . $row['description'] . "</td> <td>" . $row['location']."</td> <td>" . $row['startdate']."</td> <td>" . $row['enddate']."</td> <td>" . $row['categorisation']."</td> <td>" . $row['tickets']."</td> <td>" . "</td><br /></tr>" ;  
      //$row['index'] the index here is a field name
}
   
    }

endif; 
?>       

</body>
</html>