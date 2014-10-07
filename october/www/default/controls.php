<?php

if( $var == 'awesome' ) {

} elseif( $var == 'awesomeer' ) {

} else {

}

switch($var) {
    case 'awesome';
        echo 'sweet';
        break;

    case 'awesomer';
        echo 'sweet yes';
        break;

    case 'dog':
    case 'cat':
        echo 'we ain\'t talkin animals here';
        break;

    default:
        echo 'dang';
        break;
}