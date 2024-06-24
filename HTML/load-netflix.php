<?php
session_start();


include "check-login.php";
include "ShowClass.php";
$position = (int) $_GET["pos"];
include "database-connect.php";
$sql = "SELECT * FROM netflix_titles";
$result = $conn->query($sql);
//if ($position > mysqli_num_rows($result))
//    exit();
mysqli_data_seek($result, $position);
$conn->close();
if (isset($_GET["count"]) && is_numeric($_GET["count"])) {
    $count = (int) $_GET["count"];
} else {
    $count = 20;
}
$showsList = [];
while ($count > 0 && ($row = $result->fetch_assoc())) {
    $show = new Show($row["show_id"], $row["type"], $row["title"], $row["director"], $row["cast"], $row["country"], $row["date_added"], $row["release_year"], $row["rating"], $row["duration"], $row["listed_in"], $row["description"]);
    setPosterForShow($show, $apiKey);
    if ($show->posterPath == '../Images/NoPoster.png')
        continue;
    array_push($showsList, $show);
    $count--;
}

echo json_encode($showsList);
?>