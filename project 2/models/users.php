<?php

class User{
     public $username, $email_address, $cash_balance, $id;

     function __construct($username, $email_address, $cash_balance, $id = 0){
        $this->username = $username;
        $this->email_address = $email_address;
        $this->cash_balance = $cash_balance;
        $this->id = $id;
    }


    function setUsername($username){
        $this->username = $username; 
    }

     function getUsername(){
        return $this->username;
    }



     function setEmail_address($email_address){
        $this->email_address = $email_address; 
    }

    function getEmail_address(){
        return $this->email_address;
    }



    function setCash_balance($cash_balance){
        $this->cash_balance = $cash_balance; 
    }

    function getCash_balance(){
        return $this->cash_balance;
    }



    function setId($id){
        $this->id = $id; 
    }

    function getId(){
        return $this->id;
    }
}

function list_users(){

    global $database;
   //query retreives iformation from the data table
$query = 'SELECT username,email_address, cash_balance, id FROM users';

$statement = $database->prepare ($query);
//this prepares the query

$statement->execute();
//this runs this runs the query

$users = $statement-> fetchAll();
//this fetches all of the database information instead of just one table

$statement->closeCursor();
//this clses the query
 
$user_array = array();

foreach( $users as $user ){
    
    $user_array[] = new User($user["username"], $user["email_address"], 
    $user["cash_balance"], $user["id"]);
}

return $user_array;
}



function insert_user($user){
    global $database;
    $query = "INSERT INTO users (username ,email_address, cash_balance) "
    . "VALUES (:username, :email_address, :cash_balance)";


    $statement = $database->prepare($query);
    $statement->bindValue(":username", $user->getUsername());
    $statement->bindValue(":email_address", $user->getEmail_address());
    $statement->bindValue(":cash_balance", $user->getCash_balance());
    
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}

function update_user($user){
    global $database;
    $query = "update users set username = :username, cash_balance = :cash_balance "
    . " where email_address = :email_address";


    $statement = $database->prepare($query);
    $statement->bindValue(":username", $user->getUsername());
    $statement->bindValue(":email_address", $user->getEmail_address());
    $statement->bindValue(":cash_balance", $user->getCash_balance());
    
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}

function delete_user($user){
    global $database;
    $query ="delete from users "
." where email_address = :email_address";

$statement = $database->prepare($query);
$statement->bindValue(":email_address", $user->getEmail_address());
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}
