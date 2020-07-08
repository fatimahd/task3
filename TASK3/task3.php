

<?php


// Create connection
$host='localhost';
$user ='root';
$password ='root';
$database ='design';
$connect= mysqli_connect($host,$user,$password,$database);

if(mysqli_connect_errno()){

die("cant connect with database". mysqli_connect_error());
}
else{
echo"database is conected";}

?>


<!DOCTYPE html>
<html>
<head>
  <title> Control Panel</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="task3.css">

</head>
<body class="body">
  <header class="header1">
    <h1> Map Setting</h1>
  </header>

  <div id="task" class="sidenav">
    <form id="for">
    <label for="fname">Forntwords</label>
      <input type="text" id="a1" name="Forntwords" value=""><br>

      <label for="lname">Right</label>
      <input type="text" id="a2" name="Right" value=""><br>

      <label for="lname">Left</label>
      <input type="text" id="a3" name="Left" value=""><br>

      <input type="submit" value="STOP">
      <input type="submit" value="Save">
      <input type="submit" value="Start">
    </form>

</div>

<?php
//START
if(isset($_POST['rightt'])) {
  $rightv=$_POST['right'];
  $forv=$_POST['forwards'];
  $leftv=$_POST['left'];
  for ($x = 1; $x <= $rightv; $x++) {
  echo "&rarr;";
}
echo"</br>";
  for ($x = 1; $x <= $forv; $x++) {
  echo "&uarr; </br>";
}


  for ($x = 1; $x <= $leftv; $x++) {
  echo "&larr;";
}}

?>

<?php
//SAVE
if(isset($_POST['save'])) {
  $rv=$_POST['right'];
  $fv=$_POST['forwards'];
  $lv=$_POST['left'];

  $query = "INSERT INTO dcp ( forwards, leftt, rightt) VALUES
     ('" .$fv. "','" .$lv."','" .$rv."')";
       $result = mysqli_query($connect,$query);


       if(!$result)
    {
        die (" error on qurey");
    }
    else
    {

        die ("Records added successfully.");
    }
    }


//view in table

$query = "SELECT * FROM dcp ";
$result = mysqli_query($connect,$query);
 if(!$result)
    {
        die (" error on qurey");
    }


echo "<table border='1'>
<tr>
<th>right</th>
<th>forwards</th>
<th>left</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['rightt'] . "</td>";
echo "<td>" . $row['forwards'] . "</td>";
echo "<td>" . $row['leftt'] . "</td>";

echo "</tr>";
}
echo "</table>";
?>


<?php
mysqli_free_result($result);

?>


<?php
//DELETE
if(isset($_POST['delete'])) {
$query = "DELETE FROM dcp WHERE ID=(SELECT MAX(id) FROM dcp) ";
$result = mysqli_query($connect,$query);
 if(!$result)
    {
        die (" error on qurey delete ");
    }
//delete view
}

?>

</body>
</html>

<?php

mysqli_close($connect);
?>
