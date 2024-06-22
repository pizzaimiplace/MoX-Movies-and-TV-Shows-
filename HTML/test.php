<?php
require_once '../vendor/autoload.php';
$apiKey = 'eb067dbf26479e4da1dd1432e7cf01f9';

class Show {
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

  public function __construct($id, $type, $title, $director, $cast, $country, $date_added, $release_year, $rating, $duration, $listed_in, $description) {
    $this->id=$id;
    $this->type=$type;
    $this->title=$title;
    $this->director=$director;
    $this->cast=$cast;
    $this->country=$country;
    $this->date_added=$date_added;
    $this->release_year=$release_year;
    $this->rating=$rating;
    $this->duration=$duration;
    $this->listed_in=$listed_in;
    $this->description=$description;
  }
}
function getRowById ( $result, $id=1 )
{
    while($row = $result->fetch_assoc()) {
        if ( $row['show_id'] == $id ) {
            mysqli_data_seek( $result, 0 );
            return $row;
        }
    }
}
function getRowByTitle ( $result, $title )
{
    $title=strtolower($title);
    while($row = $result->fetch_assoc()) {
        if ( str_contains(strtolower($row["title"]),$title)) {
            mysqli_data_seek( $result, 0 );
            return $row;
        }
    }
    return NULL;
}

$servername = "localhost";
$username = "root";
$password = "1000";
$dbname = "mox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM netflix_titles";
$result = $conn->query($sql);

// output data of each row
/*while($row = $result->fetch_assoc()) {
  echo "id: " . $row["show_id"]. " - title: " . $row["title"]. "<br>";
}*/
//$row = getRowById($result, $_GET['show_id']);
$row = getRowByTitle($result, $_GET["title"]);
$show=new Show($row["show_id"],$row["type"],$row["title"],$row["director"],$row["cast"],$row["country"],$row["date_added"],$row["release_year"],$row["rating"],$row["duration"],$row["listed_in"],$row["description"]);
var_dump($show);
function getPosterByTitle($title, $apiKey){
  $client = new \GuzzleHttp\Client();
  $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie', [
      'query' => [
          'api_key' => $apiKey,
          'query' => $title,
      ],
      'headers' => [
          'accept' => 'application/json',
      ],
      'verify'=>false,
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

$conn->close();
?>
<img src="<?php echo $posterUrl; ?>" />