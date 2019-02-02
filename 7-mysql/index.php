<?php 

include("form.php");

?>

<html lang="en">

    <head>

        <title>Secret Diary</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body>

        <div class="container text-center text-light">

            <h1>Secret Diary</h1>

            <p class="font-weight-bold">Store your thoughts permanently and securely.</p>
            
            <?php 
            
            if($error){
                
                echo '<div class="alert alert-danger col-6 mt-4 mx-auto" role="alert">'.$error.'</div>';
                
            }
            
            ?>

            <div id="sign-up" class="col-6 mx-auto mt-4">

                <p>Interested? Sign up now.</p>

                <form method="post">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group form-check mx-auto text-center">
                        <input type="checkbox" class="form-check-input" name="remember-me" id="remember-sign-up">
                        <label class="form-check-label text-light" for="remember-sign-up">Remember me</label>
                    </div>

                    <div class="mx-auto text-center">     
                        <input type="hidden" name="is-sign-up" value="1">
                        <input type="submit" class="btn btn-primary text-light" id="sign-up-button" value="Sign Up" name="submit">
                    </div>

                </form>

                <p><a class="btn font-weight-bold toggle-forms">Log in instead</a></p>

            </div>

            <div id="log-in" class="col-6 mx-auto mt-4">

                <p>Log in using your email and password.</p>

                <form method="post">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group form-check mx-auto text-center">
                        <input type="checkbox" class="form-check-input" name="remember-me" id="remember-sign-in">
                        <label class="form-check-label text-light" for="remember-sign-in">Remember me</label>
                    </div>

                    <div class="mx-auto text-center">     
                        <input type="hidden" name="is-sign-up" value="0">
                        <input type="submit" class="btn btn-secondary" id="log-in-button" value="Log In" name="submit">
                    </div>

                </form>

                <p><a class="btn font-weight-bold toggle-forms">Sign up instead</a></p>

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        
        <script src="javascript.js" type="text/javascript"></script>

    </body>

</html>