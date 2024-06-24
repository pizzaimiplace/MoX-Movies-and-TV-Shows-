<?php
include "../get-statistics-disney.php";
$types = array(
  "Movie",
  "TV Show"
);

ob_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=disney_types.csv');
$header_args = array( 'ID', 'Name', 'Amount' );
$data=[];
for ($i=0;$i<count($types);$i++) {
    $data[$i][0] = $i;
    $data[$i][1] = $types[$i];
    $data[$i][2] = $disneyStatistics['type'][$i];
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