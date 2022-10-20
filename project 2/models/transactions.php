<?php

class Transactions{
     public $user_id, $stock_id, $quantity, $price , $id = 0, $timestamp = 0;

     function __construct($user_id, $stock_id, $quantity, $price, $id, $timestamp){
        $this->user_id = $user_id;
        $this->stock_id = $stock_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->id = $id;
        $this->timestamp = $timestamp;
       
       
    }


    function setUser_id($user_id){
        $this->user_id = $user_id; 
    }

     function getUser_id(){
        return $this->user_id;
    }




    function setQuantity($quantity){
        $this->quantity = $quantity; 
    }

     function getQuantity(){
        return $this->quantity;
    }




     function setStock_id($stock_id){
        $this->stock_id = $stock_id; 
    }

    function getStock_id(){
        return $this->stock_id;
    }



    function setPrice($price){
        $this->price = $price; 
    }

    function getPrice(){
        return $this->price;
    }



    function setId($id){
        $this->id = $id; 
    }

     function getId(){
        return $this->id;
    }

    function getTimestamp(){
        return $this->timestamp;
    }
}

function list_transactions(){

    global $database;
   //query retreives iformation from the data table
$query = 'SELECT user_id ,stock_id, quantity, price, id, timestamp FROM transaction';

$statement = $database->prepare ($query);
//this prepares the query

$statement->execute();
//this runs this runs the query

$transactions = $statement-> fetchAll();
//this fetches all of the database information instead of just one table

$statement->closeCursor();
//this clses the query
 
$transactions_array = array();

foreach( $transactions as $transaction ){
    
    $transactions_array[] = new Transactions($transaction["user_id"], $transaction["stock_id"], 
    $transaction["quantity"], $transaction["price"], $transaction["id"], $transaction["timestamp"]);
}

return $transactions_array;
}



function insert_transaction($transaction){
    global $database;
    $query = "INSERT INTO transaction (user_id ,stock_id, quantity, price) "
    . "VALUES (:user_id, :stock_id, :quantity, :price)";


    $statement = $database->prepare($query);
    $statement->bindValue(":user_id", $transaction->getUser_id());
    $statement->bindValue(":stock_id", $transaction->getStock_id());
    $statement->bindValue(":quantity", $transaction->getQuantity());
    $statement->bindValue(":price", $transaction->getPrice());
    
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}

function update_transaction($transaction){
    global $database;
    $query = "update transaction set user_id = :user_id, stock_id = :stock_id, quantity = :quantity, price = :price "
    . " where id = :id";


    $statement = $database->prepare($query);
    $statement->bindValue(":user_id", $transaction->getUser_id());
    $statement->bindValue(":stock_id", $transaction->getStock_id());
    $statement->bindValue(":quantity", $transaction->getQuantity());
    $statement->bindValue(":price", $transaction->getPrice());
    $statement->bindValue(":id", $transaction->getId());
    
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}

function delete_transaction($transaction){
    global $database;
    $query ="delete from transaction "
." where id = :id";

$statement = $database->prepare($query);
$statement->bindValue(":id", $transaction->getId());
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}
