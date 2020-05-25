<?php
$json = file_get_contents('https://jeromepaulos.com/bhsjacket/coronavirus/data.php?data=alameda');
$data = json_decode($json, true);
$data = array_reverse($data);
$data = $data[0]['attributes'];

echo '<pre>';
print_r($data);
echo '</pre>';