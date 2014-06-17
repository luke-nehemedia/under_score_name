<?php

require_once __DIR__.'/../custom/DateAuthorName.php';

// Output 1: Name with Year and Extension
$datename = new DateAuthorName(2014,'Luke','Ein beispielhafter Dateiname','jpEg');

echo $datename;

echo '<br /><br />';

// Output 2: Change Author
$datename->setAuthor('Dave');

echo $datename;

echo '<br /><br />';


// Output 3: Change Name
$datename->setFilename('A new example name in english.');

echo $datename;

echo '<br /><br />';

// Output 4: Change Year
$datename->setYear(2000);

echo $datename;

echo '<br /><br />';

?>