<?php
include "../get-statistics-netflix.php";
$genres = array(
  "Sports",
  "Action-Adventure",
  "International",
  "Drama",
  "Mystery",
  "Crime",
  "Documentary",
  "Family",
  "Horror",
  "Romance",
  "Comedy",
  "Musical",
  "Sci-Fi & Fantasy",
  "Kids",
  "Thriller",
  "Reality",
  "Teen",
  "Anime",
  "Classic",
  "Animation",
  "Superhero"
);

ob_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=netflix_genres.csv');
$header_args = array( 'ID', 'Name', 'Amount' );
$data=[];
for ($i=0;$i<count($genres);$i++) {
    $data[$i][0] = $i;
    $data[$i][1] = $genres[$i];
    $data[$i][2] = $netflixStatistics['genres'][$i];
}
ob_end_clean();
$output = fopen( 'php://output', 'w' );
fputcsv( $output, $header_args );
foreach( $data as $data_item ){
  fputcsv( $output, $data_item );
}
fclose( $output );
exit;
?>