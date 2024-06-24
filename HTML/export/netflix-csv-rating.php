<?php
include "../get-statistics-netflix.php";

$ratings = array(
  "PG-13",
  "PG",
  "R",
  "TV-14",
  "TV-Y",
  "TV-Y7",
  "G"
);
ob_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=netflix_ratings.csv');
$header_args = array( 'ID', 'Name', 'Amount' );
$data=[];
for ($i=0;$i<count($ratings);$i++) {
    $data[$i][0] = $i;
    $data[$i][1] = $ratings[$i];
    $amount=$netflixStatistics['rating'];
    $data[$i][2] = $amount[$i];
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