
<?php


function confirmQuery($result) {
    
    global $connection;
    
    if(!$result ) {
        
        die("QUERY FAILED ." . mysqli_error($connection));
        
        
    }
    
    
}


function is_admin($user_email) {
   // user_firstname
    global $connection;
    
    $query = "SELECT user_role FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    $row = mysqli_fetch_array($result);
    
    
    if($row['user_role'] == 'Admin'){
        
        return true;
        
    }else {
        
        
        return false;
    }
    
}

?>