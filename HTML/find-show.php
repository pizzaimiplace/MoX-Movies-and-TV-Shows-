<?php
session_start();

include "check-login.php";

function getRowByTitle($result, $title)
{
  $title = strtolower($title);
  while ($row = $result->fetch_assoc()) {
    if (str_contains(strtolower($row["title"]), $title)) {
      mysqli_data_seek($result, 0);
      return $row;
    }
  }
  mysqli_data_seek($result, 0);
  return NULL;
}

include "database-connect.php";

$sql = "SELECT title FROM netflix_titles";
$result = $conn->query($sql);
$row=getRowByTitle($result,$_GET['title']);
if($row!=null){
  $title=$row["title"];
  header("Location: netflix-show.php?title=".$title);
  exit();
}
$sql = "SELECT title FROM disney_titles";
$result = $conn->query($sql);
$row=getRowByTitle($result,$_GET['title']);
if($row!=null){
  $title=$row["title"];
  header("Location: disney-show.php?title=".$title);
  exit();
}
header("Location: Home.php?error=movie-not-in-database");
$conn->close();
?>