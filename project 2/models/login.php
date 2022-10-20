<?php
function login($email_address, $password){
    global $database;
    $query = "SELECT email_address, password_hash FROM users"
    . "where email_address = :email_address";


    $statement = $database->prepare($query);
    
    $statement->bindValue(":email_address", $email_address);

    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();

$user =  $statement->fetch();
$statement->closeCursor();

if($user == NULL){
    return false;
}

$password_hash = $user['password_hash'];

return password_varify($password, $password_hash);
}