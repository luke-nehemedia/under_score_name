<?php

require_once __DIR__.'/../custom/DateName.php';

// Output 1: Name with Year and Extension
$datename = new DateName(2014,'Ein beispielhafter Dateiname','jpEg');

echo $datename;

echo '<br /><br />';

// Output 2: Change Extension
$datename->setExtension('pNg');

echo $datename;

echo '<br /><br />';


// Output 3: Change Name
$datename->setFilename('a b c d e f g h i j k');

echo $datename;

echo '<br /><br />';

// Output 4: Add a replace for b
$datename->addReplace('b','');

echo $datename;

echo '<br /><br />';


// Output 5: Remove allow instead of adding a replace for b
$datename->removeReplace('b');
$datename->removeAllow('b');

echo $datename;

echo '<br /><br />';

?>