<?php
// Obtenir la mémoire utilisée au début du script
$memoryStart = memory_get_usage();

// Créer un grand tableau pour consommer de la mémoire
$largeArray = array_fill(0, 1000000, "some data");

// Obtenir la mémoire utilisée à la fin du script
$memoryEnd = memory_get_usage();

// Calculer la différence de mémoire utilisée
$memoryUsed = $memoryEnd - $memoryStart;

// Afficher la mémoire utilisée
echo "Mémoire utilisée : " . ($memoryUsed / 1024 / 1024) . " Mo\n";
?>
