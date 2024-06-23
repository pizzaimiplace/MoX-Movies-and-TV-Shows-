<?php
session_start();

function getNextCount()
{
    if (isset($_GET["count"]) && is_numeric($_GET["count"])) {
        echo (string)((int) $_GET["count"] + 10);
    } else {
        echo "20";
    }
}

include "check-login.php";
include "ShowClass.php";
if (!isset($result)) {
    include "database-connect.php";
    $sql = "SELECT * FROM netflix_titles";
    $result = $conn->query($sql);
    $conn->close();
}
if (isset($_GET["count"]) && is_numeric($_GET["count"])) {
    $count = (int) $_GET["count"];
} else {
    $count = 10;
}
$showsList = [];
while ($count > 0 && ($row = $result->fetch_assoc())) {
    $show = new Show($row["show_id"], $row["type"], $row["title"], $row["director"], $row["cast"], $row["country"], $row["date_added"], $row["release_year"], $row["rating"], $row["duration"], $row["listed_in"], $row["description"]);
    setPosterForShow($show, $apiKey);
    array_push($showsList, $show);
    $count--;
}

var_dump($showsList);
?>
<html>
<form action="NetflixShows.php" method="GET">
    <input id="clickMe" type="submit" value="clickme">
    <input type="number" value="<?php getNextCount(); ?>" id="count" name="count" hidden>
</form>

</html>