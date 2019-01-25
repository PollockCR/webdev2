<?php 

mysqli_connect("shareddb-m.hosting.stackcp.net", "usersdb-313031c722", "usersdb-313031c722-password");

if(mysqli_connect_error()){
    
    echo "Error: The database could not be accessed.";
    
} else {
    
    echo "Database connection successful.";
    
}

?>