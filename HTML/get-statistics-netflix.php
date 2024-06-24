<?php
session_start();
include "check-login.php";
include "database-connect.php";
$sql = "SELECT * FROM netflix_titles";
$result = $conn->query($sql);
$conn->close();
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
$ratingsStatistics = array_fill(0, count($ratingsList), 0);
$genresStatistics = array_fill(0, count($genresList), 0);
$typeStatistics = array_fill(0, count($showTypes), 0);
while ($row = $result->fetch_assoc()) {
  for ($i = 0; $i < count($ratingsList); $i++) {
    foreach ($ratingsList[$i] as $rating) {
      if ($rating == $row["rating"])
        $ratingStatistics[$i]++;
    }
  }
  $genres = trim($row["listed_in"]);
  $genresArray = explode(',', $genres);
  $genresArray = array_map('trim', $genresArray);
  foreach ($genreNumbers as $iter)
    if ($_GET["genre"][$iter] == "on")
      $ok = TRUE;
  for ($i = 0; $i < count($genresList); $i++) {
    $ok = false;
    foreach ($genresList[$i] as $iter_1) {
      foreach ($genresArray as $iter_2) {
        if ($iter_1 == $iter_2)
          $ok = TRUE;
      }
    }
    if ($ok == TRUE)
      $genresStatistics[$i]++;
  }
  for ($i = 0; $i < count($showTypes); $i++) {
    if ($showTypes[$i] == $row["type"])
      $typeStatistics[$i]++;
  }
}
$netflixStatistics = [];
$netflixStatistics["rating"]=$ratingsStatistics;
$netflixStatistics["genres"]=$genresStatistics;
$netflixStatistics["type"]=$typeStatistics;
?>