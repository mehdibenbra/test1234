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
    <li><a href="#">Home</a></li>
    <li><a href="#">My events</a></li>
    <li><a href="#">All events</a></li>
    <li><a href="#">Create an event</a></li>
    <li><a href="browsebycategory.php">Browse (category)</a></li>
    <li class="active"><a href="browseByDate.php">Browse (date)</a></li>
    <li><a href="feedback.php">Give feedback</a></li> 
    <li><a href="seefeedback.php">See feedback</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>

<h3>Browse events within the dates you wish</h3>
<form action="resultByDate.php" method="POST">
Start Date: <input type="date" name="date1"><br />
End Date: <input type="date" name="date2"><br />
<input type="submit" value="View events" name="submitDate" />
</form>
</body>
</html>