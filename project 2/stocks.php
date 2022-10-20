<?php
require_once 'models/database.php';
require_once 'models/stocks.php';
include ("views/topNavigation.php");
echo "<br>";
    
    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $symbol = htmlspecialchars(filter_input(INPUT_POST,"symbol"));
    
    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $username = htmlspecialchars(filter_input(INPUT_POST, "username"));
    
    $current_price = filter_input(INPUT_POST,"current_price", FILTER_VALIDATE_FLOAT);

    
    try{
  if($action == "insert_or_update" && $symbol !="" && $name !="" && $current_price!=0){
      
    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');


$stock = new Stock($symbol, $name, $current_price);

if($insert_or_update == "insert"){
    insert_stocks($stock);
}else if($insert_or_update == "supdate"){
    update_stock($stock);
}
     
    
    }
    



else if($action == "delete" && $symbol !=""){
    $stock = new Stock($symbol, "", 0);
    delete_stock($stock);
}

else if($action !=""){
    echo "Missing Username, Email, or Cash Balance";
    
    }
    $stocks = list_stocks();
    include ("views/stocks.php");
    

    

   

}catch (Exception $e){
    $error_message = $e->getMessage();
include ("views/error.php");
}


echo "<br>";
include ("views/footer.php");
   

    