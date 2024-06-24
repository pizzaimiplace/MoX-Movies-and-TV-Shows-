<?php
session_start();

include "check-login.php";
require_once '../vendor/autoload.php';
$apiKey = 'eb067dbf26479e4da1dd1432e7cf01f9';

class Show
{
  public $id;
  public $type;
  public $title;
  public $director;
  public $cast;
  public $country;
  public $date_added;
  public $release_year;
  public $rating;
  public $duration;
  public $listed_in;
  public $description;

  public function __construct($id, $type, $title, $director, $cast, $country, $date_added, $release_year, $rating, $duration, $listed_in, $description)
  {
    $this->id = $id;
    $this->type = $type !== null ? $type : "Unknown";
    $this->title = $title !== null ? $title : "Unknown";
    $this->director = $director !== null ? $director : "Unknown";
    $this->cast = $cast !== null ? $cast : "Unknown";
    $this->country = $country !== null ? $country : "Unknown";
    $this->date_added = $date_added !== null ? $date_added : "Unknown";
    $this->release_year = $release_year !== null ? $release_year : "Unknown";
    $this->rating = $rating !== null ? $rating : "Unknown";
    $this->duration = $duration !== null ? $duration : "Unknown";
    $this->listed_in = $listed_in !== null ? $listed_in : "Unknown";
    $this->description = $description !== null ? $description : "Unknown";
  }
}
function getRowById($result, $id = 1)
{
  while ($row = $result->fetch_assoc()) {
    if ($row['show_id'] == $id) {
      mysqli_data_seek($result, 0);
      return $row;
    }
  }
  mysqli_data_seek($result, 0);
  return NULL;
}
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

$sql = "SELECT * FROM disney_titles";
$result = $conn->query($sql);

$row = getRowByTitle($result, $_GET["title"]);
$show = new Show($row["show_id"], $row["type"], $row["title"], $row["director"], $row["cast"], $row["country"], $row["date_added"], $row["release_year"], $row["rating"], $row["duration"], $row["listed_in"], $row["description"]);

function getPosterByTitle($title, $apiKey)
{
  $client = new \GuzzleHttp\Client();
  $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie', [
    'query' => [
      'api_key' => $apiKey,
      'query' => $title,
    ],
    'headers' => [
      'accept' => 'application/json',
    ],
    'verify' => false,
  ]);

  $body = $response->getBody();
  $data = json_decode($body, true);

  if (isset($data['results']) && count($data['results']) > 0) {
    $movie = $data['results'][0];
    $posterPath = $movie['poster_path'];
    $fullPosterPath = 'https://image.tmdb.org/t/p/w500' . $posterPath;
    return $fullPosterPath;
  }
  return '../Images/NoPoster.png';
}
$posterUrl = getPosterByTitle($row["title"], $apiKey);

function getActorByName($name, $apiKey)
{
  $client = new \GuzzleHttp\Client();
  $response = $client->request('GET', 'https://api.themoviedb.org/3/search/person', [
    'query' => [
      'api_key' => $apiKey,
      'query' => $name,
    ],
    'headers' => [
      'accept' => 'application/json',
    ],
    'verify' => false,
  ]);

  $body = $response->getBody();
  $data = json_decode($body, true);

  if (isset($data['results']) && count($data['results']) > 0) {
    $actor = $data['results'][0];
    if (!empty($actor['profile_path'])) {
        $profilePath = $actor['profile_path'];
        $fullActorPath = 'https://image.tmdb.org/t/p/w500' . $profilePath;
        return $fullActorPath;
    }
  }
  return '../Images/NoPerson.png';
}

function getCastArray($cast)
{
  $cast = trim($cast);

  $castArray = explode(',', $cast);

  $castArray = array_map('trim', $castArray);

  return $castArray;
}
$castArray = getCastArray($row["cast"]);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>MoX</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="disney-show.css">
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
    <p>Disney+ Shows</p>
  </header>
  <div class="wrapper">
    <div class="background-wrapper-netflix">
      <img src="../Images/disney.jpg" alt="disney">
    </div>
    <div class="pages-buttons">
      <ul class="button-list">
        <li class="page-button"><a href="Netflix.php">Netflix</a></li>
        <li class="page-button"><a href="Disney.php">Disney</a></li>
        <li class="page-button"><a href="About.php">About</a></li>
        <li class="page-button"><a href="Help.php">Help</a></li>
      </ul>
    </div>
    <div class="netflix-shows-wrapper">
      <div class="netflix-shows">
        <div class="n-show">
          <p style="margin-top: 10px"><?php echo htmlspecialchars($show->type); ?></p>
          <div class="show-card">
            <img src="<?php echo $posterUrl; ?>" />
          </div>
          <p style="font-size: x-large"><?php echo htmlspecialchars($show->title); ?></p>
        </div>
        <div class="n-info">
          <p><?php echo htmlspecialchars($show->duration); ?></p>
          <p><?php echo htmlspecialchars($show->listed_in); ?></p>
          <p>Rating: <?php echo htmlspecialchars($show->rating); ?></p>
          <p>Release Year: <?php echo htmlspecialchars($show->release_year); ?></p>
        </div>
        <div class="n-description">
          <p><i><?php echo htmlspecialchars($show->description); ?></i></p>
        </div>
      </div>
      <div class="n-director-wrapper">
          <p>Director:</p>
          <div class="n-director">
            <img src="<?php echo getActorByName($show->director, $apiKey); ?>"
              alt="<?php echo htmlspecialchars($show->director); ?>">
            <p><?php echo htmlspecialchars($show->director); ?></p>
          </div>
        </div>
        <div class="n-cast-wrapper">
          <p>Cast:</p>
          <div class="n-cast">
            <?php foreach ($castArray as $castMember): ?>
              <div class="cast-member">
                <img src="<?php echo getActorByName($castMember, $apiKey); ?>"
                  alt="<?php echo htmlspecialchars($castMember); ?>">
                <p><?php echo htmlspecialchars($castMember); ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="n-bonus-info">
          <p>Country of production: <?php if ($show->country != null) {
            echo htmlspecialchars($show->country);
          } else {
            echo "N/A";
          } ?></p>
          <p>Date Added: <?php if ($show->date_added) {
            echo htmlspecialchars($show->date_added);
          } else {
            echo "N/A";
          }
          ?></p>
        </div>
    </div>
  </div>
</body>

</html>