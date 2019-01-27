<?php 

setcookie("customerId", "1234", time() + 60 * 60 * 24); // 1 day

//setcookie("customerId", "", time() - 60 * 60); // unset/delete cookie

echo $_COOKIE["customerId"];

?>

<html>

    <head>

    </head>

    <body>

    </body>

</html>