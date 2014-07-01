<?php
/*  Copyright 2012  Daelan Wood  (email : daelan@daelan.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//require_once('/vagrant/www/wp-blog-header.php');
define('MIGRATING', true);
require_once('/vagrant/www/wp-config.php');


$message = "";
$errors = "";

$prefix = $table_prefix;
$oldUrl = 'http://foley.webpagefxstage.com';
$newUrl = 'http://localhost:8888';

$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $db);


if(empty($oldUrl)){

$errors .= "Please enter your old URL.\n";

}

if(empty($newUrl)){

$errors .= "Please enter your new URL.\n";

}

if(empty($prefix)){

$errors .= "Please enter a table prefix. If you are unsure it's probably <strong>wp_</strong>\n";

}

if(empty($errors)){

/* -- Update Siteurl & Homeurl -- */

$query1 = "UPDATE ".$prefix."options SET option_value = replace(option_value, '".$oldUrl."', '".$newUrl."') WHERE option_name = 'home' OR option_name = 'siteurl'";

$result1 = mysql_query($query1, $db);

if (!$result1) {
    die('Invalid query: ' . mysql_error());
}else{

$numResults1 = mysql_affected_rows();

if ($numResults1 > 0) {



$message .= "Siteurl & Homeurl Successfully Updated!\n";

}

}


/* -- Update GUID -- */


$query2 = "UPDATE ".$prefix."posts SET guid = REPLACE (guid, '".$oldUrl."', '".$newUrl."')";


$result2 = mysql_query($query2, $db);

if (!$result2) {
    die('Invalid query: ' . mysql_error());
}else{

$numResults2 = mysql_affected_rows();

if ($numResults2 > 0) {


$message .= "GUID Successfully Updated!\n";

}

}

/* -- Update URL in Content -- */


$query3 = "UPDATE ".$prefix."posts SET post_content = REPLACE (post_content, '".$oldUrl."', '".$newUrl."')";


$result3 = mysql_query($query3, $db);

if (!$result3) {
    die('Invalid query: ' . mysql_error());
}else{

    $numResults3 = mysql_affected_rows();

if ($numResults3 > 0) {


$message .= "URL in content Successfully Updated!\n";



}

}


    /* -- Update URL in Meta Values -- */


$query4 = "UPDATE ".$prefix."postmeta SET meta_value = REPLACE (meta_value, '".$oldUrl."', '".$newUrl."')";


$result4 = mysql_query($query4, $db);

if (!$result4) {
    die('Invalid query: ' . mysql_error());
}else{

    $numResults4 = mysql_affected_rows();

if ($numResults4 > 0) {


$message .= "URL in Post Meta Table Successfully Updated!\n";


}

}


}else{

$message = $errors;

}



if(isset($message)){


echo $message;

}


