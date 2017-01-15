
<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);



$query = "SELECT * FROM events WHERE startdate<NOW()"; //You don't need a ; like you do in SQL
$result = mysqli_query($connect,$query);



session_start();
 $id = $_SESSION['sess_id'];
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<head>
<title> Give Feedback </title>
</head>
<body>

<h2>My Event Website</h2>                 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="createEvent.php">Create Event</a></li>
    <li class="active"><a href="myevents.php">Events I created</a></li>
    <li><a href="allevents.php">All events</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li><a href="browsebydate.php">Browse (date)</a></li>
    <li> <a href="ticket.php"> Book ticket </a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li class="active"><a href="seefeedback.php">See feedback</a></li>
    <li> <a href="host.php"> Hosted events and Guest List </a></li>
    <li> <a href="joinedevents.php"> Events I attend </a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
     <h4> Welcome, <?=$_SESSION['sess_id'];?> </h4>
    
     <form action="" method="POST">
 <select name='choice'>
              <?php while($row = mysqli_fetch_array($result)):;?>

           <option 
            value="<?php echo $row[0];?>"> 

            <?php echo $row[1];?>
            </option>

            <?php endwhile;?>
     
    </select>
    <input type="submit" name="submit" value="submit">
    </form>

    
</body>  
</html>
<?php  

if(isset($_POST["submit"])) {
    
    $choice=$_POST['choice'];

 

$query2 = "SELECT * FROM ticket WHERE eventid = '$choice' " ;

$resultx = mysqli_query($connect,$query2);


while($row1=mysqli_fetch_array($resultx)){

$userid=$row1['memberidattending'];
$grade=$row1['usergrade'];
$comment=$row1['usercomment'];

echo "Grade: ". $grade." Comment: ".$comment. " From: ";
    

$query56 = "SELECT * FROM members WHERE id = '$userid' " ;
    
$resultx2 = mysqli_query($connect,$query56);

    while($row2=mysqli_fetch_array($resultx2)){
        
         $userFName=$row2['fname'];
        $userLName=$row2['lname'];
        $username=$row2['username'];
        
        echo "$userFName"."<br />";
    }
       

/*else if (is_null(($row['usergrade']),$row['usercomment']))
{
echo "No feedback";    
}
*/
    
}


    
    
}

?>       