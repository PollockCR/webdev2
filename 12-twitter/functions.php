<?php 

session_start();

include("secrets.php");

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

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    $print .= " ago";
    return $print;
}

function display_tweets($type){

    global $link;

    if($type == 'public'){
        $whereClause = "";
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

            echo "<small>" . $user["email"] . " | " .time_since(time() - strtotime($row["datetime"])) ."</small><br>"; 

            echo $row["tweet"] . "<br>";

            echo "<small>Follow</small>";

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
        echo '<form>
    <textarea class="form-control mb-2" id="newTweet" rows="3"></textarea>
  <button type="submit" class="btn btn-primary mb-2">Post Tweet</button>
</form>';
    }
    
}

?>