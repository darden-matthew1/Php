<?php

class Stock{
     public $symbol, $name, $current_price, $id;

     function __construct($symbol, $name, $current_price, $id = 0){
        $this->symbol = $symbol;
        $this->name = $name;
        $this->current_price = $current_price;
        $this->id = $id;
    }


    function setSymbol($symbol){
        $this->symbol = $symbol; 
    }

     function getSymbol(){
        return $this->symbol;
    }



     function setName($name){
        $this->name = $name; 
    }

    function getName(){
        return $this->name;
    }



    function setCurrent_price($current_price){
        $this->current_price = $current_price; 
    }

    function getCurrent_price(){
        return $this->current_price;
    }



    function setId($id){
        $this->id = $id; 
    }

    function getId(){
        return $this->id;
    }
}

function list_stocks(){

    global $database;
   //query retreives iformation from the data table
$query = 'SELECT symbol,name,current_price,id FROM stocks';

$statement = $database->prepare ($query);
//this prepares the query

$statement->execute();
//this runs this runs the query

$stocks = $statement-> fetchAll();
//this fetches all of the database information instead of just one table

$statement->closeCursor();
//this clses the query
 
$stocks_array = array();

foreach( $stocks as $stock ){
    
    $stocks_array[] = new Stock($stock["symbol"], $stock["name"], 
    $stock["current_price"], $stock["id"]);
}

return $stocks_array;
}


function insert_stocks($stock){
    global $database;
    $query = "INSERT INTO stocks (symbol ,name, current_price) "
    . "VALUES (:symbol, :name, :current_price)";


    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $stock->getSymbol());
    $statement->bindValue(":name", $stock->getName());
    $statement->bindValue(":current_price", $stock->getCurrent_price());
    
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}


function update_stock($stock){
    global $database;
    $query = "update stocks set name = :name, current_price = :current_price "
    . " where symbol = :symbol";


    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $stock->getSymbol());
    $statement->bindValue(":name", $stock->getName());
    $statement->bindValue(":current_price", $stock->getCurrent_price());
    
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}

function delete_stock($stock){
    global $database;
    $query ="delete from stocks "
    ." where symbol = :symbol";



$statement = $database->prepare($query);
$statement->bindValue(":symbol", $stock->getSymbol());
    //this will make :symbol equal the same as the variable symbol
    //the difference is the bindvalue will look at it and make sure someone else cant inject malicious code into it

    $statement->execute();


$statement->closeCursor();
}
