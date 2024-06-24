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
                if (str_contains($row["listed_in"],$genre))
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


//var_dump($showsList);
?>
<html>
<form action="NetflixShows.php" method="GET">
    <input id="clickMe" type="submit" value="clickme">
    <input type="number" value="<?php getNextCount(); ?>" id="count" name="count" hidden>
    <br>
    <input id="rating-pg13" type="checkbox" name="rating[0]">PG-13</input>
    <input id="rating-pg" type="checkbox" name="rating[1]">
    <input id="rating-ma" type="checkbox" name="rating[2]">
    <input id="rating-tv14" type="checkbox" name="rating[3]">
    <input id="rating-tvy" type="checkbox" name="rating[4]">
    <input id="rating-tvy7" type="checkbox" name="rating[5]">
    <input id="rating-g" type="checkbox" name="rating[6]">
    <br>
    <input id="genre-sports" type="checkbox" name="genre[0]">
    <input id="genre-action-adventure" type="checkbox" name="genre[1]">
    <input id="genre-international" type="checkbox" name="genre[2]">
    <input id="genre-drama" type="checkbox" name="genre[3]">
    <input id="genre-mistery" type="checkbox" name="genre[4]">
    <input id="genre-crime" type="checkbox" name="genre[5]">
    <input id="genre-documentary" type="checkbox" name="genre[6]">
    <input id="genre-children-family" type="checkbox" name="genre[7]">
    <input id="genre-horror" type="checkbox" name="genre[8]">
    <input id="genre-romance" type="checkbox" name="genre[9]">
    <input id="genre-comedy" type="checkbox" name="genre[10]">
    <input id="genre-music" type="checkbox" name="genre[11]">
    <input id="genre-scifi-fantasy" type="checkbox" name="genre[12]">
    <input id="genre-kids" type="checkbox" name="genre[13]">
    <input id="genre-thriller" type="checkbox" name="genre[14]">
    <input id="genre-reality" type="checkbox" name="genre[15]">
    <input id="genre-teen" type="checkbox" name="genre[16]">
    <input id="genre-anime" type="checkbox" name="genre[17]">
    <input id="genre-classic" type="checkbox" name="genre[18]">
    <br>
    <input id="type-movie" type="checkbox" name="type[0]">
    <input id="type-tv" type="checkbox" name="type[1]">
</form>

</html>