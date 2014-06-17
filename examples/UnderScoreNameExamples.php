<?php

require_once __DIR__.'/../helpers/UnderScoreName.php';

// Output 1: Name with illegal characters
$datename = new UnderScoreName('Ein §%$beispielhafter $Dateiname','jpEg');

echo $datename;

echo '<br /><br />';

// Output 2: Change Extension
$datename->setExtension('pNg');

echo $datename;

echo '<br /><br />';


// Output 3: Change Name
$datename->setFilename('Dave is a common name.');

echo $datename;

echo '<br /><br />';

// Output 4: Add a replace for a
$datename->addReplace('a','o');

echo $datename;

echo '<br /><br />';


// Output 5: Remove allow instead of adding a replace for b
$datename->removeReplace('a');
$datename->removeAllow('a');

echo $datename;

echo '<br /><br />';

?>