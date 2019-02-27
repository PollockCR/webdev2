<?php 

session_start();

?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Hello world!</h1>

        <?php
        if(isset($_SESSION["id"])){ 

            echo $_SESSION["id"];

        }
        ?>
    </div>
</main>