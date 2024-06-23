<?php
session_start();

include "check-login.php";
include "ShowClass.php";
if (!isset($result)) {
  include "database-connect.php";
  $sql = "SELECT * FROM netflix_titles";
  $result = $conn->query($sql);
  $conn->close();
}
if (isset($_GET["count"])&&is_numeric($_GET["count"])) {
  $count = (int) $_GET["count"];
} else if (isset($count)){
  $count = 10;
}
if (!isset($shows)){
  $row = $result->fetch_assoc();
  $show = new Show($row["show_id"], $row["type"], $row["title"], $row["director"], $row["cast"], $row["country"], $row["date_added"], $row["release_year"], $row["rating"], $row["duration"], $row["listed_in"], $row["description"]);
  setPosterForShow($show, $apiKey);
  $showsList=array($show);
  $count--;
}
while($count>0&&($row = $result->fetch_assoc())){
  $show = new Show($row["show_id"], $row["type"], $row["title"], $row["director"], $row["cast"], $row["country"], $row["date_added"], $row["release_year"], $row["rating"], $row["duration"], $row["listed_in"], $row["description"]);
  setPosterForShow($show, $apiKey);
  array_push($showsList, $show);
  $count--;
}

header("Location: NetflixShows.php");
?>