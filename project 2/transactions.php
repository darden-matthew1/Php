<?php
require_once 'models/database.php';
require_once 'models/transactions.php';
require_once 'models/users.php';
require_once 'models/stocks.php';
include ("views/topNavigation.php");
echo "<br>";

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
    $user_id = filter_input(INPUT_POST, "user_id", FILTER_VALIDATE_INT);
   
    $stock_id = filter_input(INPUT_POST, "stock_id", FILTER_VALIDATE_INT);
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $timestamp = htmlspecialchars(filter_input(INPUT_POST, "timestamp"));
    $price = filter_input(INPUT_POST,"price", FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST,"quantity", FILTER_VALIDATE_FLOAT);
    
    $transaction = new Transactions($user_id, $stock_id, $quantity, $price, $id, $timestamp);
    

  if($action == "insert" && $user_id != 0 && $stock_id !=0 && $quantity !=0){
      
   

    
        $users = list_users();
$users_cash_balance = 0;
        foreach ($users as $user){
if ($user->getId() == $user_id){

$user_name = $user->getUsername();
$user_email_address = $user->getEmail_address();


    $users_cash_balance = $user->getCash_balance();
}
        }

$stocks = list_stocks();
$stock_price = 0;
foreach($stocks as $stock){
    if ($stock->getId() == $stock_id){
        $stock_price = $stock->getCurrent_price();

    }
}

$total_cost = $stock_price * $quantity;

if( $users_cash_balance >= $total_cost){
    $transaction->setPrice($total_cost);
insert_transaction($transaction);


$new_balance = $users_cash_balance - $total_cost;
$user->setCash_balance($new_balance);
update_user($user);



    }
    

}


else if($action == "update" && $user_id != 0 && $stock_id !=0 && $quantity !=0 && $price !=0 && $id !=0){
    update_transaction($transaction);
}
 
    

    
else if($action == "delete" && $id !=0){
    $transactions = new Transactions($user_id, $stock_id, $quantity, $price, $id,"");
    delete_transaction($transactions);
}


else if($action !=""){
    echo "Missing User Id Stock Id, Quantity, Price, or Id";
    
    }
   

    $transactions = list_transactions();
    include ("views/transactions.php");
    

    

   




echo "<br>";
include ("views/footer.php");
   

    