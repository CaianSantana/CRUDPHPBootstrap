<?php
session_start();
include('DBConn.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>list of Persons</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
  <div class="container text-center">
  <div class="row row-cols-3">
    <div class="col">ID</div>
    <div class="col">Name</div>
    <div class="col">FName</div>
    <?php
    $db = DBConn::getInstance();
    foreach($db->selectAll("pessoas") as $person){
        echo "<div class=\"col\">".$person['id']."</div>";
        echo "<div class=\"col\">".$person['name']."</div>";
        echo "<div class=\"col\">".$person['fname']."</div>";
    }
    echo "</div>";
  ?>
  </div>
</div>
  </body>
</html>

