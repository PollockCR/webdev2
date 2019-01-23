<?php

for ($i = 0; $i < 5; $i++){

    echo $i."<br>";

}

$animals = array("Cat", "Dog", "Mouse", "Turtle", "Gerbil");

foreach ($animals as $key => $value){
    
    echo "The animal at index ".$key." is ".$value."<br>";
    
}

?>