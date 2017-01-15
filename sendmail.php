<?php 
$connection = mysql_connect('localhost', 'root', 'root'); //The Blank string is the password
mysql_select_db('userr');
session_start();
$id = $_SESSION['sess_id'];
$query1="SELECT * FROM `events` WHERE startdate = CURDATE() - INTERVAL 2 DAY";
$result1 = mysql_query($query1) or die(mysql_error()."[".$query1."]");
while($row=mysql_fetch_array($result1))
{
 $title=$row['title'];
 $event=$row['id'];//get the id of the event
 $query2="SELECT * FROM `ticket` WHERE eventid=$event";
   $result2=mysql_query($query2) or die(mysql_error()."[".$query2."]");
    while($rowx=mysql_fetch_array($result2))
    {
                
                $userattending=$rowx['memberidattending']; //get the id of the user attending the event
                $query3="SELECT * FROM members where id='$userattending'"; //select the info of the members attending the event in 2 days
                $result3 = mysql_query($query3) or die(mysql_error()."[".$query3."]");
        
                            while($rowk=mysql_fetch_array($result3))
                            {
                            $email=$rowk['email']; //get their email
                            $to = $email;
                            $subject = "E-mail subject";
                            $body = "The event you booked: ". $title.  " is in two days ";
                            $headers = 'From: automaticeventshm@gmail.com' . "\r\n" ;
                            $headers .= 'Reply-To: info@mydomain.com' . "\r\n";
                            mail($to, $subject, $body, $headers); //send them the email
                            }
    }
}
?>
<html>
<body>
</body>
</html>