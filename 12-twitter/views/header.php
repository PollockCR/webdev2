<!doctype html>

<html lang="en" class="h-100">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="./style.css">

        <title>Twitter</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="http://catherinepollock.com/12-twitter/">Twitter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=timeline">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=yourtweets">Your tweets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=profiles">Profiles</a>
                    </li>

                </ul>
                
                <?php if(isset($_SESSION["id"])){ ?>
                
                <!-- Button trigger logout -->
                <a class="btn btn-primary" id="logoutButton" href="?action=logout">
                    Log out
                </a>
                
                <?php } else { ?>
                
                <!-- Button trigger sign up modal -->
                <button type="button" class="btn btn-secondary mr-3" data-toggle="modal" data-target="#signupModal">
                    Sign up
                </button>

                <!-- Button trigger login modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                    Log in
                </button>
                
                <?php } ?>
                
                <!-- Sign up Modal -->
                <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="signupForm" method="post">
                                <div class="modal-body">
                                    <div class="alert alert-danger" id="signupAlert" role="alert"></div>
                                    <div class="form-group">
                                        <label for="signupEmail">Email address</label>
                                        <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp" placeholder="Enter email" >

                                    </div>
                                    <div class="form-group">
                                        <label for="signupPassword">Password</label>
                                        <input type="password" class="form-control" id="signupPassword" placeholder="Password" >
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Sign up">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Log in Modal -->
                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="loginForm" method="post">
                                <div class="modal-body">
                                    <div class="alert alert-danger" id="loginAlert" role="alert"></div>
                                    <div class="form-group">
                                        <label for="loginEmail">Email address</label>
                                        <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email">

                                    </div>
                                    <div class="form-group">
                                        <label for="loginPassword">Password</label>
                                        <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" id="loginButton" value="Log in">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </nav>