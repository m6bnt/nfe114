<?php
$long= $_GET['long'];
$lat= $_GET['lat'];
//C'est le POI de l'utilisateur hhh
echo "lat\tlon\ttitle\tdescription\ticon\ticonSize\ticonOffset\n";
echo "$lat\$long\tMoi\tMa Position\tluffy.png\t24,24\t0,-24\n";

//1° - Connexion à la BDD
$base = new PDO('mysql:host=localhost; dbname=id20205722_cnam', 'id20205722_mehdi', 'whV(U[WTF#ni1cY$');
$base->exec("SET CHARACTER SET utf8");

//2° - Préparation de requette et execution hhh
$retour = $base->query("SELECT *, get_distance_metres('$lat', '$long', equi_lat, equi_long) 
AS proximite 
FROM equipement 
HAVING proximite < 1000 ORDER BY proximite ASC
LIMIT 10;
");

//Boucle For
while ($data = $retour->fetch()){
echo $data['equi_lat']."\t".$data['equi_long']."\tMoi\tMa Position\tOl_icon_red_example.png\t24,24\t0,-24\n";
}

?>
