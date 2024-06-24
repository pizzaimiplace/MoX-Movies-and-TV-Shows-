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
    $count = 12;
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
        $genres = trim($row["listed_in"]);
        $genresArray = explode(',', $genres);
        $genresArray = array_map('trim', $genresArray);
        foreach ($genreNumbers as $iter)
            if ($_GET["genre"][$iter] == "on")
                $ok = TRUE;
        for ($i = 0; $i < count($genresList); $i++) {
            if ($_GET["genre"][$i] == "on") {
                $ok = false;
                foreach ($genresList[$i] as $iter_1) {
                    foreach ($genresArray as $iter_2) {
                        if ($iter_1 == $iter_2)
                            $ok = TRUE;
                    }
                }
                if ($ok == FALSE)
                    continue 2;
            }
        }
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
    if ($show->posterPath == '../Images/NoPoster.png')
        continue;
    array_push($showsList, $show);
    $count--;
}
echo json_encode($showsList);
?>