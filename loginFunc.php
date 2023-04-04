<?php include 'include/db.php';?>

<?php session_start(); ?>


<?php

if (isset($_POST['submit_login'])) {

    // global $connection;
    // $user_unique_id = $_POST['user_unique_id'];

    $email23 = $_POST['email'];

    $password = $_POST['password'];

    echo $email23 . "<br>";

    echo $password . "<br>";

    // $user_unique_id = mysqli_real_escape_string($connection, $user_unique_id);

    $email23 = mysqli_real_escape_string($connection, $email23);

    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE user_email= '{$email23}' OR users_un_id = '{$password}' ";

    // $query .="VALUE('$email23','$user_unique_id')";

    $select = mysqli_query($connection, $query);

    if (! $select) {
        die("query failed :" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select)) {

        $db_Id = $row['user_id '];
        $db_firstname = $row['user_firstname'];
        $db_lastname = $row['user_lastname'];
        $db_user_email = $row['user_email'];
        $db_user_roles = $row['user_role'];
        $db_user_passowrd = $row['password'];
        $db_user_role_id = $row['users_un_id'];
    }
    

    
    if (password_verify($password, $db_user_passowrd)) {

        $_SESSION['user_firstname'] = $db_firstname;
        $_SESSION['user_lastname'] = $db_lastname;
        $_SESSION['user_email'] = $db_user_email;
        $_SESSION['user_role'] = $db_user_roles;
        $_SESSION['password'] = $db_user_passowrd;
        $_SESSION['users_un_id'] = $db_user_role_id;
       

        header("Location: ./reportForm.php");
    }else{
        echo "<h1> no data found </h1>";
        header("Location: loginForm.php");
    }
}

?>