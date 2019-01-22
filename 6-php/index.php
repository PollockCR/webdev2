<?php

$myArray = array("Dog", "Cat", "Turtle", "Gerbil");

$myArray[] = "Platypus";

print_r($myArray);

echo $myArray[1]."<br>";

$languages = array(
    "France" => "French",
    "Germany" => "German",
    "England" => "English"
);

unset($languages["France"]);

print_r($languages);
    
echo sizeof($languages);

?>