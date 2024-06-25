<?php
session_start();


include "check-login.php";
include "ShowClass.php";
$position = (int) $_GET["pos"];
include "database-connect.php";
$sql = "SELECT * FROM netflix_titles";
$result = $conn->query($sql);
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
    ["Sports Movies", "Sports TV Shows", "Sport", "Sports"],
    ["Action & Adventure", "TV Action & Adventure", "Action-Adventure", "Action", "Adventure"],
    ["International Movies", "International TV Shows"],
    ["Dramas", "TV Dramas", "Drama"],
    ["Mysteries", "TV Mysteries", "Mystery"],
    ["Crime Movies", "Crime TV Shows", "Crime"],
    ["Documentaries", "Docuseries", "Documentary", "Historical"],
    ["Children & Family Movies", "Children & Family TV Shows", "Family"],
    ["Horror Movies", "TV Horror", "Horror"],
    ["Romantic Movies", "Romantic TV Shows", "Romance"],
    ["Comedies", "TV Comedies", "Stand-Up Comedy", "Parody", "Stand-Up Comedy & Talk Shows", "Comedy"],
    ["Music & Musicals", "Musical", "Music", "Concert Film"],
    ["Sci-Fi & Fantasy", "TV Sci-Fi & Fantasy", "Fantasy", "Science Fiction"],
    ["Kids' TV", "Kids' Movies", "Kids"],
    ["Thrillers", "TV Thrillers", "Thriller"],
    ["Reality TV", "Reality"],
    ["Teen Movies", "Teen TV Shows", "Coming of Age", "Teen"],
    ["Anime Features", "Anime Series", "Anime"],
    ["Classic Movies", "Classic & Cult TV", "Classic"],
    ["Animation"],
    ["Superhero"]
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