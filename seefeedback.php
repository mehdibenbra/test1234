
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
<head>
<title>Welcome</title>
</head>
<body>
<p>
    <a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a> | <a href=seefedback.php> See Past Events and Feedack </a>
    </p>
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