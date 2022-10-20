<?php
require_once 'models/database.php';
require_once 'models/users.php';
include ("views/topNavigation.php");
echo "<br>";
    
    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $username = htmlspecialchars(filter_input(INPUT_POST,"username"));
    
    $email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
   
    
    $cash_balance = filter_input(INPUT_POST,"cash_balance", FILTER_VALIDATE_FLOAT);

    

  if($action == "insert_or_update" && $username !="" && $email_address !="" && $cash_balance!=0){
      
    $insert_or_update = filter_input(INPUT_POST, 'insert_or_update');


$user = new User($username, $email_address, $cash_balance);

if($insert_or_update == "insert"){
    insert_user($user);
}else if($insert_or_update == "update"){
    update_user($user);
}
     
    
    }
    



else if($action == "delete" && $email_address !=""){
    $user = new User( "", $email_address, 0);
    delete_user($user);
}

else if($action !=""){
    echo "Missing Username, Email, or Cash Balance";
    
    }
    $user = list_users();
    include ("views/users.php");
    

    

   




echo "<br>";
include ("views/footer.php");
   

    