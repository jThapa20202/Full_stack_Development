<?php
$data = json_decode(file_get_contents("products.json"), true);

foreach ($data as $p) {
    echo $p['name']." - Rs ".$p['price']."<br>";
}
?>
  