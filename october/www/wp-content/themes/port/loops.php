<?php

for($var=0; $var < 10; $var++) {
    echo $var;
}


$array = array('dogs', 'cat', 'fish');

foreach ($array as $animal) {
    echo $animal;
}


foreach ($array as $number =>$animal) {
    echo $number.' '.$animal;
}

$var = 10;
while($var > 0) {

    echo $var;

    $var--;
}
