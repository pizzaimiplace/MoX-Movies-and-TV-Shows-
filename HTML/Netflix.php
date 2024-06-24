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

//var_dump($showsList);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MoX</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="netflix.css">
    </head>
    <body>
        <header>
            <img class="logo" src="../Images/logo.png" alt="MoX Logo">
            <div class="pages-buttons-header">
                <ul class="button-list">
                    <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                    <li class="page-button"><a href="Disney.php">Disney</a></li>
                    <li class="page-button"><a href="About.php">About</a></li>
                    <li class="page-button"><a href="Help.php">Help</a></li>
                </ul>
            </div>
            <p>Netflix Shows</p>
        </header>
        <div class="wrapper">
            <div class="background-wrapper-netflix">
                <img src="../Images/netflix.jpg" alt="Netflix">
            </div>
            <div class="pages-buttons">
                <ul class="button-list">
                    <li class="page-button"><a href="Netflix.php">Netflix</a></li>
                    <li class="page-button"><a href="Disney.php">Disney</a></li>
                    <li class="page-button"><a href="About.php">About</a></li>
                    <li class="page-button"><a href="Help.php">Help</a></li>
                </ul>
            </div>
            <div class="search-wrapper">
                <div class="search-filters">
                    <img src="../Images/3lines.png" alt="Filters">
                </div>
                <div class="search-container">
                    <input type="text" placeholder="Search..." class="search-input">
                    <button class="search-button">Go</button>
                </div>
            </div>
            <div class="netflix-shows">
                <?php foreach ($showsList as $show): ?>
                    <div class="show-card">
                        <a href="netflix-show.php?title=<?php echo urlencode($show->title); ?>">
                            <img src="<?php echo $show->posterPath; ?>" alt="BCS">
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="show-more">
                <form action="Netflix.php" method="GET">
                    <input id="clickMe" type="submit" value="See more shows" class="show-more-input">
                    <input type="number" value="<?php getNextCount(); ?>" id="count" name="count" hidden>
                </form>
            </div>
        </div>
    </body>
</html>