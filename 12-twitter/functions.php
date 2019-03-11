<?php 

session_start();

include("secrets.php");

date_default_timezone_set('America/Los_Angeles');

$dbUsername = USERNAME;

$dbPassword = PASSWORD;

$link = mysqli_connect("localhost", $dbUsername, $dbPassword, $dbUsername);

if(mysqli_connect_errno()){

    print_r(mysqli_connect_error());
    exit;

}

if(isset($_GET["action"]) && $_GET["action"] == "logout"){
    session_unset();
}

function time_since ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'')." ago";
    }

}

function display_tweets($type){

    global $link;

    if($type == "public"){

        $whereClause = "";

    } else if ($type == "timeline" && isset($_SESSION["id"])){

        $query = "SELECT * FROM followers WHERE follower = " . mysqli_real_escape_string($link, $_SESSION['id']);
        $result = mysqli_query($link, $query);

        $whereClause = "WHERE userid = " . mysqli_real_escape_string($link, $_SESSION['id']);

        // if already following
        while($row = mysqli_fetch_assoc($result)){

            $whereClause .= " OR userid = ". $row["followee"];

        }

    }

    $query = "SELECT * FROM tweets " . $whereClause . " ORDER BY `datetime` DESC LIMIT 20";

    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) == 0){

        echo "There are no tweets to display";

    } else {

        while($row = mysqli_fetch_assoc($result)){

            $userQuery = "SELECT * FROM users WHERE id = " . mysqli_real_escape_string($link, $row["userid"]) . " LIMIT 1";
            $userQueryResult = mysqli_query($link, $userQuery);
            $user = mysqli_fetch_assoc($userQueryResult);

            echo "<p class='tweet'>";

            echo "<small>" . $user["email"] . " | " . time_since(strtotime($row["datetime"])) ."</small><br>"; 

            echo $row["tweet"];

            if(isset($_SESSION["id"]) && ($row["userid"] != $_SESSION["id"])){

                $query = "SELECT * FROM followers WHERE follower = " . mysqli_real_escape_string($link, $_SESSION['id']) ." AND followee = " . mysqli_real_escape_string($link, $row["userid"]) . " LIMIT 1";
                $following = mysqli_query($link, $query);

                if(mysqli_num_rows($following) > 0){

                    // if following, show unfollow
                    echo "<br><small><a href='#' class='toggleFollow' data-userId='".$row["userid"]."'>Unfollow</a></small>";

                } else {

                    // if not following, show follow
                    echo "<br><small><a href='#' class='toggleFollow' data-userId='".$row["userid"]."'>Follow</a></small>";

                }

            }

            echo "</p>";

        }
    }
}

function display_search(){

    echo '<form class="form-inline">
    <div class="form-group">
  <input type="text" class="form-control mr-2" id="search" placeholder="Search tweets">

  <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>';

}

function display_tweet_box(){

    if(isset($_SESSION['id']) && $_SESSION['id'] > 0){
        echo '<hr><div class="alert alert-success alert-dismissible fade show" id="tweetSuccess" role="alert">Your tweet was posted successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>
        <div class="alert alert-danger" id="tweetFail" role="alert"></div>
        <form id="postTweetForm">
        <textarea class="form-control mb-2" id="newTweet" rows="3"></textarea>
        <button type="submit" class="btn btn-primary mb-2">Post Tweet</button>
        </form>';
    }

}

?>