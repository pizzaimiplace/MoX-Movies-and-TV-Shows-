<?php

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
  public $posterPath;

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
function setPosterForShow(&$show, $apiKey)
{
  $client = new \GuzzleHttp\Client();
  $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie', [
    'query' => [
      'api_key' => $apiKey,
      'query' => $show->title,
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
    if(!empty($movie['poster_path'])){
      $posterPath = $movie['poster_path'];
      $fullPosterPath = 'https://image.tmdb.org/t/p/w500' . $posterPath;
      $show->posterPath = $fullPosterPath;
    }
    else{
      $show->posterPath =  '../Images/NoPoster.png';
    }
  }
  else{
    $show->posterPath =  '../Images/NoPoster.png';
  }
}
?>