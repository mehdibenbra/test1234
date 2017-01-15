<?php 

$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "userr";

$connect = mysqli_connect($hostname, $username, $password, $databaseName); 

session_start();
$id = $_SESSION['sess_id'];

$query1="SELECT * FROM `events` WHERE startdate = CURDATE() + INTERVAL 2 DAY";
$result1 = mysqli_query($connect,$query1) ;


//$query= "SELECT * FROM events WHERE title='".$title."'";
   // $result = mysqli_query($connect, $query);


while($row=mysqli_fetch_array($result1))
{
 $title=$row['title'];
 $event=$row['id'];//get the id of the event
 $query2="SELECT * FROM `ticket` WHERE eventid=$event";
    
   $result2=mysqli_query($connect,$query2);
   
    while($rowx=mysqli_fetch_array($result2))
    {
                
                $userattending=$rowx['memberidattending']; //get the id of the user attending the event
                $query3="SELECT * FROM members where id='$userattending'"; //select the info of the members attending the event in 2 days
                $result3 = mysqli_query($connect,$query3) ;
       
                            while($rowk=mysqli_fetch_array($result3))
                            {
                            $email=$rowk['email']; //get their email
                            $to = $email;
                            $subject = "E-mail subject";
                            $body = "The event you booked: ". $title.  " is in two days ";
                            $headers = 'From: automaticeventshm@gmail.com' . "\r\n" ;
                            $headers .= 'Reply-To: info@mydomain.com' . "\r\n";
                            mail($to, $subject, $body, $headers); //send them the email
                                
                                if ($result3){
                                    echo "Email successfully sent!";
                                }
                            }
  
    }
}

?>
<html>
<body>
</body>
</html>