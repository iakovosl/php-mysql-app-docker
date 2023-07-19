<?php
    ini_set('opcache. enable', '0');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Example</title>
    <style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>
<?php
//phpinfo();
$link = mysqli_connect("mysql", "myuser", "mypassword", "mydatabase");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
// Output: Success: A proper connection to MySQL was made! 
$sql = "select * from movies";
$query = mysqli_query($link, $sql);
?>
<table style="width:100%">
  <tr>
    <th>Title</th>
    <th>Genre</th>
    <th>Release Year</th>
  </tr>
  <?php

while ($row = mysqli_fetch_array($query)) {
    ?>
    <table style="width:100%">
  <tr>
    <td><?php echo$row["title"]?></td>
    <td><?php echo$row["genre"]?></td>
    <td><?php echo$row["release_year"]?></td>
  </tr>

</table>

<?
   // echo "title: " . $row["title"]. " - Genre: " . $row["genre"]. " " . $row["release_year"]. "<br>";
  

}
mysqli_close($link);
?>
</body>
</html>