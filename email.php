<?php

$to="Kuldeep10raghav@gmail.com";
$subject="text mail";
$message="hello , you have logged in";
$from="kuldeep@studiographene.com";
$header="from:$from";
mail($to,$subject,$message,$header);
?>