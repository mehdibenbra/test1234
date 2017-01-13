<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "user-registration";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `events`";

// for method 1

$result1 = mysqli_query($connect, $query);

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <!--Method One-->
 <form action="" method="POST">
        <select name="eventlist">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
            

        </select>
    
       <input type="submit" value="go" name="submit"> 
  
<?php     
if(isset($_POST["submit"]))
{
    
$event=$_POST['eventlist'];
echo "$event";
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('user-registration') or die("cannot select DB");
$query2=mysql_query("UPDATE events SET tickets= tickets-1 WHERE id='$event'");
mysql_close();

}
?>

</form>

    </body>

</html>
