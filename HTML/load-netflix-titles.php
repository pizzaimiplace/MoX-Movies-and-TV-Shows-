<?php
session_start();

function getNextCount()
{
    if (isset($_GET["count"]) && is_numeric($_GET["count"])) {
        echo (string) ((int) $_GET["count"]);
    } else {
        echo "20";
    }
}

$ratingsList = array(
    ["PG-13"],
    ["PG", "TV-PG"],
    ["TV-MA", "R"],
    ["TV-14"],
    ["TV-Y"],
    ["TV-Y7"],
    ["TV-G", "G"]
);
$genresList = array(
    ["Sports Movies", "Sports TV Shows"],
    ["Action & Adventure", "TV Action & Adventure"],
    ["International Movies", "International TV Shows"],
    ["Dramas", "TV Dramas"],
    ["Mysteries", "TV Mysteries"],
    ["Crime Movies", "Crime TV Shows"],
    ["Documentaries", "Docuseries"],
    ["Children & Family Movies", "Children & Family TV Shows"],
    ["Horror Movies", "TV Horror"],
    ["Romantic Movies", "Romantic TV Shows"],
    ["Comedies", "TV Comedies", "Stand-Up Comedy", "Stand-Up Comedy & Talk Shows"],
    ["Music & Musicals"],
    ["Sci-Fi & Fantasy", "TV Sci-Fi & Fantasy"],
    ["Kids' TV", "Kids' Movies"],
    ["Thrillers", "TV Thrillers"],
    ["Reality TV"],
    ["Teen Movies", "Teen TV Shows"],
    ["Anime Features", "Anime Series"],
    ["Classic Movies", "Classic & Cult TV"]
);
$showTypes = array(
    "Movie",
    "TV Show"
);
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
    if (isset($_GET["rating"])) {
        $ratingNumber;
        for ($i = 0; $i < count($ratingsList); $i++) {
            foreach ($ratingsList[$i] as $rating) {
                if ($rating == $row["rating"])
                    $ratingNumber = strval($i);
            }
        }
        if ($_GET["rating"][$ratingNumber] != "on")
            continue;
    }
    if (isset($_GET["genre"])) {
        $genreNumbers = [];
        for ($i = 0; $i < count($genresList); $i++) {
            foreach ($genresList[$i] as $genre) {
                if (str_contains($row["listed_in"], $genre))
                    array_push($genreNumbers, strval($i));
            }
        }
        $ok == FALSE;
        foreach ($genreNumbers as $iter)
            if ($_GET["genre"][$iter] == "on")
                $ok = TRUE;
        if ($ok == FALSE)
            continue;
    }
    if (isset($_GET["type"])) {
        $showTypeNumber;
        for ($i = 0; $i < count($showTypes); $i++) {
            if ($showTypes[$i] == $row["type"])
                $showTypeNumber = strval($i);
        }
        if ($_GET["type"][$showTypeNumber] != "on")
            continue;
    }
    $show = new Show($row["show_id"], $row["type"], $row["title"], $row["director"], $row["cast"], $row["country"], $row["date_added"], $row["release_year"], $row["rating"], $row["duration"], $row["listed_in"], $row["description"]);
    setPosterForShow($show, $apiKey);
    array_push($showsList, $show);
    $count--;
}


var_dump($showsList);
?>

<?php
/*session_start();

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

var_dump($showsList);*/
?>